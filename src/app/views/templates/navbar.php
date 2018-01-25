<?if(!$logged_in) { ?>
<!-- Nav -->
<nav id="nav" class="navbar nav-transparent">
  <div class="container">

    <div class="navbar-header">
      <!-- Logo -->
      <div class="navbar-brand">
        <a href="<?=$home?>">
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
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li class="has-dropdown"><a href="#featured">Jobs</a>
        <ul class="dropdown">
          <li><a href="#featured">Featured</a></li>
          <li><a href="#recent">Recent</a></li>
        </ul>
      </li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <!-- /Main navigation -->

  </div>
</nav>
<!-- /Nav -->

<? } else { ?>
  <!-- Nav -->
  <nav id="nav" class="navbar">
    <div class="container">

      <div class="navbar-header">
        <!-- Logo -->
        <div class="navbar-brand">
          <a href="<?=$home?>">
            <img class="logo" src="<?=$home?>img/logo.png" alt="logo">
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
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li class="has-dropdown"><a>7</a>
          <ul class="dropdown">
            <li><a href="#">8</a></li>
          </ul>
        </li>
        <li><a href="<?=$router->pathFor('signout')?>" id="signout">Sign Out</a></li>
      </ul>
      <!-- /Main navigation -->

    </div>
  </nav>
  <!-- /Nav -->

<? } ?>
