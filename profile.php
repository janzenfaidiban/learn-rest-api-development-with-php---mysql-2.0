<?php
require_once('models/Apiusers.php');
require_once('includes/Helper.php');

if(!isset($_SESSION['userdata']['islogged_in'])){
global $helper;
$helper->Message = 'Kindly Login';
$helper->Location = 'login';
$helper->set_flash_message_Warn();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Hub | Profile</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php
    include 'elements/navigation.php';
    ?>

    <div class="container">

    <div class="col-md-9 m-top-50">
    <?php 
    $api_user->apiuser_id = $_SESSION['userdata']['apiuser_id'];
    $user_info = $api_user->get_ApiUserDetails();
    ?>

    

    <p><strong>Name:</strong> <?php echo ucfirst($user_info['firstname']).
    '&nbsp;'.ucfirst($user_info['lastname']);?></p>
    <p><strong>Email:-</strong> <?php echo $user_info['email']; ?></p>
    <p><strong>Auth_key:-</strong> <?php echo $user_info['auth_key'];?></p>
    </div>

    </div>

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