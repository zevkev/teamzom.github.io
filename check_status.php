<?php
// Replace "https://teamzom.de" with the actual website URL you want to monitor
$websiteUrl = "https://teamzom.de";
$response = pingWebsite($websiteUrl);

// Simulate the number of visitors
$visitors = rand(10, 50);

$data = array(
    'status' => $response ? "Online" : "Offline",
    'visitors' => $visitors
);

header('Content-Type: application/json');
echo json_encode($data);

function pingWebsite($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode === 200;
}
?>
