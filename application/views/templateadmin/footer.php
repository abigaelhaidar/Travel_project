<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 footer-copyright">
        <p class="mb-0">Copyright 2025 © <a href="" target="_blank">Djautoservice.com</a>. All rights reserved</p>
      </div>
      <div class="col-md-6">
        <p class="float-end mb-0">
          Hand crafted :
          <a href="https://www.instagram.com/jogjamediadev" target="_blank" class="ms-2" title="Visit Instagram Profile">
            <i class="fab fa-instagram footer-icon" style="font-size: 24px;"></i>
          </a>
        </p>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }, function(err) {
        console.log('ServiceWorker registration failed: ', err);
      });
    });
  }
</script>

<!-- jquery-->
<script src="<?= base_url('assets/') ?>admin/js/vendors/jquery/jquery.min.js"></script>
<!-- bootstrap js-->
<script src="<?= base_url('assets/') ?>admin/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
<script src="<?= base_url('assets/') ?>admin/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
<!--fontawesome-->
<script src="<?= base_url('assets/') ?>admin/js/vendors/font-awesome/fontawesome-min.js"></script>
<!-- feather-->
<script src="<?= base_url('assets/') ?>admin/js/vendors/feather-icon/feather.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/vendors/feather-icon/custom-script.js"></script>
<!-- sidebar -->
<script src="<?= base_url('assets/') ?>admin/js/sidebar.js"></script>
<!-- height_equal-->
<script src="<?= base_url('assets/') ?>admin/js/height-equal.js"></script>
<!-- config-->
<script src="<?= base_url('assets/') ?>admin/js/config.js"></script>
<!-- apex-->
<script src="<?= base_url('assets/') ?>admin/js/chart/apex-chart/apex-chart.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/chart/apex-chart/stock-prices.js"></script>
<!-- scrollbar-->
<script src="<?= base_url('assets/') ?>admin/js/scrollbar/simplebar.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/scrollbar/custom.js"></script>
<!-- slick-->
<script src="<?= base_url('assets/') ?>admin/js/slick/slick.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/slick/slick.js"></script>
<!-- data_table-->
<script src="<?= base_url('assets/') ?>admin/js/js-datatables/datatables/jquery.dataTables.min.js"></script>
<!-- page_datatable-->
<script src="<?= base_url('assets/') ?>admin/js/js-datatables/datatables/datatable.custom.js"></script>
<!-- page_datatable1-->
<script src="<?= base_url('assets/') ?>admin/js/js-datatables/datatables/datatable.custom1.js"></script>
<!-- page_datatable-->
<script src="<?= base_url('assets/') ?>admin/js/datatable/datatables/datatable.custom.js"></script>
<!-- theme_customizer-->
<script src="<?= base_url('assets/') ?>admin/js/theme-customizer/customizer.js"></script>
<!-- tilt-->
<script src="<?= base_url('assets/') ?>admin/js/animation/tilt/tilt.jquery.js"></script>
<!-- page_tilt-->
<script src="<?= base_url('assets/') ?>admin/js/animation/tilt/tilt-custom.js"></script>
<!-- dashboard_1-->
<script src="<?= base_url('assets/') ?>admin/js/dashboard/dashboard_1.js"></script>
<!-- custom script -->
<script src="<?= base_url('assets/') ?>admin/js/script.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/vendors/@yaireo/tagify/dist/tagify.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/vendors/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/js/vendors/@yaireo/tagify/dist/intlTelInput.min.js"></script>
<!-- page_select4-->
<script src="<?= base_url('assets/') ?>admin/js/add-product/select4-custom.js"> </script>
<!-- editors-->
<script src="<?= base_url('assets/') ?>admin/js/editors/quill.js"></script>
<!-- editors2-->
<script src="<?= base_url('assets/') ?>admin/js/custom-add-product.js"></script>

</body>

</html>