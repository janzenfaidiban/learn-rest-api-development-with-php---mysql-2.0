<?php 
    // headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: ');
    header('Assess-Control-Allow-Method: POST');
    header('Access-Control-Allow-Headers: Origin, content-typ: Auth_key');

    include_once '../../models/Apiusers.php';
    include_once '../../models/Users.php';

    // validate request 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // validate the content-type 
        if($_SERVER['REQUEST_TYPE'] === 'application/json'){

            // get the auth key from the header 
            $headers = apache_request_headers();
            $auth_key = $headers['Auth_Key'];

            $api_user->auth_key = $auth_key; 
            if($Verified == TRUE){

                // get the files data 
                $json = file_get_contents('php://input');
                
                $data = json_decode($json);

                // validating params 
                if($_user->validate_param($data->email)){
                    $user->email = $data->email;
                } else {
                    die(header('HTTP/1.1 402 Email Parameter is required'));
                }

                if($_user->validate_param($data->password)){
                    $user->password = $data->password;
                } else {
                    die(header('HTTP/1.1 402 Password Parameter is required'));
                }

                // check user Credentials
                if($info = $user->check_user_credentials()){
                    echo json_encode($info);
                } else {
                    echo json_encode(array('message' => 'Invalid Email or Password'));
                }

            } else {
                die(header('HTTP/1.1 401 Unauthorized Key used'));
            }
        } else {
            die(header('HTTP/1.1 415 Content type Invalid'));
        }

    } else {
        die(header('HTTP/1.1 405 Request Method  is not Allowed'));
    }


?>