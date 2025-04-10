<?php
$prompt = $_POST['prompt'] ?? '';

if (empty($prompt)) {
    echo 'Error: No prompt given.';
    exit;
}

// Ensure folder exists
$folder = 'generated/';
if (!is_dir($folder)) {
    mkdir($folder);
}

// Unique filename
$filename = $folder . 'img_' . time() . '.png';

// Call Python AI generator
$escapedPrompt = escapeshellarg($prompt);
$escapedFilename = escapeshellarg($filename);
exec("python3 ai_generate.py $escapedPrompt $escapedFilename");

// Return path to frontend
echo $filename;
