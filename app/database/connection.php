<?php 
namespace App\Database;
use mysqli;

class Database {
    public function connection (){
        $DATABASE_TYPE = "mysql";
        $HOSTNAME = "localhost";
        $USERNAME = "root";
        $PASSWORD = "";
        $DATABASE = "";
        switch ($DATABASE_TYPE){
            case "mysql":
                $db_connection  = new mysqli($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
                if(mysqli_connect_errno()){
                    return "SERVER ERROR!";  
                }
                return $db_connection;
                break;
            default:
            break;
        }
    }
}

?>