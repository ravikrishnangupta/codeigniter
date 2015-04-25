         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Change Admin Panel Password</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
                <?=$this->session->flashdata('response');?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill Password Fields to change the Admin Panel Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo form_open('changepassword'); ?>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" type="password" id="password" placeholder="New Password" name="password">
                                            <?=form_error('password')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" id="cpassowrd" placeholder="Confirm Password" name="cpassword">
                                            <?=form_error('cpassword')?>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    <?=form_close()?>
                                </div>
                                
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

         </div>