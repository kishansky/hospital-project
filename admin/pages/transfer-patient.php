<?php 
include "header.php"; 
$p_id;

?>


      <div class="container-fluid py-4">


        <div class="row">
          <div class="col-lg-7 position-relative z-index-2 w-lg-100">
            <div class="card card-plain mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column h-100">
                      <h2 class="font-weight-bolder mb-0">Transfer Patient</h2>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            

            <div class="row mt-4">
              <div class="col-md-6 offset-md-3">
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                      <label class="form-label">Patient's Id</label>
                      <input type="text" name="search" class="form-control">
                    </div> 
                        <button type="submit" class="bg-gradient-info ms-1" style="border: 1px solid #47a1f1; color: #fff;padding: 0px 10px; border-radius: 5px;" >
                          <i class="material-icons opacity-10" style="padding-top: 8px;">search</i>
                        </button>
                  </div> 
              </form>
                
                
              </div>
            </div>
            <div class="row mt-4 mt-md-5">
                <div class="col-12">
                <?php 
                
              if(isset($_POST['search'])){

                $search = mysqli_real_escape_string($conn,$_POST['search']);
                $sql = "SELECT * FROM patients WHERE p_id = '{$search}'";
                $result = mysqli_query($conn,$sql) or die ("Query Failed.");

              }elseif(isset($_GET['pid'])){

              $p_id = $_GET['pid'];
              $sql = "SELECT * FROM patients
                      WHERE p_id = {$p_id}";
              $result = mysqli_query($conn,$sql) or die ("Query Failed.");
              }else{
                $limit = 1;
              $sql = "SELECT * FROM patients WHERE p_transfer != '1' ORDER BY p_id DESC LIMIT $limit";
              $result = mysqli_query($conn,$sql) or die ("Query Failed.");

              }
             if(mysqli_num_rows($result) >0){
               while($row = mysqli_fetch_assoc($result)) {
                $p_id = $row['p_id'];
                $last_transfer = $row['p_transfer'];
              ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">

<div class="card mb-4 ">
    
    <div class="d-flex">
        <div class="bg-gradient-info
          shadow text-center border-radius-xl mt-n3 ms-4 p-2 mb-2 pe-3">
          <span class="mt-2 mb-2 ms-2 text-white ">Patient's Id: <?php echo $row['p_id']; ?></span>
        </div>
        <h6 class="ms-4 text-danger">Required Field</h6>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive" style="overflow-x: unset;">
              <table class="table align-items-center ">
                <tbody>
                <tr class="row">
                                    <td class="col-md-4 col-sm-6">
                                      <div class="d-flex px-2 py-1">
                                        <div class="input-group input-group-outline is-focused">
                                          <label style="color: #2680ea;" for="patient_name" class="form-label">Patient's Name</label>
                                          <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="pname" name="p_name" value="<?php echo $row['p_name']; ?>" readonly >
                                        </div>
                                      </div>
                                    </td>
                                    <td class="col-md-4 col-sm-6">
                                      <div class="px-2 py-1">
                                        <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="patient_add" class="form-label">Address</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="p_address" name="p_address" value="<?php echo $row['p_address']; ?>" readonly >
                                      </div>
                                      </div>
                                    </td>
                                    <td class="col-md-4 col-sm-6">
                                      <div class="px-2 py-1">
                                        <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="p_mobile" class="form-label">Mobile no</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="page" name="p_phone" maxlength="10" value="<?php echo $row['p_mobile']; ?>" >
                                      </div>
                                      </div>
                                    </td>
                                    
                                    </tr>
                                    <tr class="row">
                                    <td class="col-md-4 col-sm-6">
                                        <div class="px-2 py-1">
                                          <div class="input-group input-group-outline is-focused">
                                          <label style="color: #2680ea;" for="patient_age" class="form-label">Age in Yrs</label>
                                          <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="page" name="p_age" value="<?php echo $row['p_age']." Yrs"; ?>" readonly >
                                        </div>
                                        </div>
                                      </td>
                                      <td class="col-md-4 col-sm-6">
                                        <div class="px-2 py-1">
                                          <div class="input-group input-group-outline is-focused">
                                          <label style="color: #2680ea;" for="weight" class="form-label">Weight in Kg</label> 
                                          <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="wt" name="wt" value="<?php echo $row['p_weight']. " Kg"; ?>" readonly >
                                        </div>
                                        </div>
                                        </td>
                          
                                      <td class="col-md-4 col-sm-6">
                                        <div class="d-flex px-2 py-1 ">
                                          <div class="">
                                            <label for="sex">Sex:-</label>
                                            <input  type="radio" name="sex_name" id="male" value="0" <?php if($row['p_sex']==0){ echo "checked";} ?> readonly >
                                            <label for="male">Male</label>
                                            <input type="radio" name="sex_name" id="female" value="1" <?php if($row['p_sex']==1){ echo "checked";} ?> >
                                            <label for="female">Female</label>
                                            <input type="radio" name="sex_name" id="other" value="2" <?php if($row['p_sex']==2){ echo "checked";} ?> >
                                            <label for="other">Other</label>
                                          </div>
                                        </div>
                                      </td>
                                      
                                      </tr>
                                      
                                 
                                </tbody>
                              </table>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                </div>
                <div class="card mb-4 ">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive" style="overflow-x: unset;">

                          <table class="table align-items-center ">
                            <tbody>   
                              <tr class="row">
                                <td class="col">
                                  <div class="d-flex px-2 py-1">
                                    <div class="input-group input-group-outline is-focused">
                                      <label style="color: #2680ea;" for="bp" class="form-label">B.P. in 'mm of hg'</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" value="<?php echo $row['p_bp']; ?>" class="form-control" type="text" id="bp" name="bp" size="7">
                                    </div>
                                  </div>

                                  </div>
                                </td>
                                <td class="col">
                                  <div class="px-2 py-1">
                                  <div class="input-group input-group-outline is-focused">
                                    <label style="color: #2680ea;" for="Pulse" class="form-label">Pulse in '/min'</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" value="<?php echo $row['p_pulse']; ?>" type="text" id="pulse" name="pulse" size="3">
                                  </div>
                                  </div>

                                </td>
                                <td class="col">
                                  <div class="px-2 py-1">
                                  <div class="input-group input-group-outline is-focused">
                                    <label style="color: #2680ea;"for="spo2" class="form-label">SPO2 in '%'</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" value="<?php echo $row['p_spo2']; ?>" type="text" id="spo2" name="spo2" size="3">
                                  </div>
                                  </div>

                                </td>
                                
                                </tr>
                                <tr class="row">
                                  <td class="col">
                                    <div class="d-flex px-2 py-1">
                                      <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="temp" class="form-label">Temp in '&#8457;'</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" value="<?php echo $row['p_temp']; ?>" id="temp" name="temp" size="3"> 
                                      </div>
                                    </div>
                                  </td>
                                  <td class="col">
                                    <div class="px-2 py-1">
                                    <div class="input-group input-group-outline is-focused">
                                      <label style="color: #2680ea;" for="rr" class="form-label">RR in '/min'</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" value="<?php echo $row['p_rr']; ?>" type="text" id="rr" name="rr" size="3">
                                    </div>
                                    </div>

                                  </td>
                                  <td class="col">
                                    <div class="px-2 py-1">
                                    <div class="input-group input-group-outline is-focused">
                                      <label style="color: #2680ea;" for="height" class="form-label">Ht in 'cm'</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" value="<?php echo $row['p_ht']; ?>" type="text" id="height" name="height" size="3">
                                    </div>
                                    </div>

                                  </td>
                                  
                                  </tr>
                                  <tr class="row">
                                    <td class="col">
                                      <div class="d-flex px-2 py-1">
                                      <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="bmi" class="form-label">B.M.I. in 'kg/m2'</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" value="<?php echo $row['p_bmi']; ?>" type="text" id="bmi" name="bmi" size="3">
                                      </div>
                                      </div>

                                    </td>
                                    <td class="col">
                                      <div class="px-2 py-1">
                                      <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="lmp" class="form-label">LMP</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" value="<?php echo $row['p_lmp']; ?>" type="date" id="lmp" name="lmp">
                                      </div>
                                      </div>

                                    </td>
                                    <td class="col">
                                      <div class="px-2 py-1">
                                      <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="edd" class="form-label">EDD</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" value="<?php echo $row['p_edd']; ?>" type="date" id="edd" name="edd">
                                      </div>
                                      </div>

                                    </td>
                                  </tr>
                                  <tr class="row">
                                        <td class="col-md-4 col-sm-6">
                                          <div class="d-flex px-2 py-1">
                                            <div class="input-group input-group-outline is-focused">
                                            <label style="color: #2680ea;" for="gurdian" class="form-label">Gurdian</label>
                                            <input style="border-color: #2680ea; color: #2680ea;"class="form-control" type="text" name="gurdian" id="gurdian" value="<?php echo $row['gurdian']; ?>">
                                          </div>
                                          </div>
                                        </td>
                                      </tr>
                                  <tr class="row pt-3">
                                    <td class="col-4">
                                      <div class="d-flex px-2">
                                        <div class="input-group input-group-outline is-focused">
                                            <label for="doctor" class="form-label">Appoiment to:</label>
                                            <select name="doctor" id="dr"  class="form-control" style="border-color: #2680ea; color: #2680ea;">
                                              <option value="1" <?php if($row['doctor']==1){ echo "selected";} ?> >Dr. Manoj Kumar</option>
                                              <option value="2" <?php if($row['doctor']==2){ echo "selected";} ?> >Dr. Rasmi Rai</option>
                                              <option value="3" <?php if($row['doctor']==3){ echo "selected";} ?> >Dr. Ekbal Singh</option>
                                              <option value="4" <?php if($row['doctor']==4){ echo "selected";} ?> >Dr. B.K. Rai</option>
                                              <option value="5" <?php if($row['doctor']==5){ echo "selected";} ?> >Dr. R.S. Gupta</option>
                                            </select>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="col-4">
                                  <div class="d-flex px-2">
                                    <div class="input-group input-group-outline is-focused">
                                        <label for="p_transfer" class="form-label">Transfer to:</label>
                                          <select name="p_transfer" id="tr" class="form-control" style="border-color: #2680ea; color: #2680ea;">
                                            <option value="0" <?php if($row['p_transfer']==0){ echo "selected";} ?> >Normal</option>
                                            <option value="1" <?php if($row['p_transfer']==1){ echo "selected";} ?> >IPD</option>
                                            <option value="2" <?php if($row['p_transfer']==2){ echo "selected";} ?> >OT</option>
                                            <option value="3" <?php if($row['p_transfer']==3){ echo "selected";} ?> >ICU</option>
                                            <option value="4" <?php if($row['p_transfer']==4){ echo "selected";} ?> >NICU</option>
                                            <option value="5" <?php if($row['p_transfer']==5){ echo "selected";} ?> >HDU</option>
                                          </select>
                                      
                                    </div>
                                  </div>
                                </td>
                         <td class="col-4">
                    
                          <div class="px-2 ">
                          <input name="save" class="btn bg-gradient-info float-end me-4" type="submit" value="Save">
                          </div>
                          <div class="px-2 ">
                          <a href="./transfer-patient.php">
                          <button type="submit" name="transfer" class="btn bg-gradient-warning float-end me-4">Transfer</button>
                          </a>
                          </div>
                         </td>
                        </tr>
                      </tbody>
                    </table>
                      </div>
                    </div>
      
                   </div>
                 </div>
                </div>
              </form>
              <?php
               }
              }else{
              echo "Enter Ptient's Id ";
              }

              

