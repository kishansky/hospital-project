<?php include "header.php"; ?>

<main>
    <div>
        <?php 
        if(isset($_GET['sid'])){
        
        ?>
    <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-md-4 offset-md-4 p-3" style="border:1px solid #2680ea; border-radius:5px; background-color:rgb(252, 211, 211);">
            <h3>Are you want to delete Item:- <?php echo $_GET['sid']; ?></h3><hr style="color:#f20c54; padding:1px;">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form" autocomplete="off">
                <input value="Yes" name="yes" type="submit" class="btn btn-lg bg-gradient-danger btn-lg w-100 mt-4 mb-0">
                <input value="No" name="no" type="submit" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">
                
            </form>
            </div>
            <?php 
            if(isset($_POST['yes'])){
                $s_id = $_GET['sid'];
                $sql = "DELETE FROM services WHERE service_id ={$s_id};";
                if(mysqli_multi_query($conn, $sql)){
                    header("Location:{$hostname}/pages/edit-bill.php");
                }else{
                    echo "Query failed.";
                }
            }
            if(isset($_POST['no'])){
                header("Location:{$hostname}/pages/edit-bill.php");
            }
            
            ?>
                  
          </div>
        </div>
      </div>
    </section>
  </main>
<?php 
}else{
?>
<h3>Opps Page Not Found..</h3>
<?php 
}
?>


<?php include "footer.php"; ?>