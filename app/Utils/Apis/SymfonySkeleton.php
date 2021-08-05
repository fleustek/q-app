<?php
namespace App\Utils\Apis;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

class SymfonySkeleton
{
    public static function makeRequest($method, $path, $data = null, $token = null)
    {
        if(is_null($token))
            $token = Cookie::get('token_key');

        $uri = env('SYMFONY_SKELETON_URL') . $path;
        $options = [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,  
                'Content-type' => 'application/json',
            ]
        ];
        if (!is_null($data))
            $options['body'] = json_encode($data); 

        $client = new Client(['verify' => false]);  

        return $client->request($method, $uri, $options);
    }

    public static function handleMessage($statusCode)
    {
       return  $statusCode >= 200 && $statusCode < 300 ? 'Success!' : 'Try again!';
    }

    public static function getAuthors()
    {
        $response = self::makeRequest('GET', '/authors');

        return json_decode($response->getBody(), true);
    }

    public static function getAuthor($id)
    {
        $response = self::makeRequest('GET', '/authors/' . $id);

        return json_decode($response->getBody(), true);
    }

    public static function deleteAuthor($id)
    {
        $response = self::makeRequest('DELETE', '/authors/' . $id);

        return self::handleMessage($response->getStatusCode());
    }

    public static function getBooks()
    {
        $response = self::makeRequest('GET', '/books');

        return json_decode($response->getBody(), true);
    }

    public static function deleteBook($id)
    {
        $response = self::makeRequest('DELETE', '/books/' . $id);

        return self::handleMessage($response->getStatusCode());
    }

    public static function createBook($data)
    {
        $response = self::makeRequest('POST', '/books', $data);

        return self::handleMessage($response->getStatusCode());
    }

    public static function login($data)
    {
        $uri =  env('SYMFONY_SKELETON_URL') . '/token';
        $client = new Client(['verify' => false]);
        $response = $client->request('POST', $uri, [
            'headers' => [
                'Content-type' => 'application/json',
            ],
            'body' => json_encode($data)
        ]);
        
        return json_decode($response->getBody(), true);
    }

    public static function addAuthor($loginData, $authorData)
    {
        $token = self::login($loginData)['token_key'];
        $response = self::makeRequest('POST', '/authors', $authorData, $token);

        echo(self::handleMessage($response->getStatusCode()));
    }
}