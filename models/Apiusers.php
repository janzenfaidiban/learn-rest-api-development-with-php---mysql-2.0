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


        // check unique email
        public function check_email(){
            global $database;
            $this->email = trim(htmlspecialchars(strip_tags($this->email)));
            $sql = "SELECT * FROM " . $this->table . "WHERE email = '" . $databas->escape_value($this->email) . "'";
            
            $result = $database->query($sql);
            $info = $database->fetch_row($result);

            if(empty($info)){
                return true;
            } else {
                return false;
            }

        }

        // create ApiUser
        public function create_ApiUser(){
            // clean data
            $this->$firstname = htmlspecialchars(strip_tags($this->$firstname));
            $this->$lastname = htmlspecialchars(strip_tags($this->$lastname));
            $this->$email = htmlspecialchars(strip_tags($this->$email));
            $this->$password = htmlspecialchars(strip_tags($this->$password));

            // hash the password
            $hashed_password = Bcrypt::hasPassword($this->password);

            // create user Auth_key
            $normal_key = substr(md5(mt_rand()), 0, 7);

            // has the key
            $auth_key = Bcryp::hashPassword($normal_key);

            global $database;

            $sql = "INSERT INTO $table->table (firstname, lastname, email, password, auth_key)
                    VALUES ('".$database->escape_value($this->firstname)."',
                            '".$database->escape_value($this->lastname)."',
                            '".$database->escape_value($this->email)."',
                            '".$database->escape_value($hashed_password)."',
                            '".$database->escape_value($this->auth_key)."')";

                            $user_saved = $database->query($sql);

                            if($user_saved){
                                global $helper;
                                $helper->Message = 'Registration Successful Login Here';
                                $helper->Location = 'login.php';
                                $helper->set_flash_message();
                            } else {
                                die('cannot save the user register later..!');
                            }

        }

        // function to get ApiUserDetails
        public function get_ApiUserDetails(){

            global $database;

            $this->apiuser_id = intval($his->apiuser_id);
            $sql = "SELECT apiuser_id, firstname, lastname, email, auth_key FROM $this->table 
                    WHERE apiuser_id = ' . $this->apiuser_id . '";
            $result = $database->query($sql);
            $userinfo = $database->fetch_row($result);
            return $userinfo;
        }


    }
    // class Apiusers Ends
?>