<?php
// foreach ($data['items'] as $item) {
//     $title = $item['volumeInfo']['title'] ?? 'No title available';
//     $authors = implode(', ', $item['volumeInfo']['authors'] ?? ['Unknown Author']);
//     $description = $item['volumeInfo']['description'] ?? 'No description available';

//     echo "<h2>$title</h2>";
//     echo "<p><strong>Authors:</strong> $authors</p>";
//     echo "<p>$description</p>";
//     echo "<hr>";
// }
?>

<main>
    <div class="searchViewContainer">
        <h1>Search Google Books API:</h1>
        <form action="/search">
            <label for="search-term"></label>
            <input id="search-term" type="text" name="term" placeholder="Enter a search term...">
        </form>
        <p>
            <span class="roboto-bold">Results for:</span>
            <?php echo $term; ?>
        </p>
        <p><?php echo $data; ?></p>
        <table class="googleBooksTable">
            <thead>
                <th>Title</th>
                <th>Author(s)</th>
                <th>Publisher</th>
                <th>Published date</th>
                <th>Thumbnail as a rendered image, not just the URL</th>
            </thead>
            <tbody>
                <td>Title</td>
                <td>Author(s)</td>
                <td>Publisher</td>
                <td>Published date</td>
                <td>Thumbnail as a rendered image, not just the URL</td>
            </tbody>
        </table>
    </div>
</main>