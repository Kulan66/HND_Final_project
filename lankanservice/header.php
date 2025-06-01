<!--common header file for all pages-->

<link href="css/header.css" rel="stylesheet">

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="images/logo without background.png" width="100" height="100" >
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2">Home</a></li>
        <li><a href="about_us.php" class="nav-link px-2">About Us</a></li>
        <li><a href="browse_services.php" class="nav-link px-2">Browse Services</a></li>
      </ul>

    <?php if(isset($buyer_id)){ ?> <!-- if user is logged in -->
        <div class="dropdown text-end">
          <?php
            $select_profile = $conn->prepare("SELECT * FROM `service_buyers` WHERE buyer_id = ?");
            $select_profile->execute([$buyer_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
          ?>
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="uploaded_img/<?= $fetch_profile['profile_picture']; ?>" alt="user_pic" width="60" height="60" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="buyer_bookings.php">My Bookings</a></li>
              <li><a class="dropdown-item" href="buyer_profile.php">My Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
            </ul>
        </div>
    <?php }else{ ?> <!-- if not logged in -->
        <div class="col-md-3 text-end">
            <a href="login.php" type="button" class="btn btn-outline-primary me-2">LOGIN</a>
            <a href="signup.php" type="button" class="btn btn-primary">SIGN-UP</a>
        </div>
    <?php } ?>
 
    </header>
</div>