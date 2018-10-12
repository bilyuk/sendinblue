<?php

namespace bilyuk\Sendinblue;

use GuzzleHttp\Client as HTTPClient;
use SendinBlue\Client\ApiException;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\CreateContact;
use SendinBlue\Client\Model\UpdateContact;

class Client
{
    private $client;
    private $config;

    public function __construct($config)
    {
        $this->config = new Configuration();
        $this->config->setApiKey('api-key', $config['key']);

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

        return new $api($this->client, $this->config);
    }

    public function callApi($api, $method, ...$arguments)
    {
        try {
            return call_user_func_array([$this->getApi($api), $method], $arguments);
        } catch (ApiException $exception) {
            return false;
        }
    }

    /**
     * @param $email
     * @param array $attributes
     * @return bool|mixed
     */
    public function create($email, $attributes = [])
    {
        return $this->callApi('ContactsApi', 'createContact', new CreateContact([
            'email' => $email,
            'attributes' => $attributes,
        ]));
    }

    /**
     * Check if contact exists
     *
     * @param $email
     * @return bool
     */
    public function exists($email)
    {
        return $this->getInfo($email) !== false;
    }

    /**
     * @param $email
     * @return bool|mixed
     */
    public function getInfo($email)
    {
        return $this->callApi('ContactsApi', 'getContactInfo', $email);
    }

    /**
     * @param $email
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($email, $attributes = [])
    {
        return $this->callApi('ContactsApi', 'updateContact', $email, new UpdateContact(['attributes' => $attributes]));
    }
}
