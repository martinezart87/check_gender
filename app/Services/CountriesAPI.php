<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class CountriesAPI
{
    protected $URL;

    public function __construct()
    {
        $this->URL = "https://restcountries.eu/rest/v2/region/europe";
        $this->URL = "";
    }

    public function getCountries() : array
    {
        return [];

        $status = trim(get_headers($this->URL)[0]);
        if ($status !== 'HTTP/1.1 200') {
            Log::error(get_headers($this->URL)[0]);
            return [];
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->URL,
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $countries = json_decode($response);

        if (!is_array($countries)) {
            Log::error('API Error $countries is not array');
            return [];
        }

        $data = [];
        foreach ($countries as $country) {
            $data[] = [
                'name' => $country->name,
                'alpha2Code' => $country->alpha2Code
            ];
        }
        return $data;
    }
}
