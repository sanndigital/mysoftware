<?php
$prompt = $_POST['prompt'] ?? '';

// This is just a placeholder. Replace it with your actual AI call.
$filename = 'output.png';

// Call to Python AI backend (for real generation)
$escapedPrompt = escapeshellarg($prompt);
exec("python3 ai_generate.py $escapedPrompt $filename");

// Return the generated image URL
echo $filename;
