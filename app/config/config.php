<?php 
//Configurations
$properties             =  json_decode(file_get_contents( dirname(dirname(dirname(__FILE__))) . DS ."properties.json"),false);
$root_directory_name    = basename(dirname(dirname(__DIR__)));
switch($properties->platform->environment){
    case 'local':
        $config = [
            "pages"             =>  APPLICATION_PATH. DS . "pages" . DS,
            "libraries"         =>  DS . $root_directory_name . DS . "app" . DS . "libraries" . DS,
            "assets"            =>  DS . $root_directory_name . DS . "app" . DS . "assets" . DS,
            "resources"         =>  DS . $root_directory_name . DS . "app" . DS . "resources" . DS,
            "storage"           =>  DS . $root_directory_name . DS . "app" . DS . "storage" . DS,
            "storage_viewer"    =>  DS . $root_directory_name . DS . "app" . DS . "storage" . DS,
            "requests"          =>  APPLICATION_PATH. DS . "requests" . DS,
            "components"        =>  APPLICATION_PATH. DS . "components" . DS,
            "static"            =>  "",
            "allowed_origins"   => ['http://localhost'],
        ];
    break;
    case 'production':
        $config = [
            "pages"             =>  APPLICATION_PATH. DS . "pages" . DS,
            "libraries"         =>  DS . "app" . DS . "libraries" . DS,
            "assets"            =>  DS . "app" . DS . "assets" . DS,
            "resources"         =>  DS . "app" . DS . "resources" . DS,
            "storage"           =>  APPLICATION_PATH . DS . "app" . DS . "storage" . DS,
            "storage_viewer"    =>  DS . "app" . DS . "storage" . DS,
            "requests"          =>  APPLICATION_PATH. DS . "requests" . DS,
            "components"        =>  APPLICATION_PATH. DS . "components" . DS,
            "static"            =>  "",
            "allowed_origins"   => [''],
        ];
    break;
}
?>