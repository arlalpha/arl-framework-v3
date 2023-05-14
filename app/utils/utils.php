<?php 

function alert($param){
    echo '<script>alert("'.$param.'");</script>';
}

function page($name, $default = ''){
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
}

function routePush($route){
    header("Location: ?page=". $route);
}

function request($request_name){
    $method = $_SERVER['REQUEST_METHOD'];
    $data = ($method === 'POST') ? $_POST : $_GET;
    $validity = array_key_exists($request_name, $data);
    if($validity){
        $validity = initializeCORS() ? true : false;
    }
    return $validity;
}

function input($param){
    return $_REQUEST[$param];
}

function setSession($name, $data){
    $_SESSION[$name] = $data;
}

function getSession($name){
   return $_SESSION[$name];
}

function display($param){
    if(is_array($param)){
        print_r($param);
    }else{
        echo $param;
    }
}

function getUserAgent(){
    return $_SERVER['HTTP_USER_AGENT'];
}

function bcrypt($password) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

function generateToken($length = 32) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $token = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[random_int(0, $max)];
    }
    return $token;
}

function csrfToken(){
   return bin2hex(openssl_random_pseudo_bytes(32));
}

function initializeCORS(){
    global $config;
    $currentOrigin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
    $validity = !in_array($currentOrigin,(array)$config['allowed_origins']) ? false : true;    
    !$validity ? header("HTTP/1.1 403 Forbidden") : null;
    return $validity;
}

?>