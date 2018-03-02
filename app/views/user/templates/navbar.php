<!-- Nav -->
<nav id="nav" class="navbar fixed-nav">
  <div class="container">

    <div class="navbar-header">
      <!-- Logo -->
      <div class="navbar-brand">
        <a
          href="<?=$router->pathFor('profile')?>">
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
      <li><a href="<?=$router->pathFor('profile')?>"><?=currentUser()->getFirstName()?></a>
      <li class="has-dropdown"><a href="<?=$router->pathFor('jobs')?>">Jobs</a>
        <ul class="dropdown">
          <li><a href="<?=$router->pathFor('jobs')?>">All</a></li>
          <li><a href="<?=$router->pathFor('create_job')?>">Post New</a></li>
        </ul>
      </li>
      <li><a href="<?=$router->pathFor('users')?>">Users</a></li>
      <li><a href="<?=$router->pathFor('signout')?>" id="signout">Sign Out</a></li>

    </ul>
    <!-- /Main navigation -->

  </div>
</nav>
<!-- /Nav -->
