<?php

namespace bilyuk\Sendinblue;

use SendinBlue\Client\Api\ContactsApi;
use GuzzleHttp\Client as HTTPClient;

class Client
{
    private $apiKey;
    private $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new HTTPClient();
    }

    /**
     * Return the API client.
     *
     * @return array
     */
    public function getApi($api)
    {
        $api = 'SendinBlue\\Client\\Api\\' . $api;

        return new $api($this->client);
    }

    public function createContact($email, $attributes = [])
    {
        return $this->getApi('ContactsApi')->createContact(new \SendinBlue\Client\Model\CreateContact([
            'email' => $email,
            'attributes' => $attributes,
        ]));
    }
}