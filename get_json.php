<?php
require 'functions.php';
function getData()
{
    // GitHub token for authorization
    $github_token = getenv('GITHUB_TOKEN'); // Replace this with your token or load it from environment

    // Initialize cURL session
    $ch = curl_init();

    // Set the URL
    curl_setopt($ch, CURLOPT_URL, "https://raw.githubusercontent.com/frbarbre/placeholder_data/main/students.json");

    // Set the HTTP headers (optional, remove the Authorization header if the repo is public)
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: token " . $github_token,
        "Accept: application/vnd.github.v3.raw"
    ));

    // Return the response instead of outputting it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request and store the result
    $result = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
        curl_close($ch);
        return false;
    }

    // Close the cURL session
    curl_close($ch);

    // Return the result, do not echo it here
    return $result;
}
