<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TensorFlowModelController extends Controller
{
    public function servejson()
    {
        // Load TensorFlow.js model
        $modelPath = public_path('/ml-model/model.json');
        $model = file_get_contents($modelPath);

        // Pass the model to the Blade view
        return response($model)->header('Content-Type', 'application/json');
    }
    public function servebin()
{
    // Replace 'path/to/your/model.bin' with the actual path to your .bin file
    $binFilePath = public_path('/ml-model/group1-shard1of1.bin');

    // Check if the file exists
    if (file_exists($binFilePath)) {
        // Get the file content
        $binFileContent = file_get_contents($binFilePath);

        // Set the headers for binary file
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="group1-shard1of1.bin"',
        ];

        // Return the file as a response with headers
        return response($binFileContent, 200, $headers);
    }

    // If the file doesn't exist, return a 404 response
    abort(404, 'File not found');
}
}
