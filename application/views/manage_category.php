         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Manage Category</h1>
              <p class="pull-right">
                <a href="<?=base_url()?>index.php/admin/addcategory">
                <button type="button" class="btn btn-primary">Add New Category</button>
                </a>
            </p>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
         <div class="row">
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Categories
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?=$this->session->flashdata('response');?>
                                <?php if(isset($category) && count($category)!=0){ ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                        <th width="5%">S.No.</th>                      

                                        <th width="30%">Title</th>                      

                                        <th width="30%">URL Link</th>                       

                                        <th width="15%">&nbsp;</th>                    

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($category as $row){ ?>
                                        <tr valign="top">
                                        <td valign="top"><?=$i?></td>
                                        <td valign="top"><?=$row['category']?></td>
                                        <td valign="top"><?=$row['url']?></td>
                                        
                                        <td align="center" valign="top">
                                            <?php /* if($row['status']==1) { ?>
                                            <a href="<?=base_url()?>index.php/admin/categorystatus/deactive/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-success btn-circle"><i class="fa fa-thumbs-o-up"></i></button>
                                            </a>
                                            <?php } else { ?>
                                            <a href="<?=base_url()?>index.php/admin/categorystatus/active/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-thumbs-o-down"></i></button>
                                            </a>
                                            <?php } */ ?>
                                            <a href="<?=base_url()?>index.php/admin/category/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <!-- <a href="<?=base_url()?>index.php/admin/deletecategory/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                            </a> -->
                                        </td>
                                        </tr>
                                        <?php $i++; } ?>
                                        </tbody>
                                </table>
                                <?php } else { ?>
                                <div class="alert alert-danger">Sorry. No Categories found.</div>
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