<?php 



function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Core\Response::NOT_FOUND) {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize ($condition, $status = Core\Response::FORBIDDEN) {
    if (! $condition) {
        abort(Core\Response::FORBIDDEN);
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

function login ($user) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout() {
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function redirect($path) {
    header("location: {$path}");
    exit;
}

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}