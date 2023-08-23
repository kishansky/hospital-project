<?php 
include "config.php";
    $p_id = $_POST['uid'];
    $data;
    // if(!empty($_POST['qty'])){
        $pay_bill[] = $_POST['pay'];
        // }
    
    $pay_bills =[];
    $deposits =[];
    if(!empty($_POST['qty'])){
    $qty = $_POST['qty'];
    }

    // if($pay_bill[0]>0){ $deposits[]= array('dep' => $_POST['pay']); }
    $discount = $_POST['discount'];
    $sql = "SELECT bill,discount,deposit FROM patients WHERE p_id='{$p_id}'";
    $result = mysqli_query($conn,$sql) or die ("Query Failed.");
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $data = $row['bill'];
            if($discount== 0){$discount=$row['discount'];}; 
            $pay_bills = $row['deposit'];
        }
    }
    

    $bill = json_decode($data,true);
    $deposits = json_decode($pay_bills,true);
    // echo "<pre>";
    // print_r($bill);
    // echo "</pre>";
    // if($pay_bill[0][1]!=0 && (!is_null($pay_bill))){ $deposits[]= array('dep' => $_POST['pay']); }
    if(isset($pay_bill) && $pay_bill[0][1]!=0){ $deposits[]= array('dep' => $_POST['pay']); }

   
        
    $output = '<div><table border="1" style="color: #000;border: 1px solid;" width="100%" cellspacing="0" cellpadding="10px">
    <tr style="background-color: skyblue;"> 
    <th style="border: 1px solid;">S.no</th>
    <th style="border: 1px solid;">Item name</th>
    <th style="border: 1px solid;">Price</th>
    <th style="border: 1px solid;">Quantity</th>
    <th style="border: 1px solid;">Total</th>
    </tr>';
    $sprice=[];
    $total=0;
    $deposit = 0;
    $td = 0;
    if(!empty($_POST['qty'])){
        $bill['qty']= $_POST['qty'];
        
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
        </table>
        </div>';
    
    
    
    }
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
            <td style='border-left: 1px solid;'>Deposite &#8377;{$pay_bill[1]} By {$pay_bill[0]} at {$pay_bill[2]}</td>
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
        </table>
        </div>";
        
        }
  


    echo $output;
    

    
    // $output = "";

    
                
    //     $output .= "</table>";
    //     echo $output;
    // }else{
    
    // echo "no data";
    // }


?>