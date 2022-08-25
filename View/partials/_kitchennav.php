<?php 
  include("../../Url/url.php");

?>
<style type="text/css">
  .size{
    font-size: 12px !important;
  }
  .sidebar .nav .nav-item.active > .nav-link .menu-title{
    color:#02679a !important;
  }
  .sidebar .nav .nav-item.active > .nav-link .menu-icon{
    color:#02679a !important;
  }
</style>

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href= <?php echo($dashborad) ?> >
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
<!-- dropdown -->
<li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic66" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-shopping-cart-full menu-icon"></i>
              <span class="menu-title">Ordering</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic66">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link size" href="<?php echo $ordering["kitchen"]?>">Kitchen Order</a></li>
            </div>
          </li>
<!-- dropdown -->
  
<!-- dropdown -->
        </ul>
      </nav>

