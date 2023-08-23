<?php
ob_start();
                                    include "config.php";
                                    session_start();
                                    if($_SESSION["user_type"]!= "2"){
                                        header("Location:{$hostname}/admin/pages/home.php");
                                    }
                                    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/logos/logo.jpg">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>
    Delete User
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
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
    background-color: rgb(211, 232, 252);
    }
    label{
      color: #2680ea;
    
    }
    h3{
    color: #2680ea;
  }
  h6{
    color: #f20c54;
  }
  </style>
</head>

<body class="">
<?php 
if(isset($_GET['uid'])){

?>

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
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
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="./pages/home.php">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="./sign-in.php">
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
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-md-4 offset-md-4 p-3" style="border:1px solid #2680ea; border-radius:5px; background-color:rgb(252, 211, 211);">
            <h3>Are you want to delete user:- <?php echo $_GET['uid']; ?></h3><hr style="color:#f20c54; padding:1px;">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form" autocomplete="off">
                <input value="Yes" name="yes" type="submit" class="btn btn-lg bg-gradient-danger btn-lg w-100 mt-4 mb-0">
                <input value="No" name="no" type="submit" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">
                
            </form>
            </div>
            <?php 
            if(isset($_POST['yes'])){
                $u_id = $_GET['uid'];
                $sql = "DELETE FROM users WHERE user_id ={$u_id};";
                if(mysqli_multi_query($conn, $sql)){
                    header("Location:{$hostname}/admin/sign-up.php");
                }else{
                    echo "Query failed.";
                }
            }
            if(isset($_POST['no'])){
                header("Location:{$hostname}/admin/sign-up.php");
            }
            
            ?>
                  
          </div>
        </div>
      </div>
    </section>
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
  <?php
   }else{
?>
<h3>Opps! page not found...</h3>

<?php

}
ob_end_flush();

  ?>
</body>

</html>