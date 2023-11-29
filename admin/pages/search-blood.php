<?php 
include "header.php";

?>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-lg-7 position-relative z-index-2 w-lg-100">
            <div class="card card-plain mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column h-100">
                      <h2 class="font-weight-bolder mb-0">Blood Request<h2>
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
                      <label class="form-label">Search</label>
                      <input type="text" name="search" class="form-control">
                    </div> 
                        <button type="submit" class="bg-gradient-info ms-1" style="border: 1px solid #47a1f1; color: #fff;padding: 0px 10px; border-radius: 5px;" >
                          <i class="material-icons opacity-10" style="padding-top: 8px;">search</i>
                        </button>
                  </div> 
              </form>
                
                
              </div>
            </div>
            
            
            <div class="row mt-4">
                <div class="col-12">
                <?php 
                $limit = 10;

                if(isset($_GET['more'])){
                $more = $_GET['more'];
                }else{
                $more = 1;
                }
               $limit =$limit * $more;
              if(isset($_POST['search'])){

                $search = mysqli_real_escape_string($conn,$_POST['search']);
                $sql = "SELECT * FROM patients WHERE p_id LIKE '%{$search}%' OR p_name LIKE '%{$search}%'ORDER BY p_id DESC LIMIT $limit";
                $result = mysqli_query($conn,$sql) or die ("Query Failed.");
              }else{
                $sql = "SELECT * FROM patients ORDER BY p_id DESC LIMIT $limit";
                $result = mysqli_query($conn,$sql) or die ("Query Failed.");
              }
                ?>
                  <div class="card mb-4 ">
                    
                    <div class="card-body p-3">
                    
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive ">
                            <table class="table table-hover align-items-center ">
                            <?php 
                    $total_record = mysqli_num_rows($result);
                    if($total_record >0){
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                              <tbody>
                                <tr class="row">
                                    <td class="col">
                                      <div class="d-flex px-0 
                                        ">
                                        <div class="ms-4">
                                          <p class="text-xs font-weight-bold mb-0 ">Patient Id:</p>
                                          <h6 class="text-sm font-weight-normal mb-0
                                            "><?php echo $row['p_id']; ?></h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">Patient Name:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['p_name']; ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">Address:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo substr($row['p_address'],0,15)."..";  ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
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
                                    <td class="col">
                                      <div class="">
                                        <a href="./blood-request.php?pid=<?php echo $row['p_id']; ?>" class="btn btn-primary m-0" style="padding: 4px 19px;">Request</a>
                                      </div>
                                    </td>
                                  </tr>
                                  
                               
                              </tbody>
                              <?php 
                              }
                            }else{
                              echo "<h2>No record found.</h2>";
                            }
                            ?>
                            </table>

                          </div>
                        </div>
                        
                      </div>
                      
                    </div>
                    <div class="row 
                    <?php 
                    if($limit > $total_record){ echo "d-none"; } 
                    ?>
                    " style="margin-top: -15px; text-align:center;">
                          
                        <a href="./search-blood.php?more=<?php echo ($more+1); ?>">
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

<?php 
include "footer.php";
?>
        
