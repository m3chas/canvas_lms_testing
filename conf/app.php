<?php

// Let's load our .env variables here.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// If you want, you can also, define default fallback values in case no .env is present.
/*
return [
    'api_key' => $_ENV['API_KEY'];
]*/