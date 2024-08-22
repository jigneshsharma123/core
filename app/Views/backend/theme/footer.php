        <div class="modal fade" id="MediaLibraryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 id="MediaLibraryModal-title"></h3>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="CustomFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 id="CustomFormModal-title"></h3>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>assets/admin/js/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/admin/js/custom.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.nestable.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/select2.full.min.js"></script>
      <script>
      $(document).ready(function() {
        $(".select2_multiple").select2({
          allowClear: true
        });
      });
    </script>
    <script src="<?php echo base_url() ?>assets/admin/js/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/datepicker/daterangepicker.js"></script>
  </body>
</html>
