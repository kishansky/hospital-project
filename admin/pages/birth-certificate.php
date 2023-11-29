<?php include "header.php"; 

if(isset($_POST['save'])){

$name = mysqli_real_escape_string($conn,$_POST['c_name']);
$sex = mysqli_real_escape_string($conn,$_POST['child']);
$father = mysqli_real_escape_string($conn,$_POST['father']);
$mother = mysqli_real_escape_string($conn,$_POST['mother']);
$address = mysqli_real_escape_string($conn,$_POST['add']);
$dob = mysqli_real_escape_string($conn,$_POST['date']);
$time = mysqli_real_escape_string($conn,$_POST['time']);
$nature = mysqli_real_escape_string($conn,$_POST['delivery']);


$a_user = $_SESSION['user_id'];

$sql = "INSERT INTO birth_c (name,sex,father,mother,address,dob,time,nature,user)
VALUES ('{$name}','{$sex}','{$father}','{$mother}','{$address}','{$dob}','{$time}','{$nature}','{$a_user}')";


if(mysqli_query($conn,$sql)){
    header("Location:{$hostname}/pages/search-birth.php");
}else{
echo "error";
}

}
?>
<main>
    <div>
    <div class="row my-4">
        <div class="col-2"></div>
        <div class="col-8">
        <div class="card mb-4 ">
    <div class="card-body p-3">
        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                    <label for="c_name" class="form-label" style="color:#2680ea;">Baby Name:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="c_name" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;" autofocus required>
                                    </div>
                                  </div>
  
                                  <div class="col-md-6 ps-3">
                                    <div style="padding-top: 38px;" >
                                    <label for="relation" class="form-label" style="color:#2680ea;">Boy/Girl:-</label>
                                        <input  type="radio" name="child" id="boy" value="0" required>
                                        <label style="color: #2680ea;" for="boy">Boy</label>
                                        <input type="radio" name="child" id="girl" value="1">
                                        <label style="color: #2680ea;" for="girl">Girl</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row pt-2">
                                <div class="col-md-6">
                                    <div class="">
                                    <label for="father" class="form-label" style="color:#2680ea;">Mother Name-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="father" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="">
                                    <label for="mother" class="form-label" style="color:#2680ea;">Father Name:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="mother" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"
                                    required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row pt-2">
                                <div class="col-md-6 ">
                                    <div class="">
                                    <label for="add" class="form-label" style="color:#2680ea;">Address:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="add" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;" 
                                    required>
                                    </div>
                                  </div>
                                  <div class="col-md-6 ">
                                    <div class="">
                                    <label for="Date" class="form-label" style="color:#2680ea;">Date:-</label> 
                                    <input type="date" class="form-control" id="exampleFormControlTextarea1" placeholder="dd/mm/yyyy" name="date" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;" required>
                                    </div>
                                  </div>
                                  
                                  </div>
                                  <div class="row pt-2">
                                  <div class="col-md-6 ">
                                    <div class="">
                                    <label for="time" class="form-label" style="color:#2680ea;">Time:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="hh:mm:ss am/pm" name="time" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;" required>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-6 ">
                                    <div class="">
                                    <label for="delivery" class="form-label" style="color:#2680ea;">Nature of Delivery:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="delivery" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"
                                    required>
                                    </div>
                                  </div>
                                
                                  </div>

                                  <div class="row pt-2">
                               
                                  </div>
                           
                                <div class="col-md-6 m-5">
                                <button style="float: right;" class="btn btn-info" type="submit" name="save" value="">Save</button>
                                </div>
                            </form>        
        </div>
      </div>
      </div>
      </div>



<?php include "footer.php"; ?>
