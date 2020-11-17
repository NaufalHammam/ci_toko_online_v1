    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/chart.js/Chart.min.js'); ?>"></script>








    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('js/demo/datatables-demo.js'); ?>"></script>







    <script type="text/javascript">
        function belumTersedia() {
            alert("Mohon maaf fitur belum tersedia"); 
        }
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
        function saveConfirm(url){
            $('#btn-save').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>