<?php 
include "./header.php";
if(isset($_POST['save'])){
  $date = mysqli_real_escape_string($conn,$_POST['date']) ." ".date("h:i:sa");
  $p_name = mysqli_real_escape_string($conn,$_POST['p_name']);
  $p_address = mysqli_real_escape_string($conn,$_POST['p_address']);
  $p_mobile = mysqli_real_escape_string($conn,$_POST['p_mobile']);
  $p_sex = mysqli_real_escape_string($conn,$_POST['sex_name']);
  $p_age = mysqli_real_escape_string($conn,$_POST['p_age']);
  $p_weight = mysqli_real_escape_string($conn,$_POST['wt']);
  $gurdian = mysqli_real_escape_string($conn,$_POST['gurdian']);
  $p_bp = mysqli_real_escape_string($conn,$_POST['bp']);
  $p_pulse = mysqli_real_escape_string($conn,$_POST['pulse']);
  $p_spo2 = mysqli_real_escape_string($conn,$_POST['spo2']);
  $p_tem = mysqli_real_escape_string($conn,$_POST['temp']);
  $p_rr = mysqli_real_escape_string($conn,$_POST['rr']);
  $p_ht = mysqli_real_escape_string($conn,$_POST['height']);
  $p_bmi = mysqli_real_escape_string($conn,$_POST['bmi']);
  $p_lmp = mysqli_real_escape_string($conn,$_POST['lmp']);
  $p_edd = mysqli_real_escape_string($conn,$_POST['edd']);
  $doctor = mysqli_real_escape_string($conn,$_POST['doctor']);
  $a_user = $_SESSION['user_id'];

  // echo $date;

  // exit;

  $sql = "INSERT INTO patients (date,p_name,p_address,p_mobile,p_sex,p_age,p_weight,gurdian,p_bp,p_pulse,p_spo2,p_temp,p_rr,p_ht,p_bmi,p_lmp,p_edd,doctor,a_user)
  VALUES ('{$date}','{$p_name}','{$p_address}','{$p_mobile}','{$p_sex}','{$p_age}','{$p_weight}','{$gurdian}',
  '{$p_bp}','{$p_pulse}','{$p_spo2}','{$p_tem}','{$p_rr}','{$p_ht}','{$p_bmi}','{$p_lmp}','{$p_edd}','{$doctor}','{$a_user}')";
    if(mysqli_query($conn,$sql)){
      header("Location:{$hostname}/pages/patient-print.php");
  }else{
  echo "error";
  }
}



