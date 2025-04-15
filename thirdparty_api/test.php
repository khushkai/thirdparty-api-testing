<?php
$url = "https://jsonplaceholder.typicode.com/posts/1"; // Third-party API URL

// Fetch data from the API
$response = file_get_contents($url);

// Convert JSON response to PHP array
$data = json_decode($response, true);

// Display the result
echo "<pre>";
print_r($data);
?>
