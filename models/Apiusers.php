<?php
    session_start();
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds);
    require_once("{$base_dir}includes{$ds}Database.php");
    require_once("{$base_dir}includes{$ds}Bcrypt.php");
    require_once("{$base_dir}includes{$ds}Helpers.php");

    // class Apiusers Starts
    class Apiusers{

        private $table = 'apiusers';

        // Apiuser properties
        public $apiuser_id;
        public $firstname;
        public $lastname;
        public $email;
        public $password;
        public $auth_key;
        public $status;

        public function __construct(){

        }

        

    }
    // class Apiusers Ends
?>