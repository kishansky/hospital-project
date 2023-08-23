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
          margin:4px 6px;
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
<div id="header" style=" ">
    <div class="row" style="border:2px solid #000; margin:0; border-radius:20px;">
        <div class="col-2 ps-1">
        <img src="../assets/img/logos/logo.jpg" style="height: 5rem; margin: 0;padding:1px;"></img>
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
            Id : <?php echo $row['p_id']; ?>
    </div>

    <div class="col-6 patient-label" style="">
            Date: <?php echo $row['date']; ?>
    </div>
    </div>
    <div class="row"style="">

    <div class="col-6 patient-label" style="padding-left:35px;">
            Patient Name : <?php echo ucwords($row['p_name']); ?> 
    </div>
    <div class="col-2 patient-label" style="">
       Age : <?php echo $row['p_age']. " "; ?>Yrs
    </div>
    
    <div class="col-4 patient-label" style="">
       Sex : <?php if($row['p_sex'] == 0){echo "Male";}elseif($row['p_sex'] == 1){echo "Female";}else{echo "other";}; ?>
    </div>
    
    </div>

    <div class="row"style="">
    
    <div class="col-6 patient-label" style="padding-left:35px;">
            Address : <?php echo ucwords($row['p_address']); ?>
    </div>

    <div class="col-6 patient-label" style="">
            Treatment By : <?php 
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
                                ?>
    </div>
    </div>

    
    
    
    
    
         
    <div class="row" style="height:920px;margin:0;">
    <div class="col-2" style="height:920px;margin:0;border-right:1px solid;border-top:1px solid;">
<div class="row">
    <div class="col-12 pt-1 p-0" style="color:#000;">
        <b style="font-size:15px;">Dr.Manoj Kumar</b>
        <div style="font-size:12px;">M.D.(Gen. Medicine)</div>
    </div>
    <div class="col-12 pt-1 p-0" style="color:#000;">
        <b style="font-size:15px;">Dr. Rasmi Rai</b>
        <div style="font-size:12px;">M.S.(General surgery)</div>
    </div>
    <div class="col-12 pt-1 p-0" style="color:#000;">
        <b style="font-size:15px;">Dr. Ekbal Singh</b>
        <div style="font-size:12px;">M.B.B.S.(M.U.)</div>
    </div>
    <div class="col-12 pt-1 p-0" style="color:#000;">
        <b style="font-size:15px;">Dr. B.K. Rai</b>
        <div style="font-size:12px;">M.D.(agra)</div>
    </div>
    <div class="col-12 pt-1 pb-1 pb-2 p-0" style="color:#000;border-bottom:1px solid;">
        <b style="font-size:15px;">Dr. R.S. Gupta</b>
        <div style="font-size:12px;">M.D.(gen. medicine)</div>
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    B.P. <b style="font-size:15px;"><?php if($row['p_bp'] ==0){echo "__";}else{ echo $row['p_bp'];} ?></b> mm of hg
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    Pulse <b style="font-size:15px;"><?php if($row['p_pulse'] ==0){echo "__";}else{ echo $row['p_pulse'];} ?></b> /min
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    SPO<sub>2</sub> <b style="font-size:14px;"><?php if($row['p_spo2'] ==0){echo "__";}else{ echo $row['p_spo2'];} ?></b> %
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    Temp <b style="font-size:15px;"><?php if($row['p_temp'] ==0){echo "__";}else{ echo $row['p_temp'];} ?></b> &#8457;
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    RR <b style="font-size:15px;"><?php if($row['p_rr'] ==0){echo "__";}else{ echo $row['p_rr'];} ?></b> /min
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    Ht <b style="font-size:15px;"><?php if($row['p_ht'] ==0){echo "__";}else{ echo $row['p_ht'];} ?></b> cm
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    Weight <b style="font-size:15px;"><?php if($row['p_weight'] ==0){echo "__";}else{ echo $row['p_weight'];} ?></b> Kg
    </div>
    <div class="col-12 pt1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    B.M.I. <b style="font-size:15px;"><?php if($row['p_bmi'] ==0){echo "__";}else{ echo $row['p_bmi'];} ?></b> kg/m2
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    LMP <b style="font-size:15px;"><?php if($row['p_lmp'] ==0){echo "__";}else{ echo $row['p_lmp'];} ?></b>
    </div>
    <div class="col-12 pt-1 pb-1 p-0" style="color:#000;border-bottom: 1px solid #ccc;">
    EDD <b style="font-size:15px;"><?php if($row['p_edd'] ==0){echo "__";}else{ echo $row['p_edd'];} ?></b>
    </div>
</div>
    </div>
<div class="col-10">
    <div class="row">
    <div class="col-12"style="border-top:1px solid;height:100px;">
        <b class="pt-1"style="color:#000;font-size:20px;"><u>C<sub>o</sub></u> </b>
        <div class="patient-data" style="padding-left:15px;">
         </div>
         </div>

        <div class="col-12"style="border-top:1px solid;height:500px;">
        <b class="pt-1"style="color:#000;font-size:20px;"><u>R<sub>x</sub></u> </b>
        <div class="patient-data" style="padding-left:15px;">
         </div>
         </div>
         <div class="col-12"style="">
        <b class="pt-1 m-0"style="color:#000;margin-bottom: 0;font-size:14px;"><u>Advise:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
         </div>
         </div>
         </div>
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
location.replace("https://adarshcare.com//admin/pages/add-patient.php");

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

<?php 
}
}
?>
</body>
</html>