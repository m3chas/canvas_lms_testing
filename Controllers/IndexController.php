<?php

namespace Controllers;

use GuzzleHttp\Client;

// We load any configurations file.
// I prefer to use require_once since it will trown an error in case something get wrong, so we can catch it.
require_once('conf/app.php');

// As example, we load our POO classes.
require_once('Classes/Assignment.php');

class IndexController
{
    /**
     * Get planet lists
     */
    public function index()
    {

        $course_id = !empty($_POST['courseid']) ? ($_POST['courseid']) : 1258;

        // Let's call our private function to call the course assignements.
        $assignments = $this->getAssignments($course_id);
        
        return $assignments;
    }

    private function getAssignments($course_id)
    {   

        // Let's create an HTTP client.
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $_ENV['CANVAS_URL'],
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        // Let's set our headers, in this case, including the bearer token.
        $headers = [
            'Authorization' => 'Bearer ' . $_ENV['APIKEY'],        
            'Accept'        => 'application/json',
        ];

        // Let's send our request.
        $response = $client->request('GET', 'api/v1/courses/'.$course_id.'/assignments', [
            'headers' => $headers,
            'query' => [
                'order_by' => 'due_at',
                // This search term can be come from the front-end also.
                'search_term' => 'Reflection Survey'
            ]
        ]);

        // Let's check if the request was OK
        if ($response->getStatusCode() == 200) {
            // We can perform any modification of the response before sending back to our functions.
            // In this case, we get a json as a string, so we convert it to array.
            $body = json_decode($response->getBody()->getContents(),true);
        } else {
            // Trown an error or log an error.
        }

        return $body;
    }
}