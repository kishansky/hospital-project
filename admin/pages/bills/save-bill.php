<?php 
include "config.php";

$p_id = $_POST['uid'];
$s_qty = $_POST['qty'];
$pay_bill = $_POST['pay'];
$discount = $_POST['discount'];

if($discount > 0){
    $sqld = "UPDATE patients SET discount = '{$discount}' WHERE p_id = '{$p_id}' ";
    $resultd = mysqli_query($conn,$sqld) or die ("Query Failed.");
}


$sql = "SELECT bill,deposit FROM patients WHERE p_id='{$p_id}'";
$result = mysqli_query($conn,$sql) or die ("Query Failed.");
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $b_data = $row['bill'];
            $d_data = $row['deposit'];
        }
    }
    $bill = json_decode($b_data,true);
    $new_bill = array(
        'qty' => $_POST['qty']
    );
    $json_data = json_encode($new_bill,JSON_PRETTY_PRINT);
    $sql2 = "UPDATE patients SET bill = '{$json_data}' WHERE p_id = '{$p_id}' ";
    $result2 = mysqli_query($conn,$sql2) or die ("Query Failed.");

    if($_POST['pay'][1] > 0){
    $deopsite = json_decode($d_data,true);
    $new_deposit = array(
        'dep' => $_POST['pay']
    );
    $deopsite[] = $new_deposit;
    $json_data2 = json_encode($deopsite,JSON_PRETTY_PRINT);
    $sql3 = "UPDATE patients SET deposit = '{$json_data2}' WHERE p_id = '{$p_id}' ";
    $result3 = mysqli_query($conn,$sql3) or die ("Query Failed.");
}

    if(mysqli_query($conn,$sql2)){
            echo "<h6 class='alert alert-info' style='color:#fff'>Bill Save Successfully</h6>";
        }else{
            echo "<h6 class='alert alert-danger' style='color:#fff'>Query Failed.</h6>";
    
    }

?>