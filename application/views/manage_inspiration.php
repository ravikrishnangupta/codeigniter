         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Manage Inspiration Banners</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
        
        
        <div class="row">
                <?=$this->session->flashdata('response');?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Inspiration Banner
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                <div class="col-lg-12">
                                    <?=form_open_multipart('admin/addinspiration')?>
                                        <div class="form-group">
                                            <label>Inspiration Banner</label>
                                            <input class="form-control" type="file" name="image">
                                            <?=form_error('image')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Inspiration Banner URL</label>
                                            <input class="form-control" name="url" value="<?=set_value('url')?>">
                                            <?=form_error('url')?>
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
                                <?php if(isset($inspiration) && count($inspiration)!=0){ ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Url</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($inspiration as $row){ ?>
                                        <tr valign="top">
                                        <td valign="top" align="center"><img src="<?=base_url()?>images/inspiration/<?=$row['image']?>" height="100" /></td>
                                        <td valign="top"><a href="<?=$row['url']?>" target="_blank"><?=$row['url']?></a></td>
                                        <td valign="top"><a href="<?=base_url()?>index.php/admin/removeinspiration/<?=$row['image']?>/<?=$row['id']?>" style="text-decoration: none;">
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                        </a>
                                        </td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                                <?php } else { ?>
                                <div class="alert alert-danger">Sorry. No Inspirations found.</div>
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