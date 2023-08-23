<?php 
session_start();
include "config.php";
if(!isset($_SESSION["user_name"])){
    header("Location:{$hostname}/admin/index.php");

}
  $p_id = $_POST['next'];
  $sql = "SELECT * FROM patients
          WHERE p_id = {$p_id}";
  $result = mysqli_query($conn,$sql) or die ("Query Failed.");
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
 Print Bill </title>
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
<div id="header" style=" ">
    <div class="row" style="border:2px solid #000; margin:0; border-radius:20px;">
        <div class="col-2 ps-1">
        <img src="../assets/img/logos/logo.jpg" style="height: 5rem; margin: 0;padding:1px;"></img>
        </div>
        <div class="col-8">
    <div style="text-align:center;" class="pt-1">
        <h1 style="margin-bottom: 0;color:#000;font-size: 30px;">ADARSH CARE</h1>
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
    <h5 style="text-align:center;color:#000;font-size: 16px;">DISCHARGE SUMMARY</h5>

    <div class="row"style="">
    <div class="col-6 patient-label" style="padding-left:35px;">
            Id : <?php echo $p_id; ?>
    </div>

    <div class="col-6 patient-label" style="">
            Date: <?php echo date("Y/m/d h:i:sa" ); ?>
    </div>
    </div>
    <div class="row"style="">

    <div class="col-6 patient-label" style="padding-left:35px;">
            Patient Name : <?php echo ucwords($row['p_name']); ?> 
    </div>
    <div class="col-2 patient-label" style="">
       Age : <?php echo $row['p_age']." "; ?>Yrs
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
            Mobile No : <?php echo $row['p_mobile']; ?> 
    </div>
    
    </div>
    <div class="row"style="">

    <div class="col-6 patient-label" style="padding-left:35px;">
            Admission Date : <?php echo $row['date']; ?> 
    </div>
    
    <div class="col-6 patient-label" style="">
            Discharge Date : <?php if(empty($_POST['date'])){
              echo $row['d_date']; 
            }else{
            echo $_POST['date'];
            } ?>
    </div>
    
    </div>
    <div class="row"style="">

    <div class="col-6 patient-label" style="padding-left:35px;">
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
    
    <div class="col-6 patient-label" style="">
    Operated/Pocedure By : <?php echo ucwords($_POST['operated']); ?>
    </div>
    
    </div>
    <div class="row" style="height:80px;margin:0;">
    <div class="col-12">
        <b class="pt-1"style="color:#000;"><u>DIAGNOSIS:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
          <?php echo $_POST['diagnosis']; ?> 
         </div>
         </div>

    </div>
    <div class="row" style="height:80px;margin:0;">
    <div class="col-12">
        <b class="pt-1"style="color:#000;font-size:14px;"><u>PRESENTING COMPLAINTS:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
          <?php echo $_POST['complaints']; ?> 
         </div>
         </div>

    </div>
    <div class="row" style="height:80px;margin:0;">
    <div class="col-12">
        <b class="pt-1"style="color:#000;font-size:14px;"><u>PAST HISTORY:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
          <?php echo $_POST['history']; ?> 
         </div>
         </div>

    </div>
    <div class="row" style="height:80px;margin:0;">
    <div class="col-12">
        <b class="pt-1 m-0"style="color:#000;margin-bottom: 0;font-size:14px;"><u>PROCEDURE / OPERATION DETAILS:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
          <?php echo $_POST['procedure']; ?> 
         </div>
         </div>
    </div>
    <div class="row" style="height:80px;margin:0;">
    <div class="col-12">
        <b class="pt-1 m-0"style="color:#000;margin-bottom: 0;font-size:14px;"><u>GENRAL PHYSICAL & EXAMINATION:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
          <?php
          if($row['p_bp']!=0){echo $row['p_bp']."mm of hg,";}
          if($row['p_pulse']!=0){echo $row['p_pulse']."/min,";}
          if($row['p_spo2']!=0){echo $row['p_spo2']."%,";}
          if($row['p_temp']!=0){echo $row['p_temp']."&#8457;,";}
          if($row['p_rr']!=0){echo $row['p_rr']."/min,";}
          if($row['p_ht']!=0){echo $row['p_ht']."cm,";}
          if($row['p_bmi']!=0){echo $row['p_bmi']."kg/m2,";}
          
          ?> 

         </div>
         </div>
                                  </div>
    <div class="row" style="height:80px;margin:0;">

         <div class="col-12">
        <b class="pt-1 m-0"style="color:#000;margin-bottom: 0;font-size:14px;"><u>TREATMENT AND COURSE DURING HOSPITLIZATION:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
          <?php
          if(isset($_POST['check'])){
            $output = "";
           $hh = $_POST['check'];
          foreach($hh as $item){
            $output .= $item.",";

          }
          echo $output;
          }
          
          ?> 

         </div>
         </div>
    </div>
    <div class="row" style="height:329px;margin:0;">
    <div class="col-6"style="border-right:1px solid;">
        <b class="pt-1"style="color:#000;font-size:20px;"><u>R<sub>x</sub></u> </b>
        <div class="patient-data" style="padding-left:15px;">
         </div>
         </div>
         <div class="col-6" >
          <div class="row">
          <div class="col-12"style="height:80px;margin:0;">
        <b class="pt-1 m-0"style="color:#000;margin-bottom: 0;font-size:14px;"><u>Condition at the time of Discharge:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
          <?php
          
          echo $_POST['condition'];
          
          ?> 

         </div>
         </div>
         <div class="col-12"style="height:120px;">
        <b class="pt-1 m-0"style="color:#000;margin-bottom: 0;font-size:14px;"><u>Advise:-</u></b>
        <div class="patient-data" style="padding-left:15px;">
        <?php
          if(isset($_POST['advise'])){
            $output1 = "<ul>";
           $adv = $_POST['advise'];
          foreach($adv as $item1){
            $output1 .= "<li>".$item1."</li>";

          }
          $output1 .= "<li>".$_POST['otheradv']."</li></ul>";
          echo $output1;
          }
          
          ?> 
         </div>
         </div>
         </div>
         
          </div>

    </div>
    <div class="row pb-">
    <div class="col-6 offset-6 mb-1" style="text-align:center;font-family: emoji;font-size:14px;">
          <b> Dr Signature</b>
          <div style="font-size:10px;">_._______________________._ </div>
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
<!-- <input type="button" onclick="doPrint()"> -->
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
location.replace("https://adarshcare.com//admin/pages/discharge-summary.php");

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