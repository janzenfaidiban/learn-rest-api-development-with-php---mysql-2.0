<?php 
    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DB_NAME', 'restapi_tutorial');

    // class Database Starts
    class Database{
        
        // initializing the private variable
        private $connection;

        public function __construct(){
            $this->open_db_connection();
        }

        // opening the connection
        public function open_db_connection(){
            $this->connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);
            
            if(mysqli_connect_error()){
                die('Connection error '. mysqli_connect_error);
            }
        }

        // make sql query
        public function query($sql){
            $result = $this->connection->query($sql);

            if(!$result){
                die('Query fails '. $sql);
            }
            return $result;
        }

        // function to fetch array
        public function fetch_array($result){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc){
                    $resultarray[] = $row;
                }
                return $resultarray;
            }
        }

        // fetch a row
        public function fetch_row($resultarray){
            if($resultarray->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
        }

        // method for filtering inpuut and output

        public function escape_value($value){
            $value = $this->connection->real_escape_string($valueu);
            return $value;
        }

        // close sql connection
        public function close_connection(){
            $this->Connection->close();
        }

    }

    // class Database Ends
    
    // Instantiate the Database Class
    $database = new Database();
?>