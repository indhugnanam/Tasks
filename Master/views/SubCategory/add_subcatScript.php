<script type="text/javascript">
    $(document).ready(function() {
        // store subscription details to db
        $("#add_subcategory").formValidation({
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
                url: '<?php echo base_url();?>CAdmin/Submit_SubCategory',
                data:$form.serialize(),                   
                dataType:'json',
                success: function(responce) {
                    if(responce['msg']=='Succusfully Added!'){
                        toastr.success(responce['msg']);
                        window.open("<?php echo base_url();?>CAdmin/SubCategoryList","_self");

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

         // store subscription details to db
        $("#edit_subcategory").formValidation({

            framework: 'bootstrap',
            message: 'This field required',
            excluded: 'disabled',
            fields: {
                prod_name: {
                    validators: {
                        notEmpty: {
                            message: 'Enter product '
                        },
                    }
                },
                 price: {
                    validators: {
                    notEmpty: {
                        message: 'Enter price '
                    },
                    regexp: {
                            regexp: /^[0-9.]+$/,
                            message: 'digit only'
                        }
                    }
                },
                
            }
        })
        .on('success.form.fv', function(e, data) {
            e.preventDefault();
            var $form = $(e.target),
            fv = $form.data('formValidation');
            var formData = new FormData($("#edit_subcategory")[0]);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>CAdmin/update_SubCategory',
                data:new FormData(this),
                mimeType:"multipart/form-data",                    
                contentType: false,
                cache: false,
                processData:false,
                dataType:'json',
                success: function(responce) {
                     
                    if(responce.msg=='Succusfully Updated!'){
                       toastr.success(responce.res_data);
                     window.open("<?php echo base_url();?>CAdmin/SubCategoryList","_self");

                    }else{
                       toastr.error(responce.res_data);
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