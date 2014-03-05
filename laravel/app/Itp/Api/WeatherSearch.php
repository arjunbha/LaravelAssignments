<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 3/4/14
 * Time: 12:47 PM
 */

namespace Itp\Api;

class WeatherSearch {

    public function getResults($search) {
        $endpoint = "api.openweathermap.org/data/2.5/forecast?q=" . $search;

        function curl($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }

        $json = curl($endpoint);
        return json_decode($json);
    }
}