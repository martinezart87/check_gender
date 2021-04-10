<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Throwable;

class GenderAPI
{
    protected $genderizeURL;

    public function __construct()
    {
        $this->genderizeURL = "https://api.genderize.io";
    }

    public function getGender($params): string
    {

        $validator = Validator::make($params, ['name' => 'required', 'code' => 'required']);

        if ($validator->fails()) {
            Log::warning('Name and Country fields are required');
            return '<strong>Name and Country fields are required</strong>';
        }

        if (strlen($params['name']) <= 1) {
            Log::warning('Name not found');
            return '<strong>Name ' . $params['name'] . ' not found</strong>';
        }

        if ($params['name'] == trim($params['name']) && strpos($params['name'], ' ') !== false) {
            Log::warning('Name is wrong');
            return '<strong>Name is wrong</strong>';
        }

        try {
            $http_response =  trim(get_headers($this->genderizeURL . '?name=' . $params['name'] . '&country_id=' . $params['code'])[0]);
            if ($http_response !== 'HTTP/1.1 200 OK') {
                Log::error($http_response);
                return '<p class="bg-danger text-white p-1">REST GENERIZE API ERROR. Check Log file in strogae/logs/laravel.log</p>';
            }
        } catch (Throwable $e) {
            Log::error('genderizeAPI ' . $e);
            return '<p class="bg-danger text-white p-1">REST GENERIZE API ERROR. Check Log file in strogae/logs/laravel.log</p>';
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->genderizeURL . '?name=' . $params['name'] . '&country_id=' . $params['code'],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $genderAPIresult = json_decode($response);

        if (!is_object($genderAPIresult)) {
            Log::error('genderizeAPI API Error $genderAPIresult is not array');
            return '<p class="bg-danger text-white p-1">REST GENERIZE API ERROR. Check Log file in strogae/logs/laravel.log</p>';
        }

        if (is_null($genderAPIresult->gender)) {
            Log::warning('No results for name: ' . $params['name']);
            return '<strong>No results</strong> for name: ' . $params['name'];
        }
        $probability = $genderAPIresult->probability * 100;
        return '<strong>Name:</strong> ' . $genderAPIresult->name . ', <strong>Gender:</strong> ' . $genderAPIresult->gender . ', <strong>Probability:</strong> ' . $probability . '%';
    }
}
