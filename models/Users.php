<?php
// require_once('../includes/Database.php');
// require_once('../includes/Bcrypt.php');

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}includes{$ds}Database.php");
require_once("{$base_dir}includes{$ds}Bcrypt.php");


class Users{

    private $table = 'users';

    //Users Properties
    public $user_id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;

    public function __construct(){

    }

    //validating user param
    public function validate_param($value){
        if(!empty($value)){
            return true;
        }else{
            return false;
        }
    }


     //check unique email
     public function check_unique_email(){
        global $database;
        $this->email = trim(htmlspecialchars(strip_tags($this->email)));
        $sql = "SELECT user_id FROM ". $this->table ." WHERE 
                email = '".$database->escape_value($this->email)."' ";
        
                $result = $database->query($sql);
                $UserInfo = $database->fetch_row($result);

                if(empty($UserInfo)){
                    return true;
                }else{
                    return false;
                }
    }



    //create User
    public function create_User(){
        //clean data
        $this->firstname = trim(htmlspecialchars(strip_tags($this->firstname)));
        $this->lastname = trim(htmlspecialchars(strip_tags($this->lastname)));
        $this->email = trim(htmlspecialchars(strip_tags($this->email)));
        $this->password = trim(htmlspecialchars(strip_tags($this->password)));

        //hash the password => return hashed password
        $hashed_password = Bcrypt::hashPassword($this->password);

        global $database;

        $sql = "INSERT INTO $this->table (firstname, lastname, email, password)
                VALUES ('".$database->escape_value($this->firstname)."',
                        '".$database->escape_value($this->lastname)."',
                        '".$database->escape_value($this->email)."',
                        '".$database->escape_value($hashed_password)."')";

                $user_saved = $database->query($sql);

                if($user_saved){
                    return true;
                }else{
                    return false;
                }
    }


    // function to check users credentials
    public function check_user_credentials(){

        $this->email = trim(htmlspecialchars(strip_tags($this->email)));

        global $database;

        $sql = "SELECT user_id, firstname, lastname, email, password FROM ". $this->table ."
        WHERE email = '".$database->escape_value($this->email)."'";

        $result = $database->query($sql);
        $user_info = $database->fetch_row($result);

        if(!empty($user_info)){
            //match the password
            $hashed_password = $user_info['password'];

            $password = trim(htmlspecialchars(strip_tags($this->password)));

            //match password using bcrypt
            $match_password = Bcrypt::checkPassword($password, $hashed_password);

            if($match_password){
                return $this->get_UserDetails();
            }else{
                return false;
            }
        }
    }
    

        // public function UserDetails
        public function get_UserDetails(){

            global $database;
    
            $this->email = trim(htmlspecialchars(strip_tags($this->email)));
    
            $sql = "SELECT user_id, firstname, lastname, email FROM ". $this->table ."
                    WHERE email = '".$database->escape_value($this->email)."'";
    
            $result = $database->query($sql);
            $userinfo = $database->fetch_row($result);
            return $userinfo;
        }

} // class Ends

//instance of the class
$user = new Users();

?>