<?php
include "./header.php";


?>


      <div class="container-fluid py-4">


        <div class="row">
          <div class="col-lg-7 position-relative z-index-2 w-lg-100">
            <div class="card card-plain mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column h-100">
                      <h2 class="font-weight-bolder mb-0">Adarash Hospital</h2>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-5 col-sm-5 ">
                <div class="card mb-2 mt-4">
                  <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark
                      shadow-dark shadow text-center border-radius-xl mt-n4
                      position-absolute">
                      <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                      <p class="text-sm mb-0 text-capitalize">Today Appoiment</p>
                      <h4 class="mb-0"><?php
                      $td = date("Y-m-d");
                      $yd = date('Y-m-d',strtotime("-1 days"));
                      $y_p  = "SELECT p_id FROM patients WHERE date LIKE '%{$yd}%'";
                      $yresult = mysqli_query($conn, $y_p) or die("Query failed.");
                      $yesterday = mysqli_num_rows($yresult);
                      $t_p = "SELECT p_id FROM patients WHERE date LIKE '%{$td}%'";
                      $tresult = mysqli_query($conn, $t_p) or die("Query failed.");
                      $today = mysqli_num_rows($tresult);
                      echo $today;
                      ?></h4>
                    </div>
                  </div>

                  <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm
                        font-weight-bolder"><?php
                        $per = $today - $yesterday;

                        if($yesterday > $today){
                        echo  $per." </span>Patients less than yesterday</p>" ;
                        }else{
                        echo "+". $per."</span>Patients more than yesterday</p>";
                        }
                        
                        ?>
                  </div>
                </div>

                <div class="card mb-2 mt-4">
                  <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary
                      shadow-primary shadow text-center border-radius-xl mt-n4
                      position-absolute">
                      <i class="material-icons opacity-10">leaderboard</i>
                    </div>
                    <div class="text-end pt-1">
                      <p class="text-sm mb-0 text-capitalize">OT Patient</p>
                      <h4 class="mb-0 d-inline-flex">
                        <?php 
                        $ot_p = "SELECT p_id FROM ot WHERE status = '1'";
                        $ot_result = mysqli_query($conn, $ot_p) or die("Query failed.");
                        $ot = mysqli_num_rows($ot_result);
                        echo $ot."<div style='color:grey;'>/2 </div>";
                        ?>
                      </h4>
                    </div>
                  </div>

                  <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm
                        font-weight-bolder"><?php 
                        $ot_d = "SELECT p_id FROM ot WHERE status = '0' AND ex_time LIKE '%{$yd}%'";
                        $ot_result1 = mysqli_query($conn, $ot_d) or die("Query failed.");
                        $dot = mysqli_num_rows($ot_result1);
                        echo $dot." ";
                        ?> </span>Patient discharge yesterday</p>
                  </div>
                </div>

                <div class="card mb-2 mt-4">
                  <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary
                      shadow-primary shadow text-center border-radius-xl mt-n4
                      position-absolute">
                      <i class="material-icons opacity-10">leaderboard</i>
                    </div>
                    <div class="text-end pt-1">
                      <p class="text-sm mb-0 text-capitalize">NICU Patient</p>
                      <h4 class="mb-0 d-inline-flex"><?php 
                        $nicu_p = "SELECT p_id FROM nicu WHERE status = '1'";
                        $nicu_result = mysqli_query($conn, $nicu_p) or die("Query failed.");
                        $nicu = mysqli_num_rows($nicu_result);
                        echo $nicu."<div style='color:grey;'>/25 </div>";
                        ?></h4>
                    </div>
                  </div>

                  <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    <p class="mb-0 "><span class="text-success text-sm
                        font-weight-bolder"><?php 
                        $nicu_d = "SELECT p_id FROM nicu WHERE status = '0' AND ex_time LIKE '%{$yd}%'";
                        $nicu_result1 = mysqli_query($conn, $nicu_d) or die("Query failed.");
                        $dnicu = mysqli_num_rows($nicu_result1);
                        echo $dnicu." ";
                        ?> </span>Patient discharge yesterday</p>
                  </div>
                </div>

              </div>
              <div class="col-lg-5 col-sm-5 mt-sm-0 ">
                <div class="card mb-2 mt-4">
                  <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-success
                      shadow-success text-center border-radius-xl mt-n4
                      position-absolute">
                      <i class="material-icons opacity-10">store</i>
                    </div>
                    <div class="text-end pt-1">
                      <p class="text-sm mb-0 text-capitalize ">IPD Patient</p>
                      <h4 class="mb-0 d-inline-flex"><?php 
                        $ipd_p = "SELECT p_id FROM ipd WHERE status = '1'";
                        $ipd_result = mysqli_query($conn, $ipd_p) or die("Query failed.");
                        $ipd = mysqli_num_rows($ipd_result);
                        echo $ipd."<div style='color:grey;'>/25 </div>";
                        ?></h4>
                    </div>
                  </div>

                  <hr class="horizontal my-0 dark">
                  <div class="card-footer p-3">
                    <p class="mb-0 "><span class="text-success text-sm
                        font-weight-bolder"><?php 
                        $ipd_d = "SELECT p_id FROM patients WHERE p_status = '0' AND date LIKE '%{$td}%'";
                        $ipd_result1 = mysqli_query($conn, $ipd_d) or die("Query failed.");
                        $dipd = mysqli_num_rows($ipd_result1);
                        echo $dipd." ";
                        ?> </span>Patient discharge, Today</p>
                  </div>
                </div>

                <div class="card mb-2 mt-4">
                  <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-info
                      shadow-info text-center border-radius-xl mt-n4
                      position-absolute">
                      <i class="material-icons opacity-10">person_add</i>
                    </div>
                    <div class="text-end pt-1">
                      <p class="text-sm mb-0 text-capitalize ">ICU Patient</p>
                      <h4 class="mb-0 d-inline-flex"><?php 
                        $icu_p = "SELECT p_id FROM icu WHERE status = '1'";
                        $icu_result = mysqli_query($conn, $icu_p) or die("Query failed.");
                        $icu = mysqli_num_rows($icu_result);
                        echo $icu."<div style='color:grey;'>/4 </div>";
                        ?></h4>
                    </div>
                  </div>

                  <hr class="horizontal my-0 dark">
                  <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm
                        font-weight-bolder"><?php 
                        $icu_d = "SELECT p_id FROM icu WHERE status = '0' AND ex_time LIKE '%{$yd}%'";
                        $icu_result1 = mysqli_query($conn, $icu_d) or die("Query failed.");
                        $dicu = mysqli_num_rows($icu_result1);
                        echo $dicu." ";
                        ?> </span>Patient discharge yesterday</p>
                  </div>
                </div>

                <div class="card mb-2 mt-4">
                  <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary
                      shadow-primary shadow text-center border-radius-xl mt-n4
                      position-absolute">
                      <i class="material-icons opacity-10">leaderboard</i>
                    </div>
                    <div class="text-end pt-1">
                      <p class="text-sm mb-0 text-capitalize">HDU Patient</p>
                      <h4 class="mb-0 d-inline-flex"><?php 
                        $hdu_p = "SELECT p_id FROM hdu WHERE status = '1'";
                        $hdu_result = mysqli_query($conn, $hdu_p) or die("Query failed.");
                        $hdu = mysqli_num_rows($hdu_result);
                        echo $hdu."<div style='color:grey;'>/2 </div>";
                        ?></h4>
                    </div>
                  </div>

                  <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm
                        font-weight-bolder"><?php 
                        $hdu_d = "SELECT p_id FROM hdu WHERE status = '0' AND ex_time LIKE '%{$yd}%'";
                        $hdu_result1 = mysqli_query($conn, $hdu_d) or die("Query failed.");
                        $dhdu = mysqli_num_rows($hdu_result1);
                        echo $dhdu." ";
                        ?> </span>Patient discharge yesterday</p>
                  </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="row mt-4">
              <div class="col-10">
              <?php 
                $limit = 10;
                if(isset($_GET['more'])){
                $more = $_GET['more'];
                }else{
                $more = 1;
                }
                $limit = $limit * $more;
                ?>
                <div class="card mb-4 ">
                  <div class="d-flex">
                    <div class="icon icon-shape icon-lg bg-gradient-success
                      shadow text-center border-radius-xl mt-n3 ms-4">
                      <i class="material-icons opacity-10" aria-hidden="true">list</i>
                    </div>
                    <h6 class="mt-3 mb-2 ms-3 ">Today Patient List</h6>
                  </div>
                  <div class="card-body p-3">
                  <?php 
                    $sql = "SELECT * FROM patients WHERE date LIKE '%{$td}%' ORDER BY p_id DESC LIMIT $limit";
                    $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                    $total_record = mysqli_num_rows($result);
                    if($total_record >0){
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table align-items-center ">
                              <tbody>
                                <tr>
                                    <td>
                                      <div class="col d-flex px-0 py-1
                                        ">
                                        <div class="ms-4">
                                          <p class="text-xs font-weight-bold mb-0 ">Patient Id:</p>
                                          <h6 class="text-sm font-weight-normal mb-0
                                            "><?php echo $row['p_id']; ?></h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="col">
                                        <p class="text-xs font-weight-bold mb-0 ">Patient Name:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['p_name']; ?></h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="col">
                                        <p class="text-xs font-weight-bold mb-0 ">Mobile No:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['p_mobile']; ?></h6>
                                      </div>
                                    </td>
                                    <td >
                                      <div class="col">
                                        <p class="text-xs font-weight-bold mb-0 ">Address:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['p_address']; ?></h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="col">
                                        <p class="text-xs font-weight-bold mb-0 ">Appoiment to:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php switch ($row['doctor']) {
                                            case '2':
                                              $value= "Dr. Rasmi Rai";
                                              break;
                                            case '3':
                                              $value= "Dr. Ekbal Singh";
                                              break;
                                            case '4':
                                              $value= "Dr. B.K. Rai";
                                              break;
                                            case '5':
                                              $value= "Dr. R.S. Gupta";
                                              break;
                                            default:
                                              $value= "Dr. Manoj Kumar";
                                              break;
                                          } 
                                          echo $value;
                                          ?></h6>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="col">
                                        <p class="text-xs font-weight-bold mb-0 ">Details:</p>
                                        <a href="./transfer-patient.php?pid=<?php echo $row['p_id']; ?>" class="btn m-0 bg-gradient-warning" style="padding: 2px 7px;">Transfer</a>
                                        <a href="./show.php?pid=<?php echo $row['p_id']; ?>" class="btn bg-gradient-info m-0" style="padding: 2px 7px;">More</a>
                                      </div>
                                    </td>
                                  </tr>
                                  
                               
                              </tbody>
                            </table>

                          </div>
                        </div>
                        
                      </div>
                      <?php 
                      }
                    }else{
                      echo "<h3>No Patient found.</h3>";
                    }
                      ?>
                  </div>
                  <div class="row <?php if($limit >= $total_record){ echo "d-none"; } ?>" style="margin-top: -15px; text-align:center;">
                          
                        <a href="./search-patient.php?more=<?php echo ($more+1); ?>">
                          <button class="btn p-0 mx-4 text-info" name="more" type="submit">
                            <i class="material-icons opacity-10 p-0 m-0" style="font-size: 30px;">arrow_drop_down</i>
                          </button>
                        </a>
                    </div>
                </div>

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

<?php include "footer.php"; ?>
        
