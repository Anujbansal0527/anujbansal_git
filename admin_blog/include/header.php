<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <div class="logo">
    <a href="home.php" class="logo"><img src="../assets/images/logo.png" width="110" align="middle" border="0" /></a>
  </div>
  <!--logo end-->


  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">
      <!-- user login dropdown start-->
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <span class="profile-ava">
            <img alt="" src="img/avatar1_small.jpg">
          </span>
          <?php
          $query = "SELECT * FROM admin";
          $query_run = mysqli_query($con, $query);
          $post = mysqli_fetch_array($query_run)
          ?>
          <span class="username"><?php echo $_SESSION['admin_blog_login']; ?></span>
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <!-- <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li> -->
          <li><a class="current" href="home.php"><i class="icon_house_alt"></i> Admin Home</a></li>
          <li><a href="adminsetting.php"><i class="icon_documents_alt"></i> Admin Setting</a></li>
          <li><a href="logout.php"><i class="icon_key_alt"></i> Log Out</a></li>
        </ul>
      </li>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>