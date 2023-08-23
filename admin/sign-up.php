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
    sign-up page
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
    background-color: #fff;
    }
    label{
      color: #2680ea;
    
    }
    p{
    color: #2680ea;
  }
  h6{
    color: #f20c54;
  }
  </style>
</head>

<body class="">
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
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0  justify-content-center flex-column">
              <div class="position-relative bg-gradient-info h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('./assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              <?php 
                
              
                $sql = "SELECT user_id,user_name,user_type FROM users ORDER BY user_id ASC";
                $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                ?>
                  <div class="card mb-2">
                    
                    <div class="card-body p-3">
                    
                      <div class="row">
                        <div class="col-12">
                          <h3 style="text-align:center;color:#2680ea;">User Details</h3><hr style="color:#f20c54; padding:1px;">
                          <div class="table-responsive">
                            <table class="table table-hover align-items-center ">
                              <tbody >
                              <?php 
                              $total_record = mysqli_num_rows($result);
                              if($total_record >0){
                              while($row = mysqli_fetch_assoc($result)) {
                              ?>
                                <tr class="row">
                                    <td class="col">
                                      <div class="d-flex px-0 
                                        ">
                                        <div class="ms-2">
                                          <p class="text-xs font-weight-bold mb-0 ">User Id:</p>
                                          <h6 class="text-sm font-weight-normal mb-0
                                            "><?php echo $row['user_id']; ?></h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">User Name:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['user_name']; ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">User:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php switch ($row['user_type']) {
                                            case '1':
                                              $value= "Doctor";
                                              break;
                                            case '2':
                                              $value= "Admin";
                                              break;
                                            default:
                                              $value= "Reception";
                                              break;
                                          } 
                                          echo $value;
                                          ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">More:</p>
                                        <a href="delete-user.php?uid=<?php echo $row['user_id']; ?>" class="btn m-0 bg-gradient-danger <?php if($row['user_type'] == 2){ echo "d-none";} ?>" data-toggle="modal" data-target="#myModal" style="padding: 0px 5px;">Delete</a>
                                        <a href="sign-up.php?uid=<?php echo $row['user_id']; ?>" class="btn bg-gradient-info m-0" style="padding: 0px 5px;">Edit</a>
                                      </div>
                                    </td>
                                  </tr>
                                  <!-- Modal -->
  
                                  <?php 
                                    }
                                  }else{
                                    echo "<h2>No record found.</h2>";
                                  }
                                  ?>
                               
                              </tbody>
                            </table>

                          </div>
                        </div>
                        
                      </div>
                      
                    </div>
                    </div>

              </div>
            </div>
                                  <?php 
                                  
                                  if(isset($_GET['uid'])){
                                    $u_id = $_GET['uid'];
                                    $sql = "SELECT user_id,user_name,user_type FROM users
                                    WHERE user_id = {$u_id}";
                                    
                                      
                                    $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                                    if(mysqli_num_rows($result) >0){
                                         while($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5 mt-5">
              <div class="card card-plain">
                <div class="card-header" style="background-color: #2680ea;">
                  <h4 class="font-weight-bolder" style="text-align:center;color:#fff;">Edit User</h4>
                  <p class="mb-0" style="text-align:center; color:#fff;">Change Username and Password of User:<?php echo $row['user_id']; ?></p>
                </div>
                <div class="card-body">

                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form" autocomplete="off">
                    <div class=" mb-3">
                      <label for="username">Username</label>
                      <input name="username" type="text" class="form-control" placeholder="username" value="<?php echo $row['user_name']; ?>" required>
                    </div>
                    
                    <div class=" mb-3">
                      <label for="password">Password</label>
                      <input name="password" type="password" class="form-control" placeholder="password" value="" required>
                    </div>
                    <div class=" mb-3">
                      <label for="type" >User Type</label>
                                        <select class="form-control" name="type" id="type" <?php if($row['user_type']==2){ echo "disabled";} ?> required>
                                          <option value="0" <?php if($row['user_type']==0){ echo "selected";} ?> >Reception</option>
                                          <option value="1" <?php if($row['user_type']==1){ echo "selected";} ?> >Doctor</option>
                                          <option value="1" <?php if($row['user_type']==2){ echo "selected";} ?> >Admin</option>
                                        </select>
                                      </div>
                    
                    <div class="text-center">
                      <input value="change" name="change" type="submit" class="btn btn-lg bg-gradient-warning btn-lg w-100 mt-4 mb-0">
                    </div>
                  </form>
                                  <?php
                                  }
                                }
                                  }else{
                                  
                                  
                                  
                                  ?>

            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5 mt-5">
              <div class="card card-plain">
                <div class="card-header" style="background-color: #2680ea;">
                  <h4 class="font-weight-bolder" style="text-align:center;color:#fff;">Add New User</h4>
                  <p class="mb-0" style="text-align:center; color:#fff;">Enter your username and password to register</p>
                </div>
                <div class="card-body">

                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form" autocomplete="off">
                    <div class=" mb-3">
                      <label for="username">Username</label>
                      <input name="username" type="text" class="form-control" placeholder="username" required>
                    </div>
                    
                    <div class=" mb-3">
                      <label for="password">Password</label>
                      <input name="password" type="password" class="form-control" placeholder="password" required>
                    </div>
                    <div class=" mb-3">
                      <label for="type" >User Type</label>
                                        <select class="form-control" name="type" id="type" required>
                                          <option value="0">Reception</option>
                                          <option value="1">Doctor</option>
                                        </select>
                                      </div>
                    
                    <div class="text-center">
                      <input value="Add" name="save" type="submit" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">
                    </div>
                  </form>
                  <?php 
}
if(isset($_POST['save'])){

   $username = mysqli_real_escape_string($conn,$_POST['username']);
   $password = mysqli_real_escape_string($conn,md5($_POST['password']));
   $usertype = mysqli_real_escape_string($conn,$_POST['type']);

   $sql = "SELECT user_name FROM users WHERE user_name = '{$username}'";
   $result = mysqli_query($conn, $sql) or die("Query failed.");

   if(mysqli_num_rows($result) >0){
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Username Already Exists</p>";
   }else{
    $sql1 = "INSERT INTO users (user_name,user_password,user_type)
            VALUES ('{$username}','{$password}','{$usertype}')";
        if(mysqli_query($conn,$sql1)){
            header("Location:{$hostname}/admin/sign-up.php");
        }
}
}
if(isset($_POST['change'])){
   $u_id = $_GET['uid'];
   $username = mysqli_real_escape_string($conn,$_POST['username']);
   $password = mysqli_real_escape_string($conn,md5($_POST['password']));
   $usertype = mysqli_real_escape_string($conn,$_POST['type']);

   $sql = "UPDATE users SET user_name='{$username}',user_password='{$password}',user_type='{$usertype}'
   WHERE user_id = $u_id";

  if(mysqli_query($conn,$sql)){
      header("Location:{$hostname}/admin/sign-up.php");
  }

}
ob_end_flush();
?>

                </div>
                
              </div>
            </div>
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
</body>

</html>