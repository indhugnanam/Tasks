<script type="text/javascript">
$(document).ready(function() 
{
     // store subscription details to db
        $("#product").formValidation({

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
 		    var formData = new FormData($("#product")[0]);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>CAdmin/Submit_Product',
                data:new FormData(this),
                mimeType:"multipart/form-data",                    
                contentType: false,
                cache: false,
                processData:false,
                dataType:'json',
                success: function(responce) {
                    if(responce.msg=='success'){
                       toastr.success(responce.res_data);
                     window.open("<?php echo base_url();?>CAdmin/ProductList","_self");

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

        // store subscription details to db
        $("#edit_prod").formValidation({

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
            var formData = new FormData($("#product")[0]);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>CAdmin/update_product',
                data:new FormData(this),
                mimeType:"multipart/form-data",                    
                contentType: false,
                cache: false,
                processData:false,
                dataType:'json',
                success: function(responce) {
                    if(responce.msg=='success'){
                       toastr.success(responce.res_data);
                     window.open("<?php echo base_url();?>CAdmin/ProductList","_self");

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

        $(document).on('change','.cat_id',function(){
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>CAdmin/list_subcategory',
                data:{'Cat_id':$(this).val()},                   
                dataType:'json',
                success: function(responce) {

                    $('.sub_id option').remove('');
                    $('.sub_id').append('<option value="">Select Category</option>');

                    if(responce['msg']=='success'){

                        $.each(responce['data'],function(key,val){

                            $('.sub_id').append('<option value="'+val['Sub_Id']+'">'+val['Sub_Name']+'</option>');
                        });
                    }else{
                       toastr.error(responce['msg']);
                    }
                }
            });

        });
   
});

</script>