<?php 
include ("header.php");
$p_id = 3;
[
    {
        "dep": [
            "admin",
            "500",
            "2023/01/13 12:52:45pm"
        ]
    },
    {
        "dep": [
            "admin",
            "500",
            "2023/01/14 11:27:17am"
        ]
    }
]
                $sql = "SELECT * FROM services ORDER BY service_name";
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
                    $sql1 = "SELECT bill FROM patients WHERE p_id='{$p_id}'";
                    $result1 = mysqli_query($conn,$sql1) or die ("Query Failed.");
                    $condition = [];
                    if(mysqli_num_rows($result1) > 0){
                        while($row = mysqli_fetch_assoc($result1)){
                            $condition = $row['bill'];
                        }
                    }
                    $condition = json_decode($condition,true);
                $new_data = [];
                $flag;
                foreach($data as $item){
                    $flag = TRUE;
                    foreach($condition['qty'] as $con){
                        if($con[0] == $item[0]){
                            $new_data[] = array(
                                0 => $item[0],
                                1 => $item[1],
                                2 => $item[2],
                                3 => $con[1],
                                4 => $item[3]
                            );
                            $flag = FALSE;
                        }
                        }
                        if($flag == TRUE){
                        $new_data[] = $item;
                        }

                    }
                
            
            // echo "<pre>";
            // print_r($new_data);
            // echo "</pre>";
?>

<table class="table table-bordered  table-hover">
<thead class="table-info">
      <tr class= "row m-0 p-0">
        <th class="col-1 px-0"></th>
        <th class="col-2 px-0">Item id</th>
        <th class="col-3 px-0">Item</th>
        <th class="col-2 px-0">Price</th>
        <th class="col-2 px-0">Quantity</th>
        <th class="col-2 px-0">Unit</th>
      </tr>
    </thead>
    <tbody class="table-light" >
      <tr class="row m-0 p-0">
        <?php 
           foreach($data as $item){
            $flag = TRUE;
            foreach($condition['qty'] as $con){
                if($con[0] == $item[0]){
        ?>
         <td class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check" name="check" value="<?php echo $item[0]; ?>" <?php if($con[0] == $item[0]){ echo "checked"; } ?>>
            </div>
        </td>
        <td class="col-2"><?php echo $item[0]; ?></td>
        <td class="col-3"><?php echo $item[1]; ?></td>
        <td class="col-2">&#8377;<?php echo $item[2]; ?></td>
        <td class="col-2">
            
        <div class="quantity-field" >
  <button 
    class="value-button decrease-button" 
    onclick="decreaseValue(this)" 
    title="Azalt">-</button>
    <input class="number" id="<?php echo "qty". $item[0] ?>" value="<?php if($con[0] == $item[0]){ echo $con[1] } ?>">
  <button 
    class="value-button increase-button" 
    onclick="increaseValue(this, 50)"
    title="Arrtır"
  >+
  </button>
</div>
        </td>
        <td class="col-2"><?php echo $item[4]; ?></td>
        
        <?php
        $flag = FALSE;
    }
    }
    if($flag == TRUE){
        ?>
            <td class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check" name="check" value="<?php echo $item[0]; ?>" >
            </div>
        </td>
        <td class="col-2"><?php echo $item[0]; ?></td>
        <td class="col-3"><?php echo $item[1]; ?></td>
        <td class="col-2">&#8377;<?php echo $item[2]; ?></td>
        <td class="col-2">
            
        <div class="quantity-field" >
  <button 
    class="value-button decrease-button" 
    onclick="decreaseValue(this)" 
    title="Azalt">-</button>
    <input class="number" id="<?php echo "qty". $item[0]; ?>" value="<?php echo $item[3]; ?>">
  <button 
    class="value-button increase-button" 
    onclick="increaseValue(this, 50)"
    title="Arrtır"
  >+
  </button>
</div>
        </td>
        <td class="col-2"><?php echo $item[4]; ?></td>
    <?php    
    }
        }
        ?>

      </tr>
      </tbody>
  </table>

    <?php 
                    
                    
                    // $total_record = mysqli_num_rows($result);
                    // if($total_record >0){
                    // while($row = mysqli_fetch_assoc($result)){
                    //     $rows[] = array(
                    //         0 => $row['service_id'],
                    //         1 => $row['service_name'],
                    //         2 => $row['service_price'],
                    //         3 => '0',
                    //         4 => $row['unit']
                    //     ); 
                    //     }
                    // }
        //             echo "<pre>";
        // print_r($rows);
        // echo "</pre>";
                    ?>
    
      <?php 
    //   for($j=0;$j<(count($data));$j++){
        
    //     if($data[$j][0] == $rows[0]){
    //             $new_data[0] = array(
    //                 0 => $rows[0],
    //                 1 => $rows[1],
    //                 2 => $rows[2],
    //                 3 => $data[$j][1],
    //                 4 => $row[4]
    //             ); 
            
        ?>

        <?php 
        // }else{
        //     $new_data[] = array(
        //         0 => $rows[0],
        //         1 => $rows[1],
        //         2 => $rows[2],
        //         3 => $rows[3],
        //         4 => $rows[4]
        //     ); 
        ?>
        
        
        <?php
        // }
            
        // }
            ?>
      
    <?php
