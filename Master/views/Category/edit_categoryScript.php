<script type="text/javascript">
$(document).ready(function() 
{

     // store subscription details to db
        $("#edit_categoryfrm").formValidation({

            framework: 'bootstrap',
            message: 'This field required',
            excluded: 'disabled',
            fields: {
                cat_name: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Category Name '
                        },
                    }
                },

                
            }
        })
		.on('success.form.fv', function(e, data) {
            e.preventDefault();
            var $form = $(e.target),
            fv = $form.data('formValidation');
 		   
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>CAdmin/update_Category',
                data:$form.serialize(),                  
                dataType:'json',
                success: function(responce) {
                    csrf_tokan = responce.csrf['csrfHash'];
                    $("input[name=csrf_test_name]").val(csrf_tokan);

                    if(responce['msg']=='Succusfully Updated!'){
                        toastr.success(responce['msg']);
                        window.open("<?php echo base_url();?>CAdmin/CategoryList","_self");
                    }else{
                       toastr.error(responce['msg']);
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