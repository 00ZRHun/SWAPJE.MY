<header>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <a href="index.php"><img class="logo" src="assets/images/logo/cover2.png" alt="logo" /></a>
      <!-- search( icon & textbox ) -->
      <div class="header_search">
        <!-- icon -->
        <!-- <div id="search_toggle">
          <i class="fa fa-search" aria-hidden="true"></i>
        </div> -->
        <!-- textbox -->
        <form action="#" method="get" id="header-search-form">
          <input type="text" placeholder="Search..." class="form-control">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
      <!-- nav__main-content -->
      <?php if ($_SESSION['login']) { ?>
      <div class="nav__main-content">        
        <div class="nav__main-content-item" onclick="window.location.href = 'messaging.php'">
          <i class="material-icons">chat_bubble_outline</i>
          <span>Messages</span>
        </div>
        <div class="nav__main-content-item">
          <i class="material-icons">notifications_none</i>
          <span>Notifications</span>
        </div>
      <?php } ?>
        <div class="header_wrap" style="margin-left: auto;">
            <div class="user_login">
              <ul>
                <li class="dropdown">
                  <?php if (!$_SESSION['login']) { ?>
                    <ul>
                      <li class="dropdown">
                        <a href="#loginform" data-toggle="modal" data-dismiss="modal" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-user-circle" aria-hidden="true"></i>
                          LOGIN
                        </a>
                      </li>
                    </ul>
                  <?php } else { ?>
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user-circle" aria-hidden="true"></i>
                      <?php
                      $email = $_SESSION['login'];
                      $sql = "SELECT id, firstName, lastName FROM users WHERE email=:email ";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':email', $email, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);

                      $id = 100;

                      if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                          // echo htmlentities($result->firstName . $result->lasstName);
                          $firstName = $result->firstName;
                          $lastName = $result->lastName;
                          echo htmlentities($lastName . $firstName);

                          // GLOBAL VARIABLE( id )
                          $id = $result->id;
                        }
                      }

                      // echo $id;
                      ?>
                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>

                    <!-- dropdown menu( login/- ) -->
                    <ul class="dropdown-menu">
                      <li><a href="profile.php">Profile Settings</a></li>
                      <li><a href="update-password.php">Update Password</a></li>
                      <!-- <li><a href="my-booking.php">My Booking</a></li>
                  <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                  <li><a href="my-testimonials.php">My Testimonial</a></li> -->
                      <li><a href="swap_request.php">Requests</a></li>
                      <li><a href="swap_records-listing.php">Records</a></li>
                      <li><a href="logout.php">Sign Out</a></li>
                    </ul>
                  <?php } ?>
                </li>
              </ul>
            </div>
      </div>
      
      </div>
        <!-- <a href="index.php">Home</a></li> -->
        <!-- <a href="page.php?type=aboutus">About Us</a> -->
        <!-- <a href="car-listing.php">Car Listing</a>           -->
        <!-- <a href="page.php?type=faqs">FAQs</a> -->
        <!-- <li><a href="post-item.php">Post Item</a> -->
        <!-- <a href="contact-us.php">Contact Us</a> -->
        <?php if ($_SESSION['login']) { ?>
          <button class="primary-btn" onclick="window.location.href = 'post-item.php'">Post Item</button>
          <!-- <!-- <a class="nav-link" href="manage-item.php">Manage Item</a> -->
        <?php } ?>
          

      
  </nav>
  <!-- Navigation end -->

</header>