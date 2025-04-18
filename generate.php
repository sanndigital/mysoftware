<?php
$prompt = $_POST['prompt'] ?? '';

if (empty($prompt)) {
    echo 'Error: No prompt given.';
    exit;
}

$folder = 'generated/';
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

$filename = $folder . 'img_' . time() . '.png';
$escapedPrompt = escapeshellarg($prompt);
$escapedFilename = escapeshellarg($filename);

$command = "python3 ai_generate.py $escapedPrompt $escapedFilename";
$output = [];
$return_var = 0;
exec($command, $output, $return_var);

if ($return_var !== 0) {
    echo "Error generating image. Code: $return_var";
    file_put_contents("error.log", implode("\n", $output));
    exit;
}

echo $filename;
