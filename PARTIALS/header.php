<!DOCTYPE html>
<html lang="en">
<?php 
    include('dbconnect.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="PARTIALS/CSS/style.css">
    <link rel="stylesheet" href="PARTIALS/CSS/remixicon.css">


  <header class="header">
    <div class="logo">
      <img src="PARTIALS/images/SiteLogo.png" alt="Logo">
    </div>
    <div class="menu">
      <a href="ui-index.php">HOME</a>
      <a href="ui-shop.php">SHOP</a>
      <a href="ui-about.php">ABOUT</a>
    </div>
    <div class="user-profile-container">
      <img src="PARTIALS/images/user-profile.jpg" alt="User Profile">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User
          </button>
          <div class="dropdown-menu" aria-labelledby="accountDropdown">
            <a class="dropdown-item" href="admin-home.php">Switch to Admin</a>
          </div>
        </div>
      </div>
  </header>
  <body>