<?php
ob_start();
session_start();
include "config.php";
if(!isset($_SESSION["user_name"])){
    header("Location:{$hostname}/admin/index.php");

}
$page = basename($_SERVER['PHP_SELF']);
switch ($page) {
    case 'add-patient.php':
        $page_title = "Add New Patient";
        break;

    case 'search-patient.php':
        $page_title = "Search Patient";
        break;

    case 'show.php':
        $page_title = "Patient Details";
        break; 

    case 'transfer-patient.php':
        $page_title = "Transfer Patient";
        break; 
    case 'transfer.php':
        $page_title = "Transfer Patient";
        break; 

    case 'risk-bond.php':
        $page_title = "Risk-Bond";
        break;
    case 'blood-request.php':
        $page_title = "Blood-Request";
        break;
    case 'birth-certificate.php':
        $page_title = "Birth Certificate";
        break;
    case 'search-birth.php':
        $page_title = "Birth Certificate";
        break;
    case 'discharge-bill.php':
        $page_title = "Discharge-Bill";
        break;
    case 'discharge-patient.php':
        $page_title = "Discharge-Bill";
        break;
    case 'discharge-summary.php':
        $page_title = "Discharge-Summary";
        break;
    case 'discharge-list.php':
        $page_title = "Discharge-Summary";
        break;
    default:
        $page_title = "Dashboard | ".$_SESSION['user_name'];
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>


    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76"
      href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logos/logo.jpg">

    <title>
    <?php echo $page_title; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"
      />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
      rel="stylesheet">

    <!-- CSS Files -->

    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4"
      rel="stylesheet" />
      <style>

  label, p{
    color: #2680ea;
  }
  b, h6{
    color: #f20c54;
  }
  
  .quantity-field {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 120px; 
  height: 28px;
  margin: 0 auto;    
}

.quantity-field .value-button{ 
  border: 1px solid #ddd;
  margin: 0px;
  width: 35px;
  height: 100%;   
  padding: 0;
  background:#D1E3FA; 
  outline: none;
  cursor: pointer;
}

.quantity-field .value-button:hover {
  background: #409AF0;
}

.quantity-field .value-button:active{
  background: #409AF0;
}

.quantity-field .decrease-button {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}

.quantity-field .increase-button {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}
 
.quantity-field .number{
  display: inline-block;
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 35px;
  height: 100%;
  line-height: 25px;
  font-size: 11pt;
  box-sizing: border-box; 
  background: white;
  font-family: calibri;
}

.quantity-field .number::selection{
  background: none;
}
.btn:hover{
padding-left:1.4rem;
padding-right:1.4rem;
padding-top:0.6rem;
padding-buttom:0.6rem;
}

input {
  caret-color: #2680ea;
}
input[type="radio"]{
  accent-color: #f20c54;
}
.ps__rail-x,.ps__thumb-x {
    max-width: 100%;
    overflow-x: hidden;
    display:none;
}
  
</style>


  </head>


  <body class="g-sidenav-show bg-gray-100">





    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0
      border-radius-xl my-3 fixed-start ms-3 bg-gradient-info"
      id="sidenav-main">
      <?php 
        $page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
      ?>
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>

        <a class="navbar-brand m-0" href="../index.php"
          target="_blank">
          <img src="../assets/img/logos/logo.jpg" class="navbar-brand-img h-100"
            alt="main_logo">
          <span class="ms-1 font-weight-bold text-white">Adarash Hospital</span>
        </a>
      </div>


      <hr class="horizontal light mt-0 mb-2">

      <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main" style="height: auto;">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'home.php'? 'active':'' ?>" href="./home.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>

              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'add-patient.php'? 'active':'' ?>" href="./add-patient.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">person_add</i>
              </div>

              <span class="nav-link-text ms-1">Add New Patient</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'search-patient.php' || $page == 'show.php'? 'active':'' ?>" href="./search-patient.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">search</i>
              </div>

              <span class="nav-link-text ms-1">Search Patient</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'transfer.php'|| $page == 'transfer-patient.php'? 'active':'' ?>" href="./transfer.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">share</i>
              </div>

              <span class="nav-link-text ms-1">Transfer Patient</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'risk-bond.php'? 'active':'' ?>" href="risk-bond.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">report_problem</i>
              </div>

              <span class="nav-link-text ms-1">Risk Bond</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'blood-request.php' || $page == 'search-blood.php'? 'active':'' ?>" href="search-blood.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">invert_colors</i>
              </div>

              <span class="nav-link-text ms-1">Blood Request</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'discharge-patient.php'|| $page == 'discharge-bill.php'? 'active':'' ?>" href="discharge-patient.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
              </div>

              <span class="nav-link-text ms-1">Discharge Patients </span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'discharge-summary.php' || $page == 'discharge-list.php'? 'active':'' ?>" href="discharge-list.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">receipt</i>
              </div>

              <span class="nav-link-text ms-1">Discharge Summary</span>
            </a>
          </li>
          <li class="nav-item">
             <a class="nav-link text-white <?= $page == 'birth-certificate.php' || $page == 'search-birth.php'? 'active':'' ?>" href="search-birth.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">receipt</i>
              </div>

              <span class="nav-link-text ms-1">Birth Certificate</span>
            </a>
          </li>


          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white
              font-weight-bolder opacity-8">Account pages</h6>
          </li>

          <?php 
              if($_SESSION["user_type"]== '2'){
          ?>

          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'sign-up.php'? 'active':'' ?>" href="../sign-up.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">add</i>
              </div>

              <span class="nav-link-text ms-1">Add New User</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'edit-bill.php'? 'active':'' ?>" href="./edit-bill.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">edit</i>
              </div>

              <span class="nav-link-text ms-1">Edit Bill</span>
            </a>
          </li>

            <?php 
            }
            ?>

          <li class="nav-item">
            <a class="nav-link text-white <?= $page == 'logout.php'? 'active':'' ?>" href="./logout.php">

              <div class="text-white text-center me-2 d-flex align-items-center
                justify-content-center">
                <i class="material-icons opacity-10">logout</i>
              </div>

              <span class="nav-link-text ms-1">Logout</span>
            </a>
          </li>
        </ul>
      </div>

    </aside>

    <main class="main-content border-radius-lg ">
      <!-- Navbar -->

      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none
        border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
          
          <img id="logo" src="../assets/img/logos/logo.jpg" style="height: 4.5rem; margin: 0;"></img>
          <div class=" font-weight-bold text-black d-block d-sm-none">Adarash Hospital</div>
          <form class="search-post m-0" action="search-patient.php" method ="GET" autocomplete="off">
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
            id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

              <div class="input-group input-group-outline">
                <label class="form-label">Search</label>
                <input type="text" name="search1" class="form-control">
              </div> 
                  <a href="./search-patient.php">
                  <button type="submit" class="bg-gradient-info ms-1" style="border: 1px solid #47a1f1; color: #fff;padding: 0px 10px; border-radius: 5px;" >
                          <i class="material-icons opacity-10" style="padding-top: 8px;">search</i>
                  </button>
                  </a>
            </div>
            <ul class="navbar-nav justify-content-end">
            <i class="material-icons opacity-10 text-info me-1" style="font-size:25px;" >account_circle</i>
              
              <li class="nav-item d-flex align-items-center d-none d-sm-block">
                

                  <span class="d-sm-inline d-none">Hello, <b><?php echo $_SESSION["user_name"]; ?></b></span>

              </li>
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0"
                  id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
              
            </ul>
          </div>
          </form>
        </div>
      </nav>

      <!-- End Navbar -->