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

function request($request_name, $method){
    if(array_key_exists($request_name, $method == 'POST' ? $_POST : $_GET )){
        return true;
    }else{
        return false;
    }
}

function library($library){
    $_library = APPLICATION_PATH. DS . "libraries" . DS . $library . DS . $library . ".php";
    if(file_exists($_library)){
        require_once $_library;
    }
}

function setSession($name, $data){
    $_SESSION[$name] = $data;
}

function getSession($name){
   return $_SESSION[$name];
}

function input($param){
    return $_REQUEST[$param];
}

function display($param){
    if(is_array($param)){
        print_r($param);
    }else{
        echo $param;
    }
}

?>