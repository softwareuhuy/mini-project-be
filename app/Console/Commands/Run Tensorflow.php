<?php
// app/Console/Commands/RunTensorFlow.php


namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunTensorFlow extends Command
{
    protected $signature = 'tensorflow:run';
    protected $description = 'Run TensorFlow code';

    public function handle()
    {
        $output = shell_exec('node' .'public/js/predict.js');
    }
}

