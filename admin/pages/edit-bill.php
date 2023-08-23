<?php include "header.php"; 
if($_SESSION["user_type"]!= "2"){
    header("Location:{$hostname}/pages/home.php");
}
if(isset($_POST['add'])){
      $item_name = mysqli_real_escape_string($conn,$_POST['item_name']);
      $item_price = mysqli_real_escape_string($conn,$_POST['item_price']);
      $unit = mysqli_real_escape_string($conn,$_POST['unit']);
      $type = mysqli_real_escape_string($conn,$_POST['type']);
      
    
      $sql = "INSERT INTO services (service_name,service_price,unit,type)
      VALUES ('{$item_name}','{$item_price}','{$unit}','{$type}')";
        if(mysqli_query($conn,$sql)){
          header("Location:{$hostname}/pages/edit-bill.php");
      }
    }
    if(isset($_POST['change'])){
        $s_id = $_GET['sid'];
      $item_name = mysqli_real_escape_string($conn,$_POST['item_name1']);
      $item_price = mysqli_real_escape_string($conn,$_POST['item_price1']);
      $unit = mysqli_real_escape_string($conn,$_POST['unit1']);
      $type = mysqli_real_escape_string($conn,$_POST['type1']);
      
    
      $sql = "UPDATE services SET service_name='{$item_name}',service_price='{$item_price}',unit='{$unit}',type='{$type}'WHERE service_id = '{$s_id}'";
        if(mysqli_query($conn,$sql)){
          header("Location:{$hostname}/pages/edit-bill.php");
      }
    }
