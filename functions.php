<?php 

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

function authorize ($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort(Response::FORBIDDEN);
    }
}

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}