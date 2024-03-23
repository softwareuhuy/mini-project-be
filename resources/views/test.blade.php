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
    const predictTimestamp = [];
        let latestDate = new Date(); // Initialize latestDate as a Date object
        latestDate.setHours(0, 0, 0);
        latestDate.setHours(latestDate.getHours() - 8);
    // Define the API URL
   for (let i = 0; i < 21; i++) {
                latestDate.setHours(latestDate.getHours() + 8);

        
            // Format the timestamp as "yyyy-mm-dd hh:mm:ss"
            const formattedTimestamp = `${latestDate.getFullYear()}-${String(latestDate.getMonth() + 1).padStart(2, '0')}-${String(latestDate.getDate()).padStart(2, '0')} ${String(latestDate.getHours()).padStart(2, '0')}:00:00`;
            predictTimestamp.push(formattedTimestamp);
        }
        
        console.log(predictTimestamp[2]);
    // Loop through the denormalized predictions and send data
    for (let i = 0; i < 21; i++) {
    const postData = {
      time: `${predictTimestamp[i]}`, // Use the Carbon-formatted timestamp
      CO2: '700'
      // CO2: `${flattenedDenormalizedPredictions[i]}`
    };
    console.log(postData);

    // Send a POST request to the "/predict" endpoint
    const predictApiUrl = "/api/predict";
    console.log(predictApiUrl); // Replace with your actual predict API endpoint
    const predictApiResponse = fetch(predictApiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(postData),
        }
      )
    };
    </script>
  </body>
</html>