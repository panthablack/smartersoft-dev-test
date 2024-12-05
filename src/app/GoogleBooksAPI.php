<?php

namespace App;

use Google\Client;
use Google\Service\Books;

class GoogleBooksAPI
{
    private string $apiKey;
    private Client $client;
    private Books $service;

    public function __construct()
    {
        $this->apiKey = $_ENV['GOOGLE_BOOKS_API_KEY'] ?? '';
        $this->client = new Client();
        $this->client->setDeveloperKey($this->apiKey);
        $this->client->setApplicationName("SEARCHED_BOOKS");
        $this->service = new Books($this->client);
    }

    public function callApi(string $search = '')
    {
        $optParams = [
            'filter' => 'free-ebooks',
        ];
        try {
            $results = $this->service->volumes->listVolumes($search, $optParams);
            return $results->getItems();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
