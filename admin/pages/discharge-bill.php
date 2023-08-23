<?php include "header.php"; ?>

<main>
    <div class="card m-3">
    <div class="d-none">
        <input type="text" id="uname" value="<?php echo $_SESSION['user_name']; ?>">
    </div>
    <div class="d-none">
        <input type="text" id="date" value="<?php echo date("Y/m/d h:i:sa" ); $d_date = date("Y/m/d h:i:sa" ); ?>">
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
        <div class="card mb-4 ">
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
                                        <label for="" class="mb-0">Addmission Date:-</label><br>
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
                    
                </div>
                <div class="col-12 text-center">
                <button type="submit" id="add_bill" name="add_bill" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
                    <div class="text-white  me-2 d-flex align-items-center
                        justify-content-center">
                    
                        <i class="material-icons opacity-10">add</i>Add Bill
                    </div>

                    </button>
                </div>
            </div>
            <div class="card mb-4 ">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-12">
                          <div class="" id="table-item">
                                         </div>
                        </div>      
                      </div>                     
                    </div>
                    </div>
                    <div class="row">
                    <form class="col-md-3 mt-2">
                        <div>
                            <p><b class="ms-2">Discount:-</b></p>
                        </div>
                         <div class="input-group input-group-outline ms-2">
                            <label style="color: #2680ea;" for="discount" class="form-label">Discount</label>
                            <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="discount" name="bmi" maxsize="10">
                         </div>
                    </form>
                    <form class="col-md-3 mt-2">
                        <div>
                            <p><b class="ms-2">Pay Bill:-</b></p>
                        </div>
                         <div class="input-group input-group-outline ms-2">
                            <label style="color: #2680ea;" for="Pay bill" class="form-label">Pay bill</label>
                            <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="pay" name="bmi" maxsize="10">
                         </div>
                    </form>
                    <div class="col-md-4 ps-5 mt-2">
                    <div>
                            <p><b class="ms-2">Other:-</b></p>
                        </div>
                        <a href="./bill-print.php?pid=<?php echo $row['p_id']; ?>"><button type="button" class="btn btn-primary" name="print">
                        Print
                    </button></a>
                    <button  type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Save Bill
                    </button>
                    <button type="submit" name="discharege" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1">Discharge</button>
                    </div>
                    <div id="showstatus"></div>
                    </div>
                  
        </div>
        <?php if($row['p_status'] == 0){ 
          echo '<div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="alert alert-danger" style="color:#fff; text-align:center;">
            Patient Already discharge.
            </div>
          </div>
        </div>';
      } ?>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dischage Patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
        <button id="savebill1" name="savebill" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
        </form>
        
        
      </div>
    </div>
  </div>
</div>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Save Bill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a href="discharge-bill.php?pid=<?php echo $p_id; ?>"><button id="savebill" type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button></a>
        
      </div>
    </div>
  </div>
</div>
<!-- The Modal -->
      
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Services</h4>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      
      <!-- Modal body -->
      <div class="modal-body pt-0">
      <table id="item-list" class="table table-bordered  table-hover">
      <div>
                    <!-- <nav class="navbar navbar-expand-sm navbar-light bg-dark">
              <div class="container-fluid">
                <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="nav nav-tabs">
                    <li id="all" class="nav-item">
                      <a class="nav-link" href="#" >All</a>
                    </li>
                    <li id="service" class="nav-item">
                      <a  class="nav-link" href="#">Service</a>
                    </li>
                    <li id="product" class="nav-item">
                      <a class="nav-link">Product</a>
                    </li>
                    <li id="test" class="nav-item">
                      <a class="nav-link">Test</a>
                    </li>
                  </ul>
                </div>
              </div >
                <form class="">
                    <div class="input-group input-group-outline">
                        <label style="color: #2680ea;"  for="bmi" class="form-label">Search</label>
                        <input style="border-color: #2680ea; color: #2680ea;"id="search" class="form-control" type="text" id="search" name="bmi" maxsize="10">
                    </div>
                </form>
            </nav>
                    </div> -->
            <!-- <thead class="table-info">
                  <tr class= " m-0 p-0">
                    <th class="col-1 px-0"></th>
                    <th class="col-2 px-0">Item id</th>
                    <th class="col-3 px-0">Item</th>
                    <th class="col-2 px-0">Price</th>
                    <th class="col-2 px-0">Quantity</th>
                    <th class="col-2 px-0">Unit</th>
                  </tr>
                </thead> -->
               
                                <!-- </div> -->
  </table>
</div>
    

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="submit" id="add" class="btn btn-info" data-bs-dismiss="modal" value="Add">
      </div>
    </div>
  </div>
