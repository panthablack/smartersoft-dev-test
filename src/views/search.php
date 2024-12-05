<main>
    <div class="searchViewContainer">
        <h1>Search Google Books API:</h1>
        <form action="/search">
            <label for="search-term"></label>
            <input id="search-term" type="text" name="term" placeholder="Enter a search term...">
        </form>
        <p><?php echo $term; ?></p>
    </div>
</main>