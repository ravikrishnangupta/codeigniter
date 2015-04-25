         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Add New Category</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
                <?=$this->session->flashdata('response');?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add/Edit Category Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                
                                <?php if(isset($category) && count($category)>0){ $row=$category[0]; ?>
                                    <div class="col-lg-12">
                                    <?=form_open_multipart('admin/editcategory')?>
                                        <div class="form-group">
                                            <label>Category Title</label>
                                            <input class="form-control" type="text" name="title" placeholder="Category Title" value="<?=$row['category']?>">
                                            <?=form_error('title')?>
                                        </div>
                                        <div class="form-group" style="text-align:center;">
                                            <label>Category Image</label>
                                            <input class="form-control" type="file" name="image">
                                            <img src="<?=base_url()?>images/category/<?=$row['image']?>" width="350" style="margin:10px;"/>
                                            <?=form_error('image')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" type="text" name="metatitle" placeholder="Category Meta Title" value="<?=$row['meta_title']?>">
                                            <?=form_error('metatitle')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control" name="metakeywords" placeholder="Category Meta Keywords" value="<?=$row['meta_keywords']; ?>">
                                            <?=form_error('metakeywords')?>
                                            </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <input type="text" class="form-control" name="metaDescription" placeholder="Category Meta Description" value="<?=$row['meta_description']?>">
                                            <?=form_error('metaDescription')?>
                                        </div>
                                        <input type="hidden" name="id" value="<?=$row['id']?>"/>
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                    <?=form_close()?>
                                </div>
                                <?php } else { ?>
                                <div class="col-lg-12">
                                    <?=form_open_multipart('admin/addcategory')?>
                                        <div class="form-group">
                                            <label>Category Title</label>
                                            <input class="form-control" type="text" name="title" placeholder="Category Title" value="<?=set_value('title'); ?>">
                                            <?=form_error('title')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Image</label>
                                            <input class="form-control" type="file" name="image">
                                            <?=form_error('image')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" type="text" name="metatitle" placeholder="Category Meta Title" value="<?=set_value('metatitle'); ?>">
                                            <?=form_error('metatitle')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control" name="metakeywords" placeholder="Category Meta Keywords" value="<?=set_value('metakeywords'); ?>">
                                            <?=form_error('metakeywords')?>
                                            </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <input type="text" class="form-control" name="metaDescription" placeholder="Category Meta Description" value="<?=set_value('metaDescription'); ?>">
                                            <?=form_error('metaDescription')?>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                    <?=form_close()?>
                                </div>
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
        <script type="text/javascript" src="<?=base_url()?>admin-assets/js/ckeditor/ckeditor.js"></script>

<script type="text/javascript">

 CKEDITOR.replace('content');

</script>