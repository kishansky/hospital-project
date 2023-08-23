<?php 
session_start();
include "config.php";
if(!isset($_SESSION["user_name"])){
    header("Location:{$hostname}/admin/index.php");

}
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
 Risk Bond</title>
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
    <div id="form" style="margin:0;height:985px;">
      <div class="row" >
        

      <div class="col-12 pt-2">
        <h5 style="text-align:center;color:#000;font-size: 20px;">RISK BOND</h5>
        </div>
        
        <div class="col-8 patient-label pt-2" style="padding-left:35px; font-size:18px;">
        दिनांक : <?php echo date("d/m/Y"); ?>
    </div>
    <div class="col-4 patient-label pt-2" style="padding-left:35px; font-size:18px;">
    समय : <?php echo date("h:i:sa"); ?> 
    </div>
    <div class="row pt-3">
       <div class="col-12 patient-label pt-2" style="padding-left:35px; font-size:18px;">
         मैं  &nbsp;...<?php echo ucwords($_POST['gardian']); ?>......&nbsp;&nbsp; ग्राम-&nbsp; ...<?php echo ucwords($_POST['village']); ?>.....&nbsp;&nbsp;पो०- ...<?php echo ucwords($_POST['post']); ?>........
       </div>
    </div>
    <div class="row pt-2">
       <div class="col-12 patient-label pt-2" style="padding-left:35px; font-size:18px;">
       जिला &nbsp;...<?php echo ucwords($_POST['dist']); ?>......&nbsp;&nbsp; का निवासी हूँ। मैं अपने मरीज श्री/श्रीमती &nbsp;..<?php echo ucwords($_POST['p_name']); ?>......
       </div>
    </div>
    <div class="row pt-2">
       <div class="col-12 patient-label pt-2" style="padding-left:35px; font-size:18px;">
       ....पुत्र/पुत्री/पत्नी &nbsp;...<?php echo ucwords($_POST['p_rel']); ?>......&nbsp;&nbsp; पता-&nbsp;...<?php echo ucwords($_POST['p_add']); ?>.....
       </div>
    </div>
<div class="row pt-2">
       <div class="col-12 patient-label pt-2" style="padding-left:35px; font-size:18px;">
       का पुरी जाँच प्रक्रिया समझने के बाद;&nbsp;...<?php echo ucwords($_POST['operation']); ?>.......ऑपरेशन/ मर्ती करने की अनुमती देता/देती हूँ ।
       </div>
    </div>

    <div class="row pt-5">
       <div class="col-4 offset-8 patient-label pt-2" style="padding-left:35px; font-size:18px;">
       <b>हस्ताक्ष</b> <br>
       ..........................
       </div>
    </div>
    <div class="row pt-2">
       <div class="col-12 patient-label ms-3 pt-2 mt-2" style="padding-left:15px; font-size:18px;border:2px solid #000; border-radius:20px;">
       <ul>
        <li> मे ऑपरेशन एवं बेहोशी के खतरे को जानते हुए एवं अस्पताल के कार्य से संतुष्ट होकर अनुमती प्रदान करता/करती हूँ। यह प्रक्रिया स्वस्थ्य व्यक्ति के जीवन के लिए खतरनाक हो सकता है। कोई भी दवाई पूर्ण रूप से सुरक्षित नहीं है।</li>
        <li>गंभीर अवस्था में रोगी को अस्पताल से उच्च चिकित्सा के लिए भेजा जा सकता है और किसी भी प्रकार की आपत्ति अस्पताल पर व्यक्त नहीं की जा सकती है।</li>
        <li>में मरीज की गम्भीर अवस्था से अवगत हूँ और सारी जिम्मेदारी मेरी होगी । इस पत्र को अनुशासनिक कार्य में प्रस्तुत किया जा सकता है अस्पताल पर कार्यवाही नहीं की सकती है।</li>
       </ul>
       </div>
    </div>
    <div class="row pt-5">
       <div class="col-8 patient-label pt-2" style="padding-left:35px; font-size:18px;">
       <div style="padding-bottom:5px;"><b>गवाह का हस्ताक्षर </b></div>
      <div style="padding-bottom:6px;"> 1.  .........................</div>
       <div>2.  .........................</div>
       </div>
       <div class="col-4 patient-label pt-5" style="padding-left:35px; font-size:18px;">
       <b>हस्ताक्ष</b> <br>
       ..........................
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
location.replace("https://adarshcare.com//admin/pages/risk-bond.php");

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