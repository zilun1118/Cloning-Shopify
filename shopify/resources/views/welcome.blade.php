<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('menu design/img/logo/Shopify_logo_01.png')}}" rel="icon">
  <title>Shopify</title>
  <link href="{{ asset('menu design/vendor/fontawesome-free/css/all.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('menu design/vendor/fontawesome-free-5.15.2-web/css/all.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('menu design/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('menu design/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> 
</head>

<body id="page-top">
  <div id="app">
    <div id="wrapper"> 
    <!-- Sidebar will only show after successful login-->
    <nav id="sidebar" v-show="$route.path ==='/' || $route.path ==='/register' || $route.path ==='/forget' ? false: true" style ="display: none;">
      <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
          <div class="sidebar-brand-icon">
            <img src="{{ asset('menu design/img/logo/Shopify_logo_01.png')}}">
          </div>
          <div class="sidebar-brand-text mx-3">Shopify</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="/home">
            <i class="fas fa-home"></i>
            <router-link to="/home">Home</router-link>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fas fa-download"></i>
            <span>Orders</span>
          </a>
          <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <router-link class="collapse-item" to="/orders">All Orders</router-link>
              <!--
              <a class="collapse-item" href="buttons.html">Drafts</a>
              <a class="collapse-item" href="dropdowns.html">Abandoned checkouts</a>
              <!--> 
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-tag"></i>
            <span>Products</span>
          </a>
          <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <router-link class="collapse-item" to="/all-prod">Add Products</router-link>
              <router-link class="collapse-item" to="/inventory">Inventory</router-link>
              <!--
              <a class="collapse-item" href="datatables.html">Transfers</a>
              <a class="collapse-item" href="datatables.html">Collection</a>
              <a class="collapse-item" href="datatables.html">Gift cards</a>
              <!-->
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCus" aria-expanded="true"
            aria-controls="collapseCus">
            <i class="fas fa-user"></i>
            <span>Customers</span>
          </a>
          <div id="collapseCus" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <router-link class="collapse-item" to="/add-customer">Add Customer</router-link>
              <router-link class="collapse-item" to="/customers">All Customer</router-link>
              <!--
              <a class="collapse-item" href="datatables.html">Transfers</a>
              <a class="collapse-item" href="datatables.html">Collection</a>
              <a class="collapse-item" href="datatables.html">Gift cards</a>
              <!-->
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link">
          <i class="fas fa-signal"></i>
            <span>Analytics</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link">
          <i class="fas fa-volume-up"></i>
            <span>Marketing</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link">
          <i class="fas fa-percentage"></i>
            <span>Discounts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link">
          <i class="fas fa-boxes"></i>
            <span>Apps</span>
          </a>
        </li>     
        <br>
        </br>
        <div class="sidebar-heading">
          SALES CHANNELS
        </div>
        <li class="nav-item">
          <a class="nav-link">
          <i class="fas fa-store"></i>
            <span>Online Store</span>
          </a>
        </li>
      </ul>
    </nav>
    
    <div id="content-wrapper" class="d-flex flex-column" >
      <div id="content">
        <!-- TopBar will only display after login -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" id="topbar" 
        v-show="$route.path ==='/' || $route.path ==='/register' || $route.path ==='/forget' ? false: true" style ="display: none;">
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
       
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('menu design/img/boy.png')}}" style="max-width: 60px">
                <router-link to="/logout" class="ml-2 d-none d-lg-inline small">Logout</router-link>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.html">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">  
            <router-view></router-view>
        </div>
        <!---Container Fluid-->
      </div>
     
    </div>
  </div>
</div>


  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ asset('js/app.js')}}"></script>
  <script src="{{ asset('menu design/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('menu design/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('menu design/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('menu design/js/ruang-admin.min.js')}}"></script>
  <script src="{{ asset('menu design/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('menu design/js/demo/chart-area-demo.js')}}"></script>  
  <script type="text/javascript">
    //only display the topbar and sidebar after successful login
    let token = localStorage.getItem('token');
    if(token){
      $("#sidebar").css("display","");
      $("#topbar").css("display","");
    }

  </script>
</body>

</html>