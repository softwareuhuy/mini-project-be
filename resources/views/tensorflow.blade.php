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
          const apiUrl = "/api/dummy/10"; // replace with your actual api endpoint
          const response = await fetch(apiUrl);
          const data = await response.json();

          // Extract the relevant feature (field5/CO2) from the API data
          const inputFeature = data.map(entry => parseFloat(entry.CO2));
          console.log("Number of field5 entries fetched:", inputFeature.length);

          // Organize the data into sequences of three for each prediction
          const sequences = [];
          for (let i = 0; i < 5; i++) {
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
          const minCO2 = Math.min(...data.map(entry => parseFloat(entry.CO2)));
          const maxCO2 = Math.max(...data.map(entry => parseFloat(entry.CO2)));

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
    

          const predictTimestamp = [];
          let latestDate = new Date(); // Initialize latestDate as a Date object
          latestDate.setHours(0, 0, 0);
          latestDate.setHours(latestDate.getHours() - 8);

          for (let i = 0; i < 5; i++) {
                  latestDate.setHours(latestDate.getHours() + 8);

          
              // Format the timestamp as "yyyy-mm-dd hh:mm:ss"
              const formattedTimestamp = `${latestDate.getFullYear()}-${String(latestDate.getMonth() + 1).padStart(2, '0')}-${String(latestDate.getDate()).padStart(2, '0')} ${String(latestDate.getHours()).padStart(2, '0')}:00:00`;
              predictTimestamp.push(formattedTimestamp);
          }
        
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
          if (predictApiResponse.ok) 
            {
            console.log('Predictions successfully sent to the server.');
            } 
          else 
            {
            console.error('Failed to send predictions to the server.');
            }
          } 
          catch (error) {
          console.error('Error loading or using the model:', error);
          }
      }
    
      // Call the function to load and use the model
      loadModel();
    </script>
  </body>
</html>