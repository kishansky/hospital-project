<?php include "header.php"; 

$pid = $_GET['pid'];

$sql = "SELECT * FROM patients WHERE p_id = {$pid}";
$result = mysqli_query($conn,$sql) or die ("Query Failed.");


?>

<main>
    <div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <?php 
                if(mysqli_num_rows($result) >0){
                    while($row = mysqli_fetch_assoc($result)) {
                
                ?>

                <div class="card mb-4 ">
                    <div class="card-body p-3">
                        <form action="blood-print.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="gardian" class="form-label" style="color:#2680ea;">Patient's
                                            Name:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="name" rows="3" value="<?php echo $row['p_name'];?>"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;" autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="">
                                        <label for="village" class="form-label"
                                            style="color:#2680ea;">S/o,D/o,W/o:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="relation" rows="3"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="post" class="form-label" style="color:#2680ea;">Age:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="age" rows="3" value="<?php echo $row['p_age'];?>"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="dist" class="form-label" style="color:#2680ea;">Diagnosis:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="diagnosis" rows="3"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="post" class="form-label" style="color:#2680ea;">Registration
                                            No:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="reg_no" rows="3" value="<?php echo $row['p_id']; ?>"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="dist" class="form-label" style="color:#2680ea;">Indoor No:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="indoor" rows="3"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="post" class="form-label" style="color:#2680ea;">Bed No:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="bed" rows="3"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="dist" class="form-label" style="color:#2680ea;">Ward No:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="ward" rows="3"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="post" class="form-label"
                                            style="color:#2680ea;">Requirement:-</label>
                                        <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                            name="req" rows="3"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label style="color: #2680ea;" for="doctor" class="form-label">Appoiment
                                            to:</label>
                                        <select name="doctor" id="dr" class=" form-control"
                                            style="color:#000;border: 1px solid #f20c54;padding:0.5rem;">
                                            <option value="1"<?php if($row['doctor']==1){ echo "selected";} ?>>Dr. Manoj Kumar</option>
                                            <hr>
                                            <option value="2"<?php if($row['doctor']==2){ echo "selected";} ?>>Dr. Rasmi Rai</option>
                                            <option value="3"<?php if($row['doctor']==3){ echo "selected";} ?>>Dr. Ekbal Singh</option>
                                            <option value="4"<?php if($row['doctor']==4){ echo "selected";} ?>>Dr. B.K. Rai</option>
                                            <option value="5"<?php if($row['doctor']==5){ echo "selected";} ?>>Dr. R.S. Gupta</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                    <div class="col-md-6 m-4">
                        <button style="float: right;" class="btn btn-info" type="submit" name="next"
                            value="12">Next</button>
                    </div>
                    </form>
                </div>
            </div>
            <?php 
                }
                    }
                    ?>
        </div>
    </div>

    <?php include "footer.php"; ?>