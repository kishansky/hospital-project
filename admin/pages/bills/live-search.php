<?php 
include "config.php";
$search_value = $_POST['search'];
$p_id = $_POST['uid'];
if(empty($_POST['qty'])){
    $condition['qty'] = array(
     "0","0"
    );
    }else{
$condition['qty'] = $_POST['qty'];
    }
echo $search_value;
                $sql = "SELECT * FROM services WHERE service_name LIKE '%{$search_value}%'";
                $result = mysqli_query($conn,$sql) or die ("Query Failed.");
                $data =[];
                if(mysqli_num_rows($result) >0){
                    while($row = mysqli_fetch_assoc($result)){
                        $data[] = array(
                            0 => $row['service_id'],
                            1 => $row['service_name'],
                            2 => $row['service_price'],
                            3 => '0',
                            4 => $row['unit']
                        ); 
                        }
                    }
                    // $sql1 = "SELECT bill FROM patients WHERE p_id='{$p_id}'";
                    // $result1 = mysqli_query($conn,$sql1) or die ("Query Failed.");
                    // $condition = [];
                    // if(mysqli_num_rows($result1) > 0){
                    //     while($row = mysqli_fetch_assoc($result1)){
                    //         $condition = $row['bill'];
                    //     }
                    // }
                    // $condition = json_decode($condition,true);
                    
                
                    $flag;
                    $output = '
                  
                  <thead class="table-info">
                        <tr class= " m-0 p-0">
                          <th class="col-1 px-0"></th>
                          <th class="col-2 px-0">Item id</th>
                          <th class="col-3 px-0">Item</th>
                          <th class="col-2 px-0">Price</th>
                          <th class="col-2 px-0">Quantity</th>
                          <th class="col-2 px-0">Unit</th>
                        </tr>
                      </thead>
               
                <tbody class="table-light" >';

                foreach($data as $item){
                    $flag = TRUE;
                    foreach($condition['qty'] as $con){
                        if($con[0] == $item[0]){
                            $output .= '<tr class="">
                            <td class="col-1">
                               <div class="form-check">
                                   <input class="form-check-input" type="checkbox" id="check" name="check" value="'. $item[0] .'" '; if($con[0] == $item[0]){ $output .="checked"; } $output .='>
                               </div>
                           </td>
                           <td class="col-2">'.$item[0].'</td>
                           <td class="col-3">'. $item[1] .'</td>
                           <td class="col-2">&#8377;'. $item[2] .'</td>
                           <td class="col-2">
                               
                           <div class="quantity-field" >
                     <button 
                       class="value-button decrease-button" 
                       onclick="decreaseValue(this)" 
                       title="Azalt">-</button>
                       <input class="number" id="qty'. $item[0] .'" value="'; if($con[0] == $item[0]){ $output .= $con[1]. '"'; } $output .='">
                     <button 
                       class="value-button increase-button" 
                       onclick="increaseValue(this, 50)"
                       title="Arrtır"
                     >+
                     </button>
                   </div>
                           </td>
                           <td class="col-2">'. $item[4].'</td>
                         </tr>';
                         $flag = FALSE;
                        }
                        }
                        if($flag == TRUE){
                        $output .= '<tr>
                        <td class="col-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check" name="check" value="'. $item[0] .'" >
                        </div>
                    </td>
                    <td class="col-2">'.$item[0].'</td>
                    <td class="col-3">'. $item[1] .'</td>
                    <td class="col-2">&#8377;'. $item[2] .'</td>
                    <td class="col-2">
                        
                    <div class="quantity-field" >
              <button 
                class="value-button decrease-button" 
                onclick="decreaseValue(this)" 
                title="Azalt">-</button>
                <input class="number" id="qty'. $item[0] .'" value="'.$item[3].'">
              <button 
                class="value-button increase-button" 
                onclick="increaseValue(this, 50)"
                title="Arrtır"
              >+
              </button>
            </div>
                    </td>
                    <td class="col-2">'. $item[4] .'</td>
                  </tr>';
                }
            }
            $output .= "</tbody>";

            echo $output;
                ?>