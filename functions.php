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

function base_path($path) {
    return BASE_PATH . $path;
}


function view ($path, $attributes = []) {

    // foreach ($attributes as $key => $value) {
    //     $$key = $value;
    // }
    extract($attributes);

    require base_path("views/{$path}");
}

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}