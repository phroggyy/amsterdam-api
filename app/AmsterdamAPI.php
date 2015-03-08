<?php
/**
 * Created by PhpStorm.
 * User: leosjoberg
 * Date: 07/03/15
 * Time: 23:34
 */

namespace App;


class AmsterdamAPI {
    private $baseUrl = 'http://api.tandem15.eu/';

    private function curl($url, $data = [])
    {
        $finalUrl = $this->baseUrl . $url;
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $finalUrl);
        curl_setopt($ch,CURLOPT_POST, count($data));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    /* Methods for retrieving posts */
    public function posts()
    {
        return $this->curl('posts');
    }

    public function post($id)
    {
        return $this->curl('posts/' . $id);
    }

    /* Methods for retrieving tickets */
    public function tickets()
    {
        return $this->curl('tickets');
    }

    public function ticket($id)
    {
        return $this->curl('tickets/' . $id);
    }
}