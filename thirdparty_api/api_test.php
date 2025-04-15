<?php
$url = "https://jsonplaceholder.typicode.com/users";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPGET, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}
curl_close($ch);

$data = json_decode($response, true);

// Show only name and email
echo "<h2>User List:</h2>";
foreach ($data as $user) {
    echo "👤 Name: " . $user['name'] . "<br>";
    echo "✉️ Email: " . $user['email'] . "<br><br>";
}
?>
