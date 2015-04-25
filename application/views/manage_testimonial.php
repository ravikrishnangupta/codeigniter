         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Manage Testimonials</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
        
        
        <div class="row">
                <?=$this->session->flashdata('response');?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Testimonial
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                <div class="col-lg-12">
                                    <?=form_open('admin/addtestimonial')?>
                                        <div class="form-group">
                                            <label>Author Name</label>
                                            <input class="form-control" name="name" value="<?=set_value('name')?>">
                                            <?=form_error('name')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Website (if Any)</label>
                                            <input class="form-control" name="website" value="<?=set_value('website')?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Testimonial</label>
                                            <textarea class="form-control" rows="5" name="content"><?=set_value('content')?></textarea>
                                            <?=form_error('content')?>
                                        </div>
                                        <button type="submit" class="btn btn-primary">ADD NOW</button>
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




         <div class="row">
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Testimonials Recieved
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php if(isset($testimonial) && count($testimonial)!=0){ ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Website</th>
                                            <th>Testimonial</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($testimonial as $row){ ?>
                                        <tr valign="top">
                                        <td valign="top"><?=$row['author']?></td>
                                        <td valign="top"><?=$row['website']?></td>
                                        <td valign="top"><?=$row['testimonial']?></td>
                                        <td valign="top"><a href="<?=base_url()?>index.php/admin/removetestimonial/<?=$row['id']?>" style="text-decoration: none;">
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                        </a>
                                        </td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                                <?php } else { ?>
                                <div class="alert alert-danger">Sorry. No Testimonial found.</div>
                                <?php } ?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

         </div>