?>
<main>
    <div>
    <div class="container-fluid py-4">
        <?php 
        if(isset($_GET['sid'])){
        
        ?>
         <div class="row">
          <div class="col-lg-7 position-relative z-index-2 w-lg-100">
            <div class="row mt-4">
              <div class="col-md-4 col-sm-6 offset-md-4 offset-md-3">
                <?php 
                if($_GET['sid'] == 0){
                
                ?>
              <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                <div class="card mb-4 ">
                  <div class="">
                    <h3 class="pt-2 text-info" style="text-align:center;">Add New Item</h3>
                 </div>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive" style="overflow-x: unset;">
                          <table class="table align-items-center ">
                            <tbody>
                              <tr class="row">
                                <td class="col">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline">
                                      <label style="color: #2680ea;" for="item_name" class="form-label">Item's Name</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="item_name" name="item_name" size="20" required>
                                    </div>
                                  </div>
                                </td>
                                </tr>
                                <tr class="row">
                                <td class="col">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline">
                                    <label style="color: #2680ea;" for="item_price" class="form-label">Item Price</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="item_price" name="item_price" size="20" required>
                                  </div>
                                  </div>
                                </td>
                                </tr>
                                <tr class="row">
                                <td class="col">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline">
                                    <label style="color: #2680ea;" for="unit" class="form-label">Unit</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="unit" name="unit" size="20"required>
                                  </div>
                                  </div>
                                </td>
                                </tr>
                                <tr class="row">
                                <td class="col">
                                  <div class="d-flex px-2">
                                    <div class="input-group input-group-outline is-focused">
                                      <label style="color: #2680ea;" for="type" class="form-label">Item Type</label>
                                      <select name="type" id="dr" class=" form-control" style="border-color: #2680ea; color: #2680ea;">
                                        <option value="1" >Service</option><hr>
                                        <option value="2">Product</option>
                                        <option value="3">Test</option>
                                      </select>
                                    </div>
                                  </div>
                                </td>
                                 </tr>
                                 <tr class="row">
                                <td class="col-md-4 col-sm-6 offset-md-4 offset-md-3 mt-2">
                                <div class="">
                                    <input name="add" class="btn bg-gradient-info " type="submit" value="Add">
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
        }else{
            
            $s_id = $_GET['sid'];
            $sql = "SELECT * FROM services
                WHERE service_id = {$s_id}";
            $result = mysqli_query($conn,$sql) or die ("Query Failed.");
            if(mysqli_num_rows($result) >0){
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                      <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                <div class="card mb-4 ">
                  <div class="">
                    <h3 class="pt-2 text-info" style="text-align:center;">Edit Item:<?php echo $row['service_id']; ?></h3>
                 </div>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive" style="overflow-x: unset;">
                          <table class="table align-items-center ">
                            <tbody>
                              <tr class="row">
                                <td class="col">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline is-focused">
                                      <label style="color: #2680ea;" for="item_name" class="form-label">Item's Name</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" value="<?php echo $row['service_name']; ?>" class="form-control" type="text" id="item_name" name="item_name" size="20" required>
                                    </div>
                                  </div>
                                </td>
                                </tr>
                                <tr class="row">
                                <td class="col">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline is-focused">
                                    <label style="color: #2680ea;" for="item_price" class="form-label">Item Price</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" value="<?php echo $row['service_price']; ?>" class="form-control" type="text" id="item_price" name="item_price" size="20" required>
                                  </div>
                                  </div>
                                </td>
                                </tr>
                                <tr class="row">
                                <td class="col">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline is-focused">
                                    <label style="color: #2680ea;" for="unit" class="form-label">Unit</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" value="<?php echo $row['unit']; ?>" class="form-control" type="text" id="unit" name="unit" size="20"required>
                                  </div>
                                  </div>
                                </td>
                                </tr>
                                <tr class="row">
                                <td class="col">
                                  <div class="d-flex px-2">
                                    <div class="input-group input-group-outline is-focused">
                                      <label style="color: #2680ea;" for="type" class="form-label">Item Type</label>
                                      <select name="type" id="dr" class=" form-control" style="border-color: #2680ea; color: #2680ea;">
                                        <option value="1" <?php if($row['type']==1){ echo "selected";} ?> >Service</option><hr>
                                        <option value="2" <?php if($row['type']==2){ echo "selected";} ?> >Product</option>
                                        <option value="3" <?php if($row['type']==3){ echo "selected";} ?> >Test</option>
                                      </select>
                                    </div>
                                  </div>
                                </td>
                                 </tr>
                                 <tr class="row">
                                <td class="col-md-4 col-sm-6 offset-md-4 offset-md-3 mt-2">
                                <div class="">
                                    <input name="change" class="btn bg-gradient-info " type="submit" value="Change">
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
          }
        }
        ?>
        </div>
        </div>
        </div>
        </div>
        <?php
        }else{
               
        ?>
        <div class="row">
          <div class="col-lg-7 position-relative z-index-2 w-lg-100">
            <div class="card card-plain mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column h-100">
                      <h2 class="font-weight-bolder mb-0">Edit Bill</h2>
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
                      <label class="form-label">Search bill</label>
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
                $limit = $limit * $more;
                if(isset($_POST['search'])){

                    $search = mysqli_real_escape_string($conn,$_POST['search']);
                    $sql = "SELECT * FROM services WHERE service_id LIKE '%{$search}%' OR service_name LIKE '%{$search}%' OR type LIKE '%{$search}%'ORDER BY service_name ASC LIMIT $limit";
                    $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                  }elseif(isset($_GET['tid'])){
                    $t_id=$_GET['tid'];
                    $sql = "SELECT * FROM services WHERE type='{$t_id}' ORDER BY service_name ASC LIMIT $limit";
                    $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                }else{
                $sql = "SELECT * FROM services ORDER BY service_name ASC LIMIT $limit";
                $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                  }
                ?>
                  <div class="card mb-4 ">
                    
                    <div class="card-body p-3">
                    
                      <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-10 ">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                    <a href="edit-bill.php" class="nav-link <?php if(!isset($_GET['tid'])){ echo "active";} ?>" >All</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="./edit-bill.php?tid=1" class="nav-link <?php if(isset($_GET['tid'])){if($_GET['tid'] == 1){ echo "active";}} ?>" >Services</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="./edit-bill.php?tid=2" class="nav-link <?php if(isset($_GET['tid'])){if($_GET['tid'] == 2){ echo "active";}} ?>" >Products</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="./edit-bill.php?tid=3" class="nav-link <?php if(isset($_GET['tid'])){if($_GET['tid'] == 3){ echo "active";} }?>" >Test</a>
                                    </li>
                                </ul>
                                
                                </div>
                                <div class="col-2">
                                    <div style="text-align:center;">
                                        <a href="edit-bill.php?sid=0" type="button" class="btn btn-info" style="padding:5px 10px">Add New Item</a>
                                    </div>
                                </div>
                            </div>
                          <div class="table-responsive">
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
                                          <p class="text-xs font-weight-bold mb-0 ">Bill Id:</p>
                                          <h6 class="text-sm font-weight-normal mb-0
                                            "><?php echo $row['service_id']; ?></h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">Bill Name:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['service_name']; ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">Bill Price:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['service_price']; ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">Unit:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php echo $row['unit']; ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">Bill Type:</p>
                                        <h6 class="text-sm font-weight-normal mb-0
                                          "><?php switch ($row['type']) {
                                            case '2':
                                              $value= "Product";
                                              break;
                                            case '3':
                                              $value= "Test";
                                              break;
                                            default:
                                              $value= "Service";
                                              break;
                                          } 
                                          echo $value;
                                          ?></h6>
                                      </div>
                                    </td>
                                    <td class="col">
                                      <div class="">
                                        <p class="text-xs font-weight-bold mb-0 ">More:</p>
                                        <a href="delete-bill.php?sid=<?php echo $row['service_id']; ?>" class="btn m-0 bg-gradient-danger" style="padding: 2px 7px;">Delete</a>
                                        <a href="./edit-bill.php?sid=<?php echo $row['service_id']; ?>" class="btn bg-gradient-info m-0" style="padding: 2px 7px;">Edit</a>
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
                    <div class="row <?php if($limit > $total_record){ echo "d-none"; } ?>" style="margin-top: -15px; text-align:center;">
                          
                        <a href="./edit-bill.php?more=<?php echo ($more+1); ?>">
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
<?php 
}

?>
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