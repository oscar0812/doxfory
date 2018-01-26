<!-- Nav -->
<nav id="nav" class="navbar <?if(!$logged_in) echo "nav-transparent"; else echo"fixed-nav"?>">
  <div class="container">

    <div class="navbar-header">
      <!-- Logo -->
      <div class="navbar-brand">
        <a class="<?if(!$logged_in) echo "scroll"?>"
          href="<? if(!$logged_in) echo "#home";
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
      <?if(!$logged_in) {?>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li class="has-dropdown"><a href="#featured">Jobs</a>
        <ul class="dropdown">
          <li><a href="#featured">Featured</a></li>
          <li><a href="#recent">Recent</a></li>
        </ul>
      </li>
      <li><a href="#contact">Contact</a></li>
      <? } else {
        // if signed in
      ?>
      <li><a href="<?=$router->pathFor('job')?>">Jobs</a></li>
      <li><a href="<?=$router->pathFor('signout')?>" id="signout">Sign Out</a></li>
      <? } ?>
    </ul>
    <!-- /Main navigation -->

  </div>
</nav>
<!-- /Nav -->
