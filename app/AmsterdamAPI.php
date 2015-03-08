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
        dd($data);
        $finalUrl = $this->baseUrl . $url;
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $finalUrl);
        if (count($data) > 0) :
            curl_setopt($ch,CURLOPT_POST, count($data));
            curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
        endif;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));

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

    /* Methods for  tickets */
    public function tickets()
    {
        return $this->curl('tickets');
    }

    public function ticket($id)
    {
        return $this->curl('tickets/' . $id);
    }

    public function saveTicket($data)
    {
        parse_str($data, $ticket);
        $this->curl('tickets', $ticket);
    }
}