// echo "<pre>";
//         print_r($new_data);
//         echo "</pre>";
    ?>










    <?php 
                $sql = "SELECT * FROM services ORDER BY service_name";
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
                    $sql1 = "SELECT bill FROM patients WHERE p_id='{$p_id}'";
                    $result1 = mysqli_query($conn,$sql1) or die ("Query Failed.");
                    $condition = [];
                    if(mysqli_num_rows($result1) > 0){
                        while($row = mysqli_fetch_assoc($result1)){
                            $condition = $row['bill'];
                        }
                    }
                    $condition = json_decode($condition,true);
                    if(empty($condition)){
                        $condition['qty'] = array(
                         "0","0"
                        );
                        }
                    $flag;
                ?>
        <div>
        <nav class="navbar navbar-expand-sm navbar-light bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="#">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Test</a>
        </li>
      </ul>
      
      
    </div>
    
  </div >
    <form class="">
        <div class="input-group input-group-outline">
            <label style="color: #2680ea;" for="bmi" class="form-label">Search</label>
            <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="search" name="bmi" maxsize="10">
        </div>
    </form>
</nav>
        </div>
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
   
    <tbody class="table-light" >

    <?php 
           foreach($data as $item){
            $flag = TRUE;
            foreach($condition['qty'] as $con){
                if($con[0] == $item[0]){
        ?>
        <tr class="">
         <td class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check" name="check" value="<?php echo $item[0]; ?>" <?php if($con[0] == $item[0]){ echo "checked"; } ?>>
            </div>
        </td>
        <td class="col-2"><?php echo $item[0]; ?></td>
        <td class="col-3"><?php echo $item[1]; ?></td>
        <td class="col-2">&#8377;<?php echo $item[2]; ?></td>
        <td class="col-2">
            
        <div class="quantity-field" >
  <button 
    class="value-button decrease-button" 
    onclick="decreaseValue(this)" 
    title="Azalt">-</button>
    <input class="number" id="<?php echo "qty". $item[0] ?>" value="<?php if($con[0] == $item[0]){ echo $con[1]; } ?>">
  <button 
    class="value-button increase-button" 
    onclick="increaseValue(this, 50)"
    title="Arrtır"
  >+
  </button>
</div>
        </td>
        <td class="col-2"><?php echo $item[4]; ?></td>
      </tr>
        
        <?php
        $flag = FALSE;
    }
    }
    if($flag == TRUE){
        ?>
        <tr>
            <td class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check" name="check" value="<?php echo $item[0]; ?>" >
            </div>
        </td>
        <td class="col-2"><?php echo $item[0]; ?></td>
        <td class="col-3"><?php echo $item[1]; ?></td>
        <td class="col-2">&#8377;<?php echo $item[2]; ?></td>
        <td class="col-2">
            
        <div class="quantity-field" >
  <button 
    class="value-button decrease-button" 
    onclick="decreaseValue(this)" 
    title="Azalt">-</button>
    <input class="number" id="<?php echo "qty". $item[0]; ?>" value="<?php echo $item[3]; ?>">
  <button 
    class="value-button increase-button" 
    onclick="increaseValue(this, 50)"
    title="Arrtır"
  >+
  </button>
</div>
        </td>
        <td class="col-2"><?php echo $item[4]; ?></td>
      </tr>

    <?php    
    }
        }
        ?>

      
      
    </tbody>
<?php

include ("footer.php");

?>