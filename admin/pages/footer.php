<?php 
ob_end_flush();
?>
<footer class="footer py-4 mt-5">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-12 mb-lg-0 mb-4 text-center">
                <div class="copyright  text-sm text-muted
                  text-lg-start">
                  copyright Ⓒ Adarsh Hospital
                </div>
              </div>
              
            </div>
          </div>
        </footer>

      </div>


    </main>



    <!--<div class="fixed-plugin">-->
    <!--  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">-->
    <!--    <i class="material-icons py-2">settings</i>-->
    <!--  </a>-->
    <!--  <div class="card shadow-lg">-->
    <!--    <div class="card-header pb-0 pt-3">-->
    <!--      <div class="float-start">-->
    <!--        <h5 class="mt-3 mb-0">Adarash Hospital</h5>-->
    <!--      </div>-->
    <!--      <div class="float-end mt-4">-->
    <!--        <button class="btn btn-link text-dark p-0-->
    <!--          fixed-plugin-close-button">-->
    <!--          <i class="material-icons">clear</i>-->
    <!--        </button>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--    <hr class="horizontal dark my-1">-->
    <!--    <div class="card-body pt-sm-3 pt-0">-->
          
    <!--      <div class="mt-2 d-flex">-->
    <!--        <h6 class="mb-0">Light / Dark</h6>-->
    <!--        <div class="form-check form-switch ps-0 ms-auto my-auto">-->
    <!--          <input class="form-check-input mt-1 ms-auto" type="checkbox"-->
    <!--            id="dark-version" onclick="darkMode(this)">-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <hr class="horizontal dark my-sm-4">-->



          
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->


    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>



    <script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script
      src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
  </body>

</html>