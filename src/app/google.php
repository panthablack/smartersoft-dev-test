<?php
// Your Google Books API key
$apiKey = 'YOUR_API_KEY';

// Define a search query
$searchQuery = 'Harry Potter'; // Replace with your desired search query

// API endpoint
$apiUrl = 'https://www.googleapis.com/books/v1/volumes?q=' . urlencode($searchQuery) . '&key=' . $apiKey;

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Parse and display response
    $data = json_decode($response, true);

    if (isset($data['items'])) {
        foreach ($data['items'] as $item) {
            $title = $item['volumeInfo']['title'] ?? 'No title available';
            $authors = implode(', ', $item['volumeInfo']['authors'] ?? ['Unknown Author']);
            $description = $item['volumeInfo']['description'] ?? 'No description available';

            echo "<h2>$title</h2>";
            echo "<p><strong>Authors:</strong> $authors</p>";
            echo "<p>$description</p>";
            echo "<hr>";
        }
    } else {
        echo "No books found.";
    }
}

// Close cURL
curl_close($ch);
