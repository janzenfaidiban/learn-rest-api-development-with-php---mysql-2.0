<?php
    require_once('includes/Forms.php');
    require_once('models/Apiusers.php');
    require_once('includes/Helpers.php');

    // register Apiuser process
    if(isset($_POST['Register'])){

        $form->StickyData = $_POST;
        $form->checkEmpty('firstname');
        $form->checkEmpty('lastname');
        $form->checkEmpty('email');
        $form->checkEmpty('password');
        $form->checkEmpty('confirmpassword');
        $form->compare('password', 'confirmpassword');

        // check for unique email
        $EmailAvailable = $api_user->check_email();

        if($EmailAvailable == FALSE){
            $form->raiseCustomError('email', 'Email is already in use..!');
        }

        if($form->valid == true){ // checking if the registration form is free of errors
            $api_user->firstname    = $_POST['firstname'];
            $api_user->lastname     = $_POST['lastname'];
            $api_user->email        = $_POST['email'];
            $api_user->password     = $_POST['password'];

            // insert user to the database
            $api_user->create_ApiUser();
            
        }

    }










    // making register from
    $form->form_open('register', 'register_form');
    $form->makeInput('First Name', 'firstname');
    $form->makeInput('Last Name', 'lastname');
    $form->makeInputEmail('Your Email', 'email');
    $form->makePassword('Enter Password', 'password');
    $form->makePassword('Confirm Password', 'confirmpassword');
    $form->makeSubmit('Register');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Hub | Register</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

    <!-- Navigation Starts -->
    <?php include'elements/navigation.php'; ?>
    <!-- Navigation Ends -->

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                <!-- App Form Starts -->
                <div class="h-100 p-5 bg-light border rounded-3 m-top-50 app_form shadow-lg">
                    <h2>Register Here..!</h2>
                    <hr class="my-4">
                    <?php 
                        // Displaying Register Form
                        echo $form->HTML;
                    ?>
                </div>
                <!-- App Form Ends -->

            </div>
        </div>
    </div>

    <!-- Footer Starts -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Learn Rest API Development Tutorial Udemy | Janzen Faidiban. <a href="https://sacode.web.id" target="_blank" class>SaCode</a></span>
        </div>
    </footer>
    <!-- Footer Ends -->

    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.js"></script>
</body>
</html>