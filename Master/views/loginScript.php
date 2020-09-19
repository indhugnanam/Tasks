<script type="text/javascript">
 
    $(document).ready(function() {
        // login form
        $("#loginfrm").formValidation({

            framework: 'bootstrap',
            message: 'This field required',
            excluded: 'disabled',
            fields: {
                Mobile: {
                    validators: {
                    notEmpty: {
                        message: 'Enter mobile number '
                    },
                    regexp: {
                            regexp: /^[0-9]{10}$/,
                            message: 'digits only'
                        }
                    },
                }, 
                password:{
                    validators:{
                        notEmpty:{
                            message:"Enter password"
                        },
                        regexp:{
                            regexp:/^[a-zA-Z0-9!@#\$%\^&\*]{6,20}$/,
                            message:"password min length should be 6 "
                        }
                    }
                } , 
            }
        })
        .on('success.form.fv', function(e, data) {
            e.preventDefault();
            var $form = $(e.target),
            fv = $form.data('formValidation');
           
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>CCart/login',
                data:$form.serialize(),                   
                dataType:'json',
                success: function(response) {
                    if(response.status=='success'){
                        toastr.success("Login successfully");
                        window.open('<?php echo base_url();?>CCart/Dashboard','_SELF');
                            
                    }else{
                        toastr.error(response['status']);
                    }
                   
                }
            });
        })
        .on('err.validator.fv', function(e, data) {
            data.element
            .data('fv.messages')
            .find('.help-block[data-fv-for="' + data.field + '"]').hide()
            .filter('[data-fv-validator="' + data.validator + '"]').show();
        });
    });

</script>