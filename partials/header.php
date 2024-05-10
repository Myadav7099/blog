<?php
    include_once(__DIR__.'/head.php');
    $loggedInUser = loggedInUserDetail();
    // print_r($loggedInUser);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="./home.php">
    <img style="width:40px; height:40px; border:2px; border-style: solid; " src="<?php echo $base_url . '/uploads/' . $loggedInUser['unique_name']; ?>" alt="Error">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./post_listing.php">Blog's</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_post.php">Add Post</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="post_listing.php">List</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="logout.php" tabindex="-1" aria-disabled="true">Log Out</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="post_listing.php?keyword=" method="GET">
      <input class="form-control mr-sm-2" value = "<?php //echo $_SESSION['keyword']; ?>" name = "keyword" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

