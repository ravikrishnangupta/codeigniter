         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Manage Contacts Details</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
                <?=$this->session->flashdata('response');?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Website Contacts Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <?php if(isset($contact)){
                                  foreach($contact as $row){
                              ?>
                                <div class="col-lg-12">
                                    <?=form_open('admin/updatecontact')?>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" value="<?=$row['address']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" name="phone" value="<?=$row['phone']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?=$row['email']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input class="form-control" name="facebook" value="<?=$row['facebook']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Skype</label>
                                            <input class="form-control" name="skype" value="<?=$row['skype']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input class="form-control" name="twitter" value="<?=$row['twitter']?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    <?=form_close()?>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
          <!-- /.row -->
        </div>