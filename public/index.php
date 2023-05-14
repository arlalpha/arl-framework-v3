<?php 
session_start();
//Root path
define('APPLICATION_PATH',realpath(dirname(__FILE__).'/../app'));

//Directory separator
const DS = DIRECTORY_SEPARATOR;

//Configuration
require_once APPLICATION_PATH. DS . "config" . DS . "config.php";

//Timezone
require_once APPLICATION_PATH. DS . "timezone" . DS . "timezone.php";

//Database
require_once APPLICATION_PATH. DS . "database" . DS . "database.php";

//Utils
require_once APPLICATION_PATH. DS . "utils" . DS . "utils.php";

//Sessions
require_once APPLICATION_PATH. DS . "sessions" . DS . "sessions.php";

//Get page name
$get_page   = page('page','home');

//Get page
$get_view       = $config["pages"] . $get_page . DS . $get_page  . ".phtml";
$get_controller = $config["pages"] . $get_page . DS . $get_page  . ".php";
$get_designer   = $config["pages"] . $get_page . DS . $get_page  . ".css";

//Structure
require_once APPLICATION_PATH. DS . "structure" . DS . "start.phtml";

function initializeLibraries($dir){
    $ffs = scandir($dir);
    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);
    if(count($ffs) < 1 ){
        return;
    } else {
        foreach($ffs as $ff){
            $filePath = $dir . '/' . $ff;
            if(is_dir($filePath)){
                initializeLibraries($filePath); 
            } else {
                require $filePath;
            }
        }
    }
}


function initializeClass($dir){
    $ffs = scandir($dir);
    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);
    if(count($ffs) < 1 ){
        return;
    } else {
        foreach($ffs as $ff){
            $filePath = $dir . '/' . $ff;
            if(is_dir($filePath)){
                initializeLibraries($filePath); 
            } else {
                require $filePath;
            }
        }
    }
}

initializeLibraries(APPLICATION_PATH. DS . "libraries". DS);
initializeClass(APPLICATION_PATH. DS . "class". DS);

//Controller
if(file_exists($get_controller)){
    require_once $get_controller;
}

//Check page
if(file_exists($get_view)){
    require_once $get_view;
}else{
    header("Location: ?page=404");
}

require_once APPLICATION_PATH. DS . "structure" . DS . "end.phtml";
