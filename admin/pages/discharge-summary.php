<?php include "header.php"; ?>


    <main>
    <div class="card m-3">
    <div class="d-none">
        <input type="text" id="uname" value="<?php echo $_SESSION['user_name']; ?>">
    </div>
    <div class="d-none">
        <input type="text" id="date" value="<?php echo date("Y/m/d h:i:sa" ); $d_date = date("Y/m/d h:i:sa" ); ?>">
    </div>
<?php 

    if(isset($_GET['pid'])){
    $p_id = $_GET['pid'];
    $sql = "SELECT * FROM patients
            WHERE p_id = {$p_id}";
    $result = mysqli_query($conn,$sql) or die ("Query Failed.");
    }else{
      $limit = 1;
    $sql = "SELECT * FROM patients ORDER BY p_id DESC LIMIT $limit";
    $result = mysqli_query($conn,$sql) or die ("Query Failed.");

    }

// if(isset($_POST['check'])){
//     $bill = $_POST['check'];
    // $arr = array(
    //     'id'=> $_POST['check'],
    //     'name' => $row['service_name'],
    //     'price' => $row['service_price']
    // );
    // $bill = $arr;
    
    // } 

// $sql = "SELECT * FROM patients
// WHERE p_id = {$p_id}";


$result = mysqli_query($conn,$sql) or die ("Query Failed.");
if(mysqli_num_rows($result) >0){
while($row = mysqli_fetch_assoc($result)) {
    $p_id=$row['p_id'];
    $transfer_type = $row['p_transfer'];
?>
                <div class="d-flex">
                    <div class="bg-gradient-info
                    shadow text-center border-radius-xl mt-n3 ms-4 p-2 mb-2 pe-3">
                          <span class="mt-2 mb-2 ms-2 text-white " >Patient's Id: <?php echo $row['p_id']; ?></span>
                    </div>
                </div>
        <div class="mb-4 ">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                    <table class="table align-items-center ">
                        <tbody>
                            <tr class="row">
                                <td class="d-none">
                                <input type="text" id="uid" value="<?php echo $row['p_id']; ?>">
                                </td>
                                <td class="col-4">
                                    <div>
                                        <label for="" class="mb-0">Name:-</label><br>
                                        <b class="ps-1"><?php echo strtoupper($row['p_name']); ?></b>
                                    </div>
                                </td>
                                <td class="col-4">
                                    <div>
                                        <label for="" class="mb-0">Address:-</label><br>
                                        <b class="ps-1"><?php echo strtoupper($row['p_address']); ?></b>
                                    </div>
                                </td>
                                <td class="col-4">
                                    <div>
                                        <label for="" class="mb-0">Addmission Date & Time:-</label><br>
                                        <b class="ps-1"><?php echo $row['date']; ?></b>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-4">
                                    <div>
                                        <label for="" class="mb-0">Sex:-</label><br>
                                        <b class="ps-1"><?php if($row['p_sex'] == 0){ echo "Male"; }elseif($row['p_sex'] == 1){ echo "Female";}else{ echo "Other";}; ?></b>
                                    </div>
                                </td>
                                <td class="col-4">
                                    <div>
                                        <label for="" class="mb-0">Age:-</label><br>
                                        <b class="ps-1"><?php echo $row['p_age']. " Yrs"; ?></b>
                                    </div>
                                </td>
                                <td class="col-4">
                                    <div>
                                        <label for="" class="mb-0">Mobile No:-</label><br>
                                        <b class="ps-1"><?php echo $row['p_mobile']; ?></b>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-4">
                                <label for="" class="mb-0">Treatment By:-</label><br>
                                <b class="ps-1"><?php 
                                   switch ($row['doctor']) {
                                    case '2':
                                        echo "Dr. Rasmi Rai";
                                        break;
                                    case '3':
                                        echo "Dr. Ekbal Singh";
                                        break;
                                    case '4':
                                        echo "Dr. B.K. Rai";
                                        break;
                                    case '5':
                                        echo "Dr. R.S. Gupta";
                                        break;
                                                            
                                    default:
                                        echo "Dr. Manoj Kumar";
                                        break;
                                   }
                                ?></b>
                                </td>
                                
                            </tr>
                               
                        </tbody>
                    </table>       
                    <form  action="discharge-print.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                         <div class="col-md-6 m-3">
                                    <div class="">
                                        <label for="operated" class="form-label" style="color:#2680ea;">Discharge Date & time</label>
                                        <input type="datetime-local" class="form-control" id="exampleFormControlTextarea1"
                                            name="date"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                                <div class="col-md-6 m-3">
                                    <div class="">
                                    <label for="operated" class="form-label" style="color:#2680ea;">Operated / Pocedure:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="operated" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 m-3">
                                    <div class="">
                                    <label for="diagnosis" class="form-label" style="color:#2680ea;">DIAGNOSIS:-</label> 
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="diagnosis" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 m-3">
                                    <div class="">
                                    <label for="complaints" class="form-label" style="color:#2680ea;">PRESENTING COMPLAINTS:-</label> 
                                    <textarea class="form-control" id="complaints" onclick="clearContent('complaints')" name="complaints" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">No Complaints</textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 m-3">
                                    <div class="">
                                    <label for="history" class="form-label" style="color:#2680ea;">PAST HISTORY:-</label> 
                                    <textarea class="form-control" id="history" onclick="clearContent('history')" name="history" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">No Signification</textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 m-3">
                                    <div class="">
                                    <label for="procedure" class="form-label" style="color:#2680ea;">PROCEDURE / OPERATION DETAILS:-</label> 
                                    <textarea class="form-control" id="procedure"  name="procedure" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 m-3">
                                    <div>
                                    <label for="treatment" class="form-label" style="color:#2680ea;">TREATMENT AND COURSE DURING HOSPITLIZATION:-</label> 
                                    <?php 
                                    $sql = "SELECT * FROM services WHERE type='1'";
                                    $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                                    $data =[];
                                    if(mysqli_num_rows($result) >0){
                                        while($rows = mysqli_fetch_assoc($result)){
                                            
                                            $data[] = array(
                                                1 => $rows['service_name'],
                                                2 => $rows['unit']
                                            );
                                        }
                                    }
                                    ?> 
                                    <div class="overflow-auto p-3 bg-light"
  style="max-width:auto; max-height:250px; border-radius:5px;" >
  <table id="" class="table table-bordered table-hover">
  <thead class="table-info">
                        <tr class= " m-0 p-0">
                          <th class="col-1 px-0"></th>
                          <th class="col-3 px-0">Item</th>
                          <th class="col-2 px-0">Unit</th>
                        </tr>
                      </thead>
                      <tbody class="table-light" >
                      <?php 
                      
                        foreach($data as $item){
                        ?>
                      <tr>
                        
                        <td class="col-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check" name="check[]" value="<?php echo $item[1]. " " .$item[2] ?>" >
                        </div>
                    </td>
                    <td class="col-3"><?php echo $item[1]; ?></td>
                    <td class="col-2"><?php echo $item[2]; ?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  </tbody>
                                    </table>
               
                                    </div>
                                    </div>
                                    </div>
                                  
                                  </div>
                    
                                <div class="row">
                                <div class="col-md-6 m-3">
                                    <div>
                                    <label for="advise" class="form-label" style="color:#2680ea;">Advice:-</label> 
                                    <div style="color:#f20c54" class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advise[]" value="Take Medicine As Adviced" > Take Medicine As Adviced<br>
                                    <input type="checkbox" class="form-check-input" name="advise[]" value="Follow Suitable Diet."> Follow Suitable Diet.<br>
                                    <input type="checkbox" class="form-check-input" name="advise[]" value="Take Bed Rest as Adviced"> Take Bed Rest as Adviced<br>
                                    </div>
                                </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 m-3">
                                    <div class="">
                                    <label for="condition" class="form-label" style="color:#2680ea;">Condition at the time of Discharge:-</label> 
                                    <textarea class="form-control" id="condition" onclick="clearContent('condition')" name="condition" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">Well Discharge</textarea>
                                    </div>
                                  </div>
                                </div>

                                  <div class="row">
                                <div class="col-md-6 m-3">
                                    <div class="">
                                    <label for="otheradv" class="form-label" style="color:#2680ea;">Other Advice:-</label> 
                                    <textarea class="form-control" id="other" name="otheradv" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6 m-3">
                                <button style="float: right;" class="btn btn-info" type="submit" name="next" value="<?php echo $row['p_id']; ?>">Next</button>
                                </div>
                            </form>            
                </div>               
            </div>                  
        </div>
        <?php }
        }?>
        <script>
                let flag=true;
            function clearContent(e){
                if(flag == true){
                document.getElementById(e).value='';
                flag=false;
                }
            }
        </script>
<?php include "footer.php"; ?>