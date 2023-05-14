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
                   throw new \Exception('Database Connection Error!');
                }
                return $db_connection;
                break;
            default:
            break;
        }
    }
  
    public function executeQuery($param){
        return mysqli_query(self::connection(),$param);
    } 

    public function dataCount($param){
        return mysqli_num_rows($param);
    }

    public function fetch($param){
        return mysqli_fetch_all($param, MYSQLI_ASSOC);
    }

    public function table($table, $data, $joins, $conditions){
        $db                 = new Database();
        $columns            = implode(",", $data);
        $join_tables        = implode(" ", $joins);
        $conditional        = implode(" ", $conditions);
        $query              = "SELECT {$columns} FROM {$table} {$join_tables} {$conditional}";
        $result             = $db->executeQuery($query);
        return $result;
    }

}

?>