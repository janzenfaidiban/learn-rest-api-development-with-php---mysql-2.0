<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
  <a class="navbar-brand" href="index">Article Hub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>

     <?php 
     if(isset($_SESSION['userdata']['islogged_in'])){
      ?>

      <li class="nav-item">
        <a class="nav-link" href="profile">Profile</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout">Logout</a>
      </li>

    <?php
     }else{
     ?>

    <li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="register">Register</a>
      </li>
      <?php
     }
      ?>
    </ul>
  </div>
  </div>
</nav>