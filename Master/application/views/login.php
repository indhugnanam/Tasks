
<section class="contdainer">
    <div class="col-xs-12 row">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="col-xs-12 modal-content mt-1 pt-3">

                <!-- admin/seller login -->
                <div class="modal-body col-xs-12 mi-user-frmdata mi-user-login">
                    <h3 class="text-center my-2 ">Sign In </h3>
                    <?php echo form_open('', array('method'=>'post','id'=>"loginfrm"));?>
                        <div class="col-xs-12 form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="Mobile" required>
                        </div>
                        <div class="col-xs-12 form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button type="submit" class="mi-btn-submit">Sign In</button>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>