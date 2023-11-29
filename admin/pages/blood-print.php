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

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logos/logo.jpg">

    <title>
        Patient Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->

    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
    <style>
    @page {
        margin: 2px 6px;
    }

    .patient-label {
        color: #000;
        font-size: 13px;
        padding-left: 20px;
    }

    .patient-data {
        color: #000;
        font-size: 13px;
    }
    </style>
</head>

<body>

    <!--startprint-->
    <div id="printarea" style="width: 210mm; height: 300mm;">
        <div id="header" style=" ">
            <div class="row" style="border:2px solid #000; margin:0; border-radius:20px;">
                <div class="col-2 ps-1">
                    <img src="../assets/img/logos/logo.png" style="height: 5rem; margin: 1px;border-radius:5px;padding:1px;"></img>
                </div>
                <div class="col-8">
                    <div style="text-align:center;" class="pt-1">
                        <h1 style="margin-bottom: 0;color:#000;font-size: 30px;">ADARSH HOSPITAL</h1>
                        <div style="color:#000;margin-bottom: 0;font-size: 13px;margin-top: -2px;">
                            In front of Baba Hariram Temple,Mairwa Dham
                        </div>
                        <!-- ,+91-9934332840 -->
                        <div style="color:#000;margin-bottom: 0;font-size: 13px; margin-top:-4px;">www.adarshcare.com
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <img src="../assets/img/logos/iso.png" class="pe-0"
                        style="height: 4.5rem; margin: 0;padding-left: 20px;padding-top:2px;"></img>
                </div>
            </div>

        </div>

        <div id="form" style="margin:0;height:670px;">
            <div class="row">
                <div class="col-12 pt-4">
                    <h5 style="text-align:center;color:#000;font-size: 25px;"><u> &nbsp;REQUISITION FOR WHOLE HUMAN
                            BLOOD &nbsp; </u></h5>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Patient Name:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo ucwords($_POST['name']) ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    S/o,D/o,W/o:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo ucwords($_POST['relation']) ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Age: <b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['age'] ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Diagnosis:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo ucwords($_POST['diagnosis']) ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Registration No:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['reg_no'] ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Indoor No:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['indoor'] ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Bed No:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['bed'] ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Ward No:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['ward'] ?></b>
                </div>
                <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                    Requirement:
                    <b>&nbsp;&nbsp;&nbsp;<?php echo ucwords($_POST['req']) ?></b>
                </div>

                <div class="col-4 pt-3 " style="font-size:24px;color:#000; padding-left:38px;">
                    Date : <b><?php echo date('d/m/Y'); ?></b>
                </div>
                <div class="col-4  pt-4 offset-4">
                    Dr. Signature
                    ........................
                </div>
            </div>
        </div>
    <div class="row" style="margin:0;height:315px;">
        <div class="col-7 offset-5 pt-4">
            <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                Doctor Name:&nbsp;&nbsp;<b> <?php
                $case = $_POST['doctor'];
                switch($case){
                    case '1':
                        echo "Dr. Manoj Kumar"; 
                        break;
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
                    }
                
                ?></b>
                
            </div>
            <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                Qualification:&nbsp;&nbsp;<b> <?php
                $case = $_POST['doctor'];
                switch($case){
                    case '1':
                        echo "M.D. (GEN. MEDICINE)"; 
                        break;
                    case '2':
                        echo "M.S. (GENERAL SURGERY)"; 
                        break;
                    case '3':
                        echo "M.B.B.S. (M.U.)"; 
                        break;         
                    case '4':
                        echo "M.D. (AGRA)"; 
                        break;
                    case '5':
                        echo "M.D. (GEN. MEDICINE)"; 
                        break;
                    }
                
                ?></b>
            </div>
            <div class="col-12 pt-3" style="font-size:24px;color:#000; padding-left:38px;">
                Registration:&nbsp;&nbsp;<b> 08/2021-2022 </b>
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
                        <b style="font-size:13px;">Mob: 9934332840</b>
                    </div>
                    <div class="col-8">
                        <b style="font-size:13px;">Email: support@adarshcare.com</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <b style="font-size:13px;">Add: In front of Baba Hariram Temple,Mairwa Dham,Mairwa
                            Siwam(841239) </b>
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
    <script>
    const print = setTimeout(doPrint,3000);
const redirect = setTimeout(reDirect,4000);

function reDirect(){
location.replace("https://adarshcare.com//admin/pages/search-blood.php");

}
    function doPrint() {
        bdhtml = window.document.body.innerHTML;
        sprnstr = "<!--startprint-->";
        eprnstr = "<!--endprint-->";
        prnhtml = bdhtml.substr(bdhtml.indexOf(sprnstr) + 17);
        prnhtml = prnhtml.substring(0, prnhtml.indexOf(eprnstr));
        window.document.body.innerHTML = prnhtml;
        window.print();
        window.document.body.innerHTML = bdhtml;
    }
    </script>


</body>

</html>
