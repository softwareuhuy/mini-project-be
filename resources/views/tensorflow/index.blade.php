<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TensorFlow.js Model Deployment</title>
</head>
<body>
    <h1>TensorFlow.js Model Deployment</h1>

    {{-- Include TensorFlow.js library --}}
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>

    {{-- Load the TensorFlow.js model --}}
    <script>
        async function loadModel() {
        const model = await tf.loadLayersModel('/tensorflow',false);
        // Use the loaded model for inference
    }
    </script>
</body>
</html>