</div>
<?php 
 }
}
switch ($transfer_type) {
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
  $d_user = $_SESSION['user_id'];

  if(isset($_POST['savebill'])){
    $sql = "SELECT p_id FROM patients WHERE p_id = '{$p_id}' AND p_status = 0";
    $result = mysqli_query($conn, $sql) or die("Query failed.");
    if(mysqli_num_rows($result) >0){
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Patient Already Discharge</p>";
       }else{
        
        $sql2 = "UPDATE patients SET d_user = '{$d_user}',p_status = 0,d_date='{$d_date}' WHERE p_id ={$p_id}";
        $result = mysqli_query($conn, $sql2) or die("Query failed.");
        if($type1 != "patients"){
        $sql3 = "UPDATE $type1 SET date='{$d_date}',status = '0' WHERE p_id ={$p_id}";
        $result = mysqli_query($conn, $sql2) or die("Query failed.");
        }
        if(mysqli_query($conn,$sql2)){
            echo "<script> alert('Transfer succesful.'); </script>";
            header("Location:{$hostname}/pages/search-patient.php");
            
          }else{
           echo "error";
          }
    }
  }

?>

<div id="test"></div>
<script>
    function increaseValue(button, limit) {
  const numberInput = button.parentElement.querySelector('.number');
  var value = parseInt(numberInput.value, 10);
  if(isNaN(value)) value = 0;
  if(limit && value >= limit) return;
  numberInput.value = value+1;
}


function decreaseValue(button) {
  const numberInput = button.parentElement.querySelector('.number');
  var value = parseInt(numberInput.value, 10);
  if(isNaN(value)) value = 0;  
  if(value < 1) return;
  numberInput.value = value-1;
}
</script>
<script src="./js/jquery.js"></script>
<script>
    $(document).ready(function(){
        let sId = [];
        let sQty = [];
        let uId = $("#uid").val();
        let uname = $("#uname").val();
        let date = $("#date").val();
        let dis = 0;
        let pay = [uname,0,date];
        let typename="";
        showAll();
        setTimeout(loadTable1,500);
        function showAll(){
            // $("#add").click(function(){
                $.ajax({
                url : "./bills/show-all.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay},
                success : function(data){
                    $("#item-list").html(data);
                }
              
            });
            
        }
        function loadTable1(){
              $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
            $.ajax({
                url : "./bills/add-item.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay},
                success : function(data){
                    $("#table-item").html(data);
                }
            });
            console.log(sQty);
            sQty= [];
          }
        
          //   function loadTable(){
          //     $.each($("input[name='check']:checked"), function(){
          //       sId.push($(this).val());
          //       sId.push($("#qty"+sId[0]).val());
          //       sQty.push(sId);
          //       sId=[];
          //     });
          //   $.ajax({
          //       url : "./bills/add-item.php",
          //       type : "POST",
          //       data : {uid:uId,discount:dis,qty:sQty,pay:pay},
          //       success : function(data){
          //           $("#table-item").html(data);
          //       }
          //   });
          //   console.log(sQty);
          //   sQty= [];
          // }
          function payBill(){
            pay=[];
            pay.push($('#uname').val())
            pay.push($('#pay').val());
            pay.push($("#date").val());
            $.ajax({
                url : "./bills/add-item.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay},
                success : function(data){
                    $("#table-item").html(data);
                }
            });
        }
          
          $("#discount").on("keyup",function(){
            $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
                dis = $(this).val();
                // payBill();
            $.ajax({
                url : "./bills/add-item.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay},
                success : function(data){
                    $("#table-item").html(data);
                }
            });
            sQty= [];
          });
          $("#pay").on("keyup",function(){
            $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
            payBill();
            pay=[];
            sQty= [];
          });
          
          $("#service").click(function(){
            
            typename= "1";
            $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
              $.ajax({
                url : "./bills/type-search.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay,type:typename},
                success : function(data){
                    $("#item-list").html(data);
                }
            });
            sQty=[];
          });
          $("#product").click(function(){
            
            typename= "2";
            $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
              $.ajax({
                url : "./bills/type-search.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay,type:typename},
                success : function(data){
                    $("#item-list").html(data);
                }
            });
            sQty=[];
          });
          $("#test").click(function(){
            
            typename= "3";
            $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
              $.ajax({
                url : "./bills/type-search.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay,type:typename},
                success : function(data){
                    $("#item-list").html(data);
                }
            });
            sQty=[];
          });
          $("#search").on("keyup",function(){
            $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
            var search_term = $(this).val();
            console.log(search_term);
            $.ajax({
                url : "./bills/live-search.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay,search:search_term},
                success : function(data){
                    $("#item-list").html(data);
                }
            });
            sQty=[];

          });
          $("#all").click(function(){
            showAll();
          });
        $("#savebill").click(function(){
              $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
              dis = $("#discount").val();
              payBill();
            
                $.ajax({
                url : "./bills/save-bill.php",
                type : "POST",
                data : {uid:uId,qty:sQty,pay:pay,discount:dis},
                success : function(data){
                    $("#showstatus").html(data);
                }
             });
            pay=[];
            
          loadTable();
            });
            $("#savebill1").click(function(){
              $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
              dis = $("#discount").val();
              payBill();
            
                $.ajax({
                url : "./bills/save-bill.php",
                type : "POST",
                data : {uid:uId,qty:sQty,pay:pay,discount:dis},
                success : function(data){
                    $("#showstatus").html(data);
                }
             });
            pay=[];
            
          loadTable();
            });
            $("#add").click(function(){
                $.each($("input[name='check']:checked"), function(){
                sId.push($(this).val());
                sId.push($("#qty"+sId[0]).val());
                sQty.push(sId);
                sId=[];
              });
            $.ajax({
                url : "./bills/add-item.php",
                type : "POST",
                data : {uid:uId,discount:dis,qty:sQty,pay:pay},
                success : function(data){
                    $("#table-item").html(data);
                }
            });
            sQty= [];
            });
            
          });
        
        // loadTable();
        
        //   $("#savebill").click(function(){
              
        //       $.each($("input[name='check']:checked"), function(){
        //         sId.push($(this).val());
                  
        //       });
              
              
        //       if(sId.length > 0){
        //             for(let i = 0; i < sId.length; i++){
        //                 $.each($("#qty"+sId[i]), function(){
                            
        //                     sQty.push($(this).val());
                  
        //                 });
        //             }
        //         }
        //         $.ajax({
        //         url : "save-bill.php",
        //         type : "POST",
        //         data : {uid:uId,sid:sId,qty:sQty},
        //         success : function(data){
        //             $("#table-item").html(data);
        //         }
        //      });
        //     });
</script>


<?php include "footer.php"; ?>