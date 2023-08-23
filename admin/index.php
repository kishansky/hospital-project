<?php

?>
<?php
                                    include "config.php";
                                    session_start();
                                    if(isset($_SESSION["user_name"])){
                                        header("Location:{$hostname}/admin/pages/home.php");
                                    }

                        if(isset($_POST['login'])){

                            $username = mysqli_real_escape_string($conn,$_POST['username']);
                            $password = mysqli_real_escape_string($conn,md5($_POST['password']));
                    

                            $sql = "SELECT user_id,user_name,user_type FROM users WHERE user_name = '{$username}' AND user_password ='{$password}'";
                            $result = mysqli_query($conn,$sql) or die("Query Failed.");

                            if(mysqli_num_rows($result) > 0){

                                while($row =mysqli_fetch_assoc($result)){
                                    $_SESSION["user_name"] = $row['user_name'];
                                    $_SESSION["user_id"] = $row['user_id'];
                                    $_SESSION["user_type"] = $row['user_type'];
                                    header("Location:{$hostname}/admin/pages/home.php");
                                }
                              
                            }else{
                                echo '<div class="alert alert-info">Username and Password are not match.</div>';
                            }
                        }
                        
                        ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Login page
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4 ">
          <div class="container-fluid ps-1 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-2 " href="../index.html">
              <img id="logo" src="./assets/img/logos/logo.jpg" style="height: 2.5rem; margin: 0;"></img>
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../index.php">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Home
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row mt-5">
          <div class="col-lg-4 col-md-8 col-12 mx-auto mt-5">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
                  <div class="row mt-3">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form" class="text-start" autocomplete="off">
                  <div class="input-group input-group-outline my-3" id="navbar">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  
                  <div class="text-center">
                    <!-- <input name="login" type="button" value="login" class="btn bg-gradient-info w-100 my-4 mb-2"> -->
                    <input type="submit" name="login" class="btn btn-info" value="login" />

                  </div>
                  
                </form>
                
           
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                copyright Ⓒ Adarsh Hospital
              </div>
            </div>
            
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
