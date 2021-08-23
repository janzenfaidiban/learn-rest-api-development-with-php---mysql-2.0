<?php
require_once('includes/Forms.php');
require_once('models/Apiusers.php');
require_once('includes/Helper.php');

//login Apiuser process
if(isset($_POST['login'])){
$form->StickyData = $_POST;
$form->checkEmpty('email');
$form->checkEmpty('password');

if($form->valid == TRUE){
$api_user->email = $_POST['email'];
$api_user->password = $_POST['password'];

//check Login
if($user_info = $api_user->check_user_credentials()){
$_SESSION['userdata']['islogged_in'] = 1; // initializing islogged_in variable a value setting it to true
$_SESSION['userdata']['apiuser_id'] = $user_info['apiuser_id'];

//if login credentials are true then use helper class for setting flash message
// and redirect the user to profile view
global $helper;
$helper->Message = 'You have successfully logged in';
$helper->Location = 'profile.php';
$helper->set_flash_message();
exit; 
}else{
    $form->raiseCustomError('email', 'Invalid Email or Password');
}

}

}



//making login form
$form->form_open('login', 'login');
$form->makeInputEmail('Your Email', 'email');
$form->makePassword('Your Password', 'password');
$form->makeSubmit('login');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Hub | Login</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
   
   <!-- Navigation Starts -->
<?php include 'elements/navigation.php' ?>
   <!-- Navigation Ends -->


<!-- App Form Starts -->
<div class="container">


<?php
//displaying success session flash message
if(isset($_SESSION['flash_message']['success'])){
?>
<div class="alert alert-success alert-dismissable m-top-50">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success! </strong> <?php echo $_SESSION['flash_message']['success']; ?>
</div>
<?php
//unset session flash message
unset($_SESSION['flash_message']['success']);
}
?>




<?php
//displaying success warning flash message
if(isset($_SESSION['flash_message']['warning'])){
?>
<div class="alert alert-warning alert-dismissable m-top-50">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Warning! </strong> <?php echo $_SESSION['flash_message']['warning']; ?>
</div>
<?php
//unset session flash message
unset($_SESSION['flash_message']['warning']);
}
?>


<?php
//displaying error session flash message
if(isset($_SESSION['flash_message']['error'])){
?>
<div class="alert alert-danger alert-dismissable m-top-50">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Danger! </strong> <?php echo $_SESSION['flash_message']['error']; ?>
</div>
<?php
//unset session flash message
unset($_SESSION['flash_message']['error']);
}
?>



<div class="col-md-8">

<div class="app_form m-top-50">
<h2 class="display-5">Login Here...!</h2>

<?php
//displaying login form here
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