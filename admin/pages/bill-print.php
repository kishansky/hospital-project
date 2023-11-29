<?php 
session_start();
include "config.php";
if(!isset($_SESSION["user_name"])){
    header("Location:{$hostname}/admin/index.php");

}
if(isset($_GET['pid'])){

  $p_id = $_GET['pid'];
  $sql = "SELECT * FROM patients
          WHERE p_id = {$p_id}";
  $result = mysqli_query($conn,$sql) or die ("Query Failed.");
}else{
$sql = "SELECT * FROM patients WHERE p_status != 0 ORDER BY p_id DESC LIMIT 1";
$result = mysqli_query($conn,$sql) or die ("Query Failed.");
}
if(mysqli_num_rows($result) >0){
while($row = mysqli_fetch_assoc($result)) {
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
 Patient Details</title>
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
        @page{
          margin:2px 6px;
        }
        .patient-label{
            color:#000;font-size:13px;
            padding-left:20px;
        }
        .patient-data{
            color:#000;font-size:13px;
        }
    </style>
</head>
<body>
    <!--startprint-->
<div id="printarea" style="width: 210mm; height: 300mm;">
    <div>
<div id="header" style=" ">
    <div class="row" style="border:2px solid #000; margin:0; border-radius:20px;">
        <div class="col-2 ps-1">
        <img src="../assets/img/logos/logo.png" style="height: 5rem; margin: 1px;border-radius:5px;padding:1px;"></img>
        </div>
        <div class="col-8">
    <div style="text-align:center;" class="pt-1">
        <h1 style="margin-bottom: 0;color:#000;font-size: 30px;">ADARSH HOSPITAL</h1>
        <div style="color:#000;margin-bottom: 0;font-size: 13px;margin-top: -2px;">
        <b >In front of Baba Hariram Temple,Mairwa Dham</b>
        </div>
        <!-- ,+91-9934332840 -->
        <div style="color:#000;margin-bottom: 0;font-size: 13px; margin-top:-4px;">www.adarshcare.com</div>
    </div>
    </div>
    <div class="col-2">
        <img src="../assets/img/logos/iso.png" class="pe-0" style="height: 4.5rem; margin: 0;padding-left: 20px;padding-top:2px;"></img>
        </div>
    </div>
       
    </div>
    <div class="row pt-1"style="">
    <div class="col-6 patient-label" style="padding-left:35px;">
            Id : <b><?php echo "AH".$row['p_id']; ?></b>
    </div>

    <div class="col-6 patient-label" style="">
            Date & Time: <b><?php echo $row['date']; ?></b>
    </div>
    </div>
    <div class="row"style="">

    <div class="col-6 patient-label" style="padding-left:35px;">
            Patient Name : <b><?php echo ucwords($row['p_name']); ?> </b>
    </div>
    <div class="col-2 patient-label" style="">
       Age : <b><?php echo $row['p_age']. " "; ?>Yrs</b>
    </div>
    
    <div class="col-4 patient-label" style="">
       Sex : <b><?php if($row['p_sex'] == 0){echo "Male";}elseif($row['p_sex'] == 1){echo "Female";}else{echo "other";}; ?></b>
    </div>
    
    </div>

    <div class="row"style="">
    
    <div class="col-6 patient-label" style="padding-left:35px;">
            Address : <b><?php echo ucwords($row['p_address']); ?></b>
    </div>

    
    </div>
    <?php 
}
}    $sql = "SELECT bill,discount,deposit FROM patients WHERE p_id='{$p_id}'";
$result = mysqli_query($conn,$sql) or die ("Query Failed.");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $data = $row['bill'];
        $discount=$row['discount'];
        $pay_bills = $row['deposit'];
    }
}


$bill = json_decode($data,true);
$deposits = json_decode($pay_bills,true);
// echo "<pre>";
// print_r($bill);
// echo "</pre>";
// if($pay_bill[0][1]!=0 && (!is_null($pay_bill))){ $deposits[]= array('dep' => $_POST['pay']); }


    
$output = '';
$sprice=[];
$total=0;
$deposit = 0;
$td = 0;

    
foreach($bill as $id){

for($i=0;$i<count($id);$i++){
    
    for($j=0;$j<(count($id[$i])-1);$j++) {
        $output .= " <tr>
        <td style='border-right: 1px solid;'>".$i+1 ."</td>";
        $sql = "SELECT * FROM services WHERE service_id = '{$id[$i][0]}'";
        $result = mysqli_query($conn,$sql) or die ("Query Failed.");
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
            $output .= "
            <td style='border-right: 1px solid;'>{$row['service_name']}</td>
            <td style='border-right: 1px solid;'>&#8377;".$sprice = $row['service_price'] ." "."{$row['unit']}</td>
            ";
            }
        }
        $output .= "
        <td style='border-right: 1px solid;'>{$id[$i][1]}</td>
        <td>&#8377;". ((int)$sprice * (int)$id[$i][1]). "</td>
        </tr>"; 
        $total = $total + ((int)$sprice * (int)$id[$i][1]);
    }
    }
}

$output .= "
<tr>
<td style='border-right: 1px solid;'></td>
<td style='border-right: 1px solid;'></td>
<td style='border-right: 1px solid;'></td>
<td style='border-right: 1px solid;'></td>
<td ></td>
</tr>";

