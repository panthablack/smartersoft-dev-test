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
        $data = $this->api->callApi();
        $term = htmlspecialchars($_GET["term"] ?? '');
        View::loadView('search', [
            'title' => 'Search Google Books',
            'term' => $term,
            'data' => $data
        ]);
    }
}
