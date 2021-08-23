<?php
define('HOST', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'restapi_tuts');

//class Database Starts
class Database{
    //initializing private variable
    private $connection;

    public function __construct(){

        $this->open_db_connection();
    }

    //opening the connection
    public function open_db_connection(){
        $this->connection = mysqli_connect(HOST, USER_NAME, PASSWORD, DB_NAME);

        if(mysqli_connect_error()){
            die('Connection Error: '.mysqli_connect_error());
        }
    }


    //make sql query
    public function query($sql){
    
        $result = $this->connection->query($sql);

        if(!$result){
            die('Query Fails :'.$sql);
        }
        return $result;
    }

    // function to fetch array
    public function fetch_array($result){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $resultarray[] = $row;
            }
            return $resultarray;
        }
    }

    //function to fetch a row
    public function fetch_row($result){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    //method to filter input and output
    public function escape_value($value){
        $value = $this->connection->real_escape_string($value);
        return $value;
    }

    //close sql connection
    public function close_connection(){
        $this->connection->close();
    }
}//class Database Ends

//Instantiate the class
$database = new Database();