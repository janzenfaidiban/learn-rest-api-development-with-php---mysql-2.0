<?php
require_once('includes/Forms.php');
require_once('models/Apiusers.php');
require_once('includes/Helper.php');

//register Apiusers processing
if(isset($_POST['register'])){
$form->StickyData = $_POST;
$form->checkEmpty('firstname');
$form->checkEmpty('lastname');
$form->checkEmpty('email');
$form->checkEmpty('password');
$form->checkEmpty('confirmpassword');
$form->compare('password','confirmpassword');

$api_user->email = $_POST['email'];
$EmailAvailable = $api_user->check_email();

if($EmailAvailable == FALSE){
$form->raiseCustomError('email', 'Email is already in use..!');
}

if($form->valid == true){ //checking if the registartion form is free of errors
$api_user->firstname = $_POST['firstname'];
$api_user->lastname = $_POST['lastname'];
$api_user->email = $_POST['email'];
$api_user->password = $_POST['password'];

//insert user to database
$api_user->create_ApiUser();
}

}//Register Form Processing ends

//making register form
$form->form_open('register', 'register_form');
$form->makeInput('First Name', 'firstname');
$form->makeInput('Last Name', 'lastname');
$form->makeInputEmail('Your Email', 'email');
$form->makePassword('Enter Password', 'password');
$form->makePassword('Confirm Password', 'confirmpassword');
$form->makeSubmit('register');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Hub | Register</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
   
   <!-- Navigation Starts -->
<?php include 'elements/navigation.php' ?>
   <!-- Navigation Ends -->


<!-- App Form Starts -->
<div class="container">
<div class="col-md-8">

<div class="app_form m-top-50">
<h2 class="display-5">Register Here...!</h2>
<?php
//Displaying Register Form
echo $form->HTML;
?>
</div>


</div>
</div>

<!-- App Form Ends -->

<!-- Footer Starts -->
<footer class="footer">
<div class="container">
<span class="text-muted">Rest API Development Tutorials Udemy | Frank John</span>
</div>
</footer>
<!-- Footer Ends -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.js"></script>
</body>
</html>