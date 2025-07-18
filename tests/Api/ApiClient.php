<?php

namespace Tests\Api;

use GuzzleHttp\Client;
use Dotenv\Dotenv;

class ApiClient
{
    public static function client()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        return new Client([
            'base_uri' => 'https://gorest.co.in/public-api/',
            'headers' => [
                'Authorization' => 'Bearer ' . $_ENV['GOREST_TOKEN'],
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
