

    <script src="<?php echo  base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/formvalidation/formValidation.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/toastr.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
	
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": 'fadeIn',
            "hideMethod": "fadeOut"
        }
       
        $(document).ready(function() {
            $('.table').DataTable({
                "pagingType": "full_numbers",
                responsive: true
            }); 
        });
    </script>
    
    </body>
    
</html>