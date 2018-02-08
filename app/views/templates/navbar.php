<!-- Nav -->
<nav id="nav" class="navbar <?php if(!$logged_in) echo "nav-transparent"; else echo"fixed-nav"?>">
  <div class="container">

    <div class="navbar-header">
      <!-- Logo -->
      <div class="navbar-brand">
        <a class="<?php if(!$logged_in) echo "scroll"?>"
          href="<?php if(!$logged_in) echo "#home";
          else echo $router->pathFor('profile')?>">
          <img class="logo" src="<?=$home?>img/logo.png" alt="logo">
          <img class="logo-alt" src="<?=$home?>img/logo-alt.png" alt="logo">
        </a>
      </div>
      <!-- /Logo -->

      <!-- Collapse nav button -->
      <div class="nav-collapse">
        <span></span>
      </div>
      <!-- /Collapse nav button -->
    </div>

    <!--  Main navigation  -->
    <ul class="main-nav nav navbar-nav navbar-right">
      <?php if(!$logged_in) { ?>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li class="has-dropdown"><a href="#featured">Jobs</a>
        <ul class="dropdown">
          <li><a href="#featured">Featured</a></li>
          <li><a href="#recent">Recent</a></li>
        </ul>
      </li>
      <li><a href="#contact">Contact</a></li>
    <?php } else {
        // if signed in
      ?>

      <li class="has-dropdown"><a href="<?=$router->pathFor('jobs')?>">Jobs</a>
        <ul class="dropdown">
          <li><a href="<?=$router->pathFor('jobs')?>">All</a></li>
          <li><a href="<?=$router->pathFor('create_job')?>">Post New</a></li>
        </ul>
      </li>
      <li><a href="<?=$router->pathFor('signout')?>" id="signout">Sign Out</a></li>

    <?php } ?>
    </ul>
    <!-- /Main navigation -->

  </div>
</nav>
<!-- /Nav -->
