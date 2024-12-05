<?php

namespace App\Controllers;

use App\GoogleBooksAPI;
use App\View;

class GoogleApiController
{
    private GoogleBooksAPI $api;

    public function __construct()
    {
        $this->api = new GoogleBooksAPI();
    }

    public function search()
    {
        $term = htmlspecialchars($_GET["term"] ?? '');
        $data = $this->api->callApi($term);
        View::loadView('search', [
            'title' => 'Search Google Books',
            'term' => $term,
            'data' => $data
        ]);
    }
}