if(isset($_POST['save'])){
  
  $p_mobile = mysqli_real_escape_string($conn,$_POST['p_phone']);
  $gurdian = mysqli_real_escape_string($conn,$_POST['gurdian']);
  $p_bp = mysqli_real_escape_string($conn,$_POST['bp']);
  $p_pulse = mysqli_real_escape_string($conn,$_POST['pulse']);
  $p_spo2 = mysqli_real_escape_string($conn,$_POST['spo2']);
  $p_tem = mysqli_real_escape_string($conn,$_POST['temp']);
  $p_rr = mysqli_real_escape_string($conn,$_POST['rr']);
  $p_ht = mysqli_real_escape_string($conn,$_POST['height']);
  $p_bmi = mysqli_real_escape_string($conn,$_POST['bmi']);
  $p_lmp = mysqli_real_escape_string($conn,$_POST['lmp']);
  $p_edd = mysqli_real_escape_string($conn,$_POST['edd']);
  $doctor = mysqli_real_escape_string($conn,$_POST['doctor']);
  $sql = "UPDATE patients SET p_mobile='{$p_mobile}',gurdian='{$gurdian}',
  p_bp='{$p_bp}',p_pulse='{$p_pulse}',p_spo2='{$p_spo2}',p_temp='{$p_tem}',
  p_rr='{$p_rr}',p_ht='{$p_ht}',p_bmi='{$p_bmi}',p_lmp='{$p_lmp}',p_edd='{$p_edd}',doctor='{$doctor}'
  WHERE p_id = $p_id";
  
    if(mysqli_query($conn,$sql)){
      header("Location:{$hostname}/pages/transfer-patient.php");
  }
}

              if(isset($_POST['transfer'])){
                $ad_date = date("Y/m/d");
                $p_mobile = mysqli_real_escape_string($conn,$_POST['p_phone']);
                $gurdian = mysqli_real_escape_string($conn,$_POST['gurdian']);
                $p_bp = mysqli_real_escape_string($conn,$_POST['bp']);
                $p_pulse = mysqli_real_escape_string($conn,$_POST['pulse']);
                $p_spo2 = mysqli_real_escape_string($conn,$_POST['spo2']);
                $p_tem = mysqli_real_escape_string($conn,$_POST['temp']);
                $p_rr = mysqli_real_escape_string($conn,$_POST['rr']);
                $p_ht = mysqli_real_escape_string($conn,$_POST['height']);
                $p_bmi = mysqli_real_escape_string($conn,$_POST['bmi']);
                $p_lmp = mysqli_real_escape_string($conn,$_POST['lmp']);
                $p_edd = mysqli_real_escape_string($conn,$_POST['edd']);
                $doctor = mysqli_real_escape_string($conn,$_POST['doctor']);
                $transfer = mysqli_real_escape_string($conn,$_POST['p_transfer']);
                $t_user = $_SESSION['user_id'];
                mysqli_real_escape_string($conn,$_POST['p_transfer']);
                switch ($transfer) {
                  case '1':
                    $type = "ipd";
                    break;
                  case '2':
                    $type = "ot";
                    break;
                  case '3':
                    $type = "icu";
                    break;
                  case '4':
                    $type = "nicu";
                    break;
                  case '5':
                    $type = "hdu";
                    break;
                  default:
                    $type = "patients";
                    break;
                }
                switch ($last_transfer) {
                  case '1':
                    $type1 = "ipd";
                    break;
                  case '2':
                    $type1 = "ot";
                    break;
                  case '3':
                    $type1 = "icu";
                    break;
                  case '4':
                    $type1 = "nicu";
                    break;
                  case '5':
                    $type1 = "hdu";
                    break;
                  default:
                    $type1 = "patients";
                    break;
                }
                if($type == "patients"){
                echo "<div class='alert-danger'>Please choose transfer type</div>";
                }
                $sql = "SELECT p_id FROM $type WHERE p_id = '{$p_id}' AND status = '1'";
                $result = mysqli_query($conn, $sql) or die("Query failed.");
                if(mysqli_num_rows($result) >0){
                  echo "<p style='color:red;text-align:center;margin: 10px 0;'>Patient Already Exists</p>";
                 }else{
                $sql1 = "UPDATE patients SET p_mobile='{$p_mobile}',gurdian='{$gurdian}',
                p_bp='{$p_bp}',p_pulse='{$p_pulse}',p_spo2='{$p_spo2}',p_temp='{$p_tem}',
                p_rr='{$p_rr}',p_ht='{$p_ht}',p_bmi='{$p_bmi}',p_lmp='{$p_lmp}',p_edd='{$p_edd}',doctor='{$doctor}',p_transfer='{$transfer}'
                WHERE p_id = $p_id";
                  if(mysqli_query($conn,$sql1)){
                    $sql2 = "INSERT INTO $type (p_id,ad_time) VALUES ('{$p_id}','{$ad_date}')";
                    $result2 = mysqli_query($conn, $sql2) or die("Query failed.");

                    $sql3 = "UPDATE patients SET t_user = '{$t_user}' WHERE p_id ={$p_id}";
                    $result3 = mysqli_query($conn, $sql3) or die("Query failed.");
                    if($type1 != "patients"){
                    $sql4 = "UPDATE $type1 SET ex_time='{$ad_date}',status = '0' WHERE p_id ={$p_id}";
                    $result4 = mysqli_query($conn, $sql4) or die("Query failed.");
                    }
                       if(mysqli_query($conn,$sql2)){
                        echo "<script> alert('Transfer succesful.'); </script>";
                        header("Location:{$hostname}/pages/transfer-patient.php?pid={$p_id}");
                        
                      }else{
                       echo "error";
                      }

                    }
                    else{
                    echo "transfer query failed.";
                    }
                  }
              }

              
              ?>
                  </div>
              </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div id="globe" class="position-absolute end-0 top-10 mt-sm-3 mt-7
              me-lg-7">
              <canvas width="700" height="600" class="w-lg-100 h-lg-100 w-75
                h-75 me-lg-0 me-n10 mt-lg-5"></canvas>
            </div>
          </div>
        </div>


        <footer class="footer py-4 ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-12 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted
                  text-lg-start">
                  copyright Ⓒ Adarsh Hospital
                </div>
              </div>
              
            </div>
          </div>
        </footer>

      </div>


    </main>



    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
      </a>
      <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Adarash Hospital</h5>
          </div>
          <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0
              fixed-plugin-close-button">
              <i class="material-icons">clear</i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
          
          <div class="mt-2 d-flex">
            <h6 class="mb-0">Light / Dark</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input class="form-check-input mt-1 ms-auto" type="checkbox"
                id="dark-version" onclick="darkMode(this)">
            </div>
          </div>
          <hr class="horizontal dark my-sm-4">



          
        </div>
      </div>
    </div>


    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>



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
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script
      src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
  </body>

</html>