?>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-lg-7 position-relative z-index-2 w-lg-100">
            <div class="card card-plain mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column h-100">
                      <h2 class="font-weight-bolder mb-0">Add New Patient</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-12">
              <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                <div class="card mb-4">
                  <div class="row">
                  <div class="d-flex col-8 ">
                    <h6 class="ms-4 pt-2 text-danger">Required Field</h6>
                 </div>
                 <div class="col-md-4 col-sm-6 ">
                  <div class="d-flex px-1 py-1 mt-3 me-3">
                    <div class="input-group input-group-outline is-focused">
                      <label style="color: #2680ea;" for="date" class="form-label ">mm/dd/yyyy</label>
                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="date" id="date" name="date" value="<?php echo date("Y-m-d") ?>" required>
                      </div>
                    </div>
                 </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive" style="overflow-x: unset;">
                          <table class="table align-items-center ">
                            <tbody>
                              <tr class="row">
                                <td class="col-md-4 col-sm-6">
                                  <div class="d-flex px-2 py-1">
                                    <div class="input-group input-group-outline">
                                      <label style="color: #2680ea;" for="patient_name" class="form-label">Patient's Name</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="pname" name="p_name" size="20" required>
                                    </div>
                                  </div>
                                </td>
                                <td class="col-md-4 col-sm-6">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline">
                                    <label style="color: #2680ea;" for="patient_add" class="form-label">Address</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="p_address" name="p_address" size="20" required>
                                  </div>
                                  </div>
                                </td>
                                <td class="col-md-4 col-sm-6">
                                  <div class="px-2 py-1">
                                    <div class="input-group input-group-outline">
                                    <label style="color: #2680ea;" for="patient_mobile" class="form-label">Mobile No</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="page" name="p_mobile" maxlength="10" size="10"required>
                                  </div>
                                  </div>
                                </td>
                                
                                </tr>
                                <tr class="row">
                                <td class="col-md-4 col-sm-6">
                                    <div class="px-2 py-1">
                                      <div class="input-group input-group-outline">
                                      <label style="color: #2680ea;" for="patient_age" class="form-label">Age in Yrs</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="page" name="p_age" maxlength="3" size="3"required>
                                    </div>
                                    </div>
                                  </td>
                                  <td class="col-md-4 col-sm-6">
                                    <div class="px-2 py-1">
                                      <div class="input-group input-group-outline">
                                      <label style="color: #2680ea;" for="weight" class="form-label">Weight in Kg</label> 
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="wt" name="wt" size="3" maxlength="3" required>
                                    </div>
                                  </div>
                                  </td>
                                  <td class="col-md-4 col-sm-6">
                                    <div class="d-flex px-2 pt-2 ">
                                      <div class="">
                                        <label style="color: #2680ea;" for="sex">Sex:-</label>
                                        <input  type="radio" name="sex_name" id="male" value="0" required>
                                        <label style="color: #2680ea;" for="male">Male</label>
                                        <input type="radio" name="sex_name" id="female" value="1">
                                        <label style="color: #2680ea;" for="female">Female</label>
                                        <input type="radio" name="sex_name" id="other" value="2">
                                        <label  style="color: #2680ea;" for="other">Other</label>
                                      </div>
                                    </div>
                                  </td>
                            
                                </tr>
                                  
                             
                            </tbody>
                          </table>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="card mb-4 ">
                  <div class="d-flex">
                    <h6 class="ms-4 text-danger pt-2">Optional Field</h6>
                </div>
                  <div class="card-body p-3">
                                 
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive" style="overflow-x: unset;">
                          <table class="table align-items-center ">
                            <tbody>
                            <tr class="row">
                                    
                                  </tr>
                              <tr class="row">
                                <td class="col">
                                  <div class="d-flex px-2 py-1">
                                    <div class="input-group input-group-outline">
                                      <label style="color: #2680ea;" for="bp" class="form-label">B.P. in 'mm of hg'</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="bp" name="bp" size="7">
                                    </div>
                                  </div>

                                  </div>
                                </td>
                                <td class="col">
                                  <div class="px-2 py-1">
                                  <div class="input-group input-group-outline">
                                    <label style="color: #2680ea;" for="Pulse" class="form-label">Pulse in '/min'</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="pulse" name="pulse" size="3">
                                  </div>
                                  </div>

                                </td>
                                <td class="col">
                                  <div class="px-2 py-1">
                                  <div class="input-group input-group-outline">
                                    <label style="color: #2680ea;"for="spo2" class="form-label">SPO2 in '%'</label>
                                    <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="spo2" name="spo2" size="3">
                                  </div>
                                  </div>

                                </td>
                                
                                </tr>
                                <tr class="row">
                                  <td class="col">
                                    <div class="d-flex px-2 py-1">
                                      <div class="input-group input-group-outline">
                                        <label style="color: #2680ea;" for="temp" class="form-label">Temp in '&#8457;'</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="temp" name="temp" size="3"> 
                                      </div>
                                    </div>
                                  </td>
                                  <td class="col">
                                    <div class="px-2 py-1">
                                    <div class="input-group input-group-outline">
                                      <label style="color: #2680ea;" for="rr" class="form-label">RR in '/min'</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="rr" name="rr" size="3">
                                    </div>
                                    </div>

                                  </td>
                                  <td class="col">
                                    <div class="px-2 py-1">
                                    <div class="input-group input-group-outline">
                                      <label style="color: #2680ea;" for="height" class="form-label">Ht in 'cm'</label>
                                      <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="height" name="height" size="3">
                                    </div>
                                    </div>

                                  </td>
                                  
                                  </tr>
                                  <tr class="row">
                                    <td class="col">
                                      <div class="d-flex px-2 py-1">
                                      <div class="input-group input-group-outline">
                                        <label style="color: #2680ea;" for="bmi" class="form-label">B.M.I. in 'kg/m2'</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="text" id="bmi" name="bmi" size="3">
                                      </div>
                                      </div>

                                    </td>
                                    <td class="col">
                                      <div class="px-2 py-1">
                                      <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="lmp" class="form-label">LMP</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="date" id="lmp" name="lmp">
                                      </div>
                                      </div>

                                    </td>
                                    <td class="col">
                                      <div class="px-2 py-1">
                                      <div class="input-group input-group-outline is-focused">
                                        <label style="color: #2680ea;" for="edd" class="form-label">EDD</label>
                                        <input style="border-color: #2680ea; color: #2680ea;" class="form-control" type="date" id="edd" name="edd">
                                      </div>
                                      </div>

                                    </td>
                                  </tr>
                             
                            </tbody>
                          </table>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="card mb-3 ">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive" style="overflow-x: unset;">
                          <table class="table align-items-center ">
                            <tbody>
                              <tr class="row">
                                    <td class="col-4">
                                      <div class="d-flex px-2 ">
                                        <div class="input-group input-group-outline">
                                        <label style="color: #2680ea;" for="gurdian" class="form-label">Gurdian</label>
                                        <input style="border-color: #2680ea; color: #2680ea;"class="form-control" type="text" name="gurdian" id="gurdian" maxlength="20">
                                      </div>
                                      </div>
                                    </td>
                                <td class="col-4">
                                  <div class="d-flex px-2">
                                    <div class="input-group input-group-outline is-focused">
                                      <label style="color: #2680ea;" for="doctor" class="form-label">Appoiment to:</label>
                                      <select name="doctor" id="dr" class=" form-control" style="border-color: #2680ea; color: #2680ea;">
                                        <option value="1">Dr. Manoj Kumar</option><hr>
                                        <option value="2">Dr. Rasmi Rai</option>
                                        <option value="3">Dr. Ekbal Singh</option>
                                        <option value="4">Dr. B.K. Rai</option>
                                        <option value="5">Dr. R.S. Gupta</option>
                                      </select>
                                    </div>
                                  </div>
                                </td>
                                <td class="col-4">
                                  <div class="px-2">
                                    <input name="save" class="btn bg-gradient-info float-end me-4" type="submit" value="Save">
                                  </div>
                                </td>
                             
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              </div>

            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div id="globe" class="position-absolute end-0 top-10 mt-sm-3 mt-7
              me-lg-7">
              <canvas width="700" height="600" class="w-lg-100 h-lg-100 w-75
                h-75 me-lg-0 me-n10 mt-lg-5"></canvas>
            </div>
          </div>
        </div>

<?php
include "./footer.php";
?>