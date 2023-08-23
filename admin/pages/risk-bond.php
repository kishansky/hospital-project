<?php include "header.php"; ?>

<main>
    <div>
    

      <div class="row mt-4 mb-5">
          <div class="col-2"></div>
        <div class="col-8">
        <div class="card mb-4 ">
    <div class="card-body p-3">
        <form  action="risk-print.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        
                                <div class="col-md-6">
                                    <div class="">
                                    <label for="gardian" class="form-label" style="color:#2680ea;">Gurdian Name:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="gardian" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;" autofocus required>
                                    </div>
                                  </div>
  
                                <div class="col-md-6">
                                    <div class="">
                                    <label for="village" class="form-label" style="color:#2680ea;">Village:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="village" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row pt-2">
                                <div class="col-md-6">
                                    <div class="">
                                    <label for="post" class="form-label" style="color:#2680ea;">Post:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="post" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="">
                                    <label for="dist" class="form-label" style="color:#2680ea;">Dist:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="dist" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row pt-4">
                                <div class="col-md-6 ">
                                    <div class="">
                                    <label for="p_name" class="form-label" style="color:#2680ea;">Patient Name:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="p_name" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"required>
                                    </div>
                                  </div>
                                
                                  <div class="col-md-6 pt-3">
                                    <div class="">
                                    <label for="relation" class="form-label" style="color:#2680ea;">Relation:-</label><br> 
                                        <input  type="radio" name="relation" id="son" value="0" required>
                                        <label style="color: #2680ea;" for="son">Son of</label>
                                        <input type="radio" name="relation" id="daughter" value="1">
                                        <label style="color: #2680ea;" for="daughter">Daughter of</label>
                                        <input type="radio" name="relation" id="wife" value="2">
                                        <label  style="color: #2680ea;" for="wife">Wife of</label>
                                        <input type="radio" name="relation" id="husband" value="2">
                                        <label  style="color: #2680ea;" for="husband">Husband of</label>
                                    </div>
                                  </div>
                                  
                                  </div>
                                  <div class="row pt-2">
                                  <div class="col-md-6 ">
                                    <div class="">
                                    <label for="p_rel" class="form-label" style="color:#2680ea;">Son/Daughter/Wife/Husband:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="p_rel" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"required>
                                    </div>
                                  </div>
                                <div class="col-md-6 ">
                                    <div class="">
                                    <label for="p_add" class="form-label" style="color:#2680ea;">Patient Address:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="p_add" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"required>
                                    </div>
                                  </div>
                                  </div>

                                  <div class="row pt-2">
                                <div class="col-md-6 ">
                                    <div class="">
                                    <label for="operation" class="form-label" style="color:#2680ea;">Operation:-</label> 
                                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="operation" rows="3" style="color:#000;border: 1px solid #f20c54;padding:0.5rem;"required>
                                    </div>
                                  </div>
                                  </div>
                           
                                <div class="col-md-6 m-4">
                                <button style="float: right;" class="btn btn-info" type="submit" name="next" value="">Next</button>
                                </div>
                            </form>        
        </div>
      </div>
      </div>
      </div>




<?php include "footer.php"; ?>
