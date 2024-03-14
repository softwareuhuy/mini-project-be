<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>TensorFlow.js browser example</title>

    <!-- Load TensorFlow.js from a script tag -->
   
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
  </head>
  <body>
    <h1>TensorFlow.js example</h1>
    <h2>Open the console to see the results.</h2>
    <script>
    

      async function loadModel() {
        let flattenedDenormalizedPredictions;
        let predictTimestamp; 
        try {
          // Load the TensorFlow.js model
          const modelPath = "{{ asset('/ml-model/model.json') }}";
          const model = await tf.loadLayersModel(modelPath);

          // Fetch data from the API
          const apiUrl = "/data-actual"; // Replace with your actual API endpoint
          const response = await fetch(apiUrl);
          const data = await response.json();

          // Extract the relevant feature (field5/CO2) from the API data
          const inputFeature = data.feeds.map(entry => parseFloat(entry.field5));

          // Organize the data into sequences of three for each prediction
          const sequences = [];
          for (let i = 0; i < 21; i++) {
            sequences.push([
              inputFeature[i],
              inputFeature[i + 1],
              inputFeature[i + 2]
            ]);
          }

          // Reshape input data to match the expected input shape [null, 3, 1]
          const reshapedInput = tf.tensor2d(sequences, [sequences.length, 3]);

          // Expand dimensions to match [null, 3, 1]
          const expandedInput = reshapedInput.expandDims(2);

          // Make predictions using the loaded model
          const predictions = model.predict(expandedInput);

          // Convert predictions Tensor to a JavaScript array
          const predictedValues = predictions.arraySync();

          // Extract min and max CO2 values from the API data
          const minCO2 = Math.min(...data.feeds.map(entry => parseFloat(entry.field5)));
          const maxCO2 = Math.max(...data.feeds.map(entry => parseFloat(entry.field5)));

          // Function to denormalize a single value
          function denormalizeValue(value) {
            return value * (maxCO2 - minCO2) + minCO2;
          }

          // Denormalize the predicted values
          const denormalizedPredictions = predictedValues.map(sequence =>
            sequence.map(denormalizeValue)
          );

          // Flatten the array of denormalized predictions
          const flattenedDenormalizedPredictions = denormalizedPredictions.flat();

          // Log the individual denormalized predicted values
          console.log('Denormalized Predicted Values:', flattenedDenormalizedPredictions);

          // Log the predicted values
          console.log('Predicted Values:', predictedValues);
    

          const predictTimestamp = @json($predictTimestamp);
          console.log(predictTimestamp[2])
    // Loop through the denormalized predictions and send data
    for (let i = 0; i < flattenedDenormalizedPredictions.length; i++) {
    const postData = {
      time: `${predictTimestamp[i]}`, // Use the Carbon-formatted timestamp
      CO2: `${flattenedDenormalizedPredictions[i]}`
    };
    console.log(postData);

    // Send a POST request to the "/predict" endpoint
    const predictApiUrl = "/api/predict"; // Replace with your actual predict API endpoint
    const predictApiResponse = fetch(predictApiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(postData),
    });
    }
          // Check the response status
          if (predictApiResponse.ok) {
            console.log('Predictions successfully sent to the server.');
          } else {
            console.error('Failed to send predictions to the server.');
          }
        } catch (error) {
          console.error('Error loading or using the model:', error);
        }
      }
    
      // Call the function to load and use the model
      loadModel();
    </script>
  </body>
</html>