if($discount > 0){
$output .="
<tr style='border-top:1px solid;'>
<td></td>
<td></td>
<td></td>
<td style='border-left:1px solid;'>Discount<b style='color:tomato;'> -{$discount}</b></td>
<td style='border-left:1px solid;'>&#8377;<s>{$total}</s></td>
</tr>
<tr style='border-top:1px solid;'>
<td></td>
<td></td>
<td></td>
<td style='border-left:1px solid;'>Total =</td>
<td style='border-left:1px solid;'>&#8377;".$total = ((int)$total - (int)$discount) ."</td>
</tr>
</table>
</div>";
}else{
    $output .='
    <tr style="border-top:1px solid;">
    <td></td>
    <td></td>
    <td></td>
    <td style="border-left:1px solid;">Total =</td>
    <td style="border-left:1px solid;">&#8377;'.$total.'</td>
    </tr>
    ';



}

if(!empty($deposits)){

    $output .= '<div><table border="1" style="color: #000;border: 1px solid;" width="100%" cellspacing="0" cellpadding="10px">
    
        <tr style="border: 1px solid;"> 
        <th>S.id</th>
    <th style="border: 1px solid;">Pay bill</th>
    <th style="border: 1px solid;">Total</th>
    </tr>';
    foreach($deposits as $id1){
        foreach($id1 as $pay_bill){
    for($i=0;$i<(count($pay_bill)-2);$i++){

        $output .= "<tr>
        <td>".$i+1 . "</td>
        <td style='border-left: 1px solid;'>Deposite &#8377;{$pay_bill[1]} at {$pay_bill[2]}</td>
        <td style='border-left: 1px solid;'>".((int)$pay_bill[1]) ."</td>
        </tr>";
        $td = $td + ((int)$pay_bill[1]);
    }
}
}
    $output .="
    <tr>
        <td></td>
        <td style='border-left: 1px solid;'></td>
        <td style='border-left: 1px solid;'></td>
        </tr>
        <tr style='border-top:1px solid;'>
        <td></td>
        <td style='text-align:end;'>Deposite=</td>
        <td style='border-left: 1px solid;'>&#8377;". $td ."</td>
        </tr>
    <tr style='border-top:1px solid;'>
    <td></td>
    <td style='text-align:end;'>Left Total=</td>
    <td style='border-left: 1px solid;'> &#8377;". (int)$total - (int)$td ."</td>
    </tr>
    ";
    
    }

?>
    
    <div class="row" style="height:870px;margin:0;">
    <div><table style="color: #000;border: 1px solid;" width="100%" cellspacing="0" cellpadding="6px">
<tr style=""> 
<th style="border: 1px solid;">S.no</th>
<th style="border: 1px solid;">Item name</th>
<th style="border: 1px solid;">Price</th>
<th style="border: 1px solid;">Quantity</th>
<th style="border: 1px solid;">Total</th>
</tr>
<?php 
echo $output;


?>

    </table>
    </div>
</div>
         <div class="row" style="height:50px;margin:0;">
            <div class="col-3 offset-9">
                Cashier's Signature
                ............................
            </div>
         </div>
    <div class="row" style="border:2px solid #000; margin:0; border-radius:20px;height:65px;">
    <div class="col-1">
    <img src="../assets/img/logos/phone.png" style="height: 4rem; margin: 0;padding: 6px;color:#000;"></img>
    </div>
    <div class="col-11" style="color:#000;font-size:13px;">
      <div class="row">
        <div class="col-12">
           <b style="font-size:13px;">Contact us</b>
        </div>
        <div class="row">
        <div class="col-4">
        <b style="font-size:13px;">Mob:</b> 9934332840
        </div>
        <div class="col-8">
          <b style="font-size:13px;">Email:</b> support@adarshcare.com
        </div>
        </div>
        <div class="row">
          <div class="col-12">
          <b style="font-size:13px;">Add:</b> In front of Baba Hariram Temple,Mairwa Dham,Mairwa Siwam(841239)
          </div>
        </div>
      </div>
    </div>
    </div>
</div>
</div>
   
<!--endprint-->
<div class="row">
  <div class="col-6 mt-5">
  <button style="float: right;" class="btn btn-info" type="submit" onclick="doPrint()">Print</button>

  </div>
</div>
<script >
//   function CallPrint(frm) { var prtContent = document.getElementById(frm);

// var WinPrint = window.open('','','letf=100,top=100,width=800,height=800,toolbar=0,scrollbars=0,status=0'); WinPrint.document.write(prtContent.innerHTML); WinPrint.document.close();

// WinPrint.focus();

// WinPrint.print();

// WinPrint.close(); }
const print = setTimeout(doPrint,3000);
const redirect = setTimeout(reDirect,4000);

function reDirect(){
location.replace("https://adarshcare.com//admin/pages/discharge-bill.php");

}
        function doPrint() {
        bdhtml=window.document.body.innerHTML;
        sprnstr="<!--startprint-->";
        eprnstr="<!--endprint-->";
        prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
        prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));
        window.document.body.innerHTML=prnhtml;
        window.print();
        window.document.body.innerHTML=bdhtml;
        }
</script>


</body>
</html>
