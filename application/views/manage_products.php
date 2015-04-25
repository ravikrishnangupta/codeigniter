         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header"><?=$category?> Products</h1>
              <p class="pull-right">
                <a href="<?=base_url()?>index.php/admin/addproduct/<?=$category_id?>">
                <button type="button" class="btn btn-primary">Add New Product</button>
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
                            Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?=$this->session->flashdata('response');?>
                                <?php if(isset($product) && count($product)!=0){ ?>
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
                                        <?php foreach($product as $row){ ?>
                                        <tr valign="top">
                                        <td valign="top"><?=$i?></td>
                                        <td valign="top"><?=$row['title']?></td>
                                        <td valign="top"><?=$row['url']?></td>
                                        
                                        <td align="center" valign="top">
                                            <?php if($row['status']==1) { ?>
                                            <a href="<?=base_url()?>index.php/admin/productstatus/deactive/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-success btn-circle"><i class="fa fa-thumbs-o-up"></i></button>
                                            </a>
                                            <?php } else { ?>
                                            <a href="<?=base_url()?>index.php/admin/productstatus/active/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-thumbs-o-down"></i></button>
                                            </a>
                                            <?php } ?>
                                            <a href="<?=base_url()?>index.php/admin/products/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <a href="<?=base_url()?>index.php/admin/deleteproduct/<?=$row['id']?>" >
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                            </a>
                                        </td>
                                        </tr>
                                        <?php $i++; } ?>
                                        </tbody>
                                </table>
                                <?php } else { ?>
                                <div class="alert alert-danger">Sorry. No Products found.</div>
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