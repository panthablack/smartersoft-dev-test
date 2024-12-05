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
        <table class="googleBooksTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author(s)</th>
                    <th>Publisher</th>
                    <th>Published date</th>
                    <th>Thumbnail as a rendered image, not just the URL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // var_dump($data[0]);
                foreach ($data as $volume) {
                    $title = $volume['volumeInfo']['title'];
                    $authors = json_encode($volume['volumeInfo']['authors']);
                    $publisher = $volume['volumeInfo']['publisher'];
                    $publishedDate = $volume['volumeInfo']['publishedDate'];
                    $imgSrc = $volume['volumeInfo']['imageLinks']['thumbnail'];
                    echo '<tr>';
                    echo "<td>$title</td>";
                    echo "<td>$authors</td>";
                    echo "<td>$publisher</td>";
                    echo "<td>$publishedDate</td>";
                    echo "<td><img class=\"thumbnail\" src=\"$imgSrc\"></td>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</main>