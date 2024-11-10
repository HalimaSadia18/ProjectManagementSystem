<style>
  .navbar-vertical .navbar-nav>.nav-item .nav-link.active .icon {
  background-image: linear-gradient(310deg, #008000 0%, #008000 100%);
  color: white;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-2" href="index.php">
        <h4 class="text-success fs-5">Project<span class="text-green font-weight-bold">Management</span><br>System</h4>
        <br>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php
          $url=$_SERVER['REQUEST_URI'];
          $url= explode('/',$_SERVER['REQUEST_URI']);
          $url= end($url);
          ?>
          <a class="nav-link <?= $url=='index.php' ? "active" :'' ?>" href="index.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-dark text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-home text-white text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $url=='user.php' ? "active" :'' ?>" href="user.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-dark text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-users text-white text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $url=='project.php' ? "active" :'' ?>" href="project.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-dark text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-book text-white text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Projects</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link  " href="../pages/billing.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-book text-dark text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Pages</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link <?= $url=='task.php' ? "active" :'' ?>" href="task.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-dark text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-book text-white text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Tasks</span>
          </a>
        </li>
        <!-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Enquiries</h6>
        </li> -->
        <li class="nav-item">
          <a class="nav-link <?= $url=='comment.php' ? "active" :'' ?> " href="comment.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-dark text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-file text-white text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Comments</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>