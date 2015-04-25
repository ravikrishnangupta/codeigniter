         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Add/Edit New Page</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
                <?=$this->session->flashdata('response');?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add/Edit Page Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                
                                <?php if(isset($pages) && count($pages)>0){ $row=$pages[0]; ?>
                                    <div class="col-lg-12">
                                    <?=form_open('admin/editpage')?>
                                        <div class="form-group">
                                            <label>Page Title</label>
                                            <input class="form-control" type="text" name="title" placeholder="Page Title" value="<?=$row['title']?>">
                                            <?=form_error('title')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Description</label>
                                            <textarea class="form-control" name="description" id="content" placeholder="Description"> <?=$row['description']?></textarea>
                                            <?=form_error('description')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" type="text" name="metatitle" placeholder="Page Meta Title" value="<?=$row['metaTitle']?>">
                                            <?=form_error('metatitle')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control" name="metakeywords" placeholder="Page Meta Keywords" value="<?=$row['metaKeywords']; ?>">
                                            <?=form_error('metakeywords')?>
                                            </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <input type="text" class="form-control" name="metaDescription" placeholder="Page Meta Description" value="<?=$row['metaDescription']?>">
                                            <?=form_error('metaDescription')?>
                                        </div>
                                        <input type="hidden" name="id" value="<?=$row['id']?>"/>
                                        <button type="submit" class="btn btn-primary">Update Page</button>
                                    <?=form_close()?>
                                </div>
                                <?php } else { ?>
                                <div class="col-lg-12">
                                    <?=form_open('admin/addpage')?>
                                        <div class="form-group">
                                            <label>Page Title</label>
                                            <input class="form-control" type="text" name="title" placeholder="Page Title" value="<?=set_value('title'); ?>">
                                            <?=form_error('title')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Description</label>
                                            <textarea class="form-control" name="description" rows="30" id="content" placeholder="Description"> <?=set_value('description'); ?></textarea>
                                            <?=form_error('description')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" type="text" name="metatitle" placeholder="Page Meta Title" value="<?=set_value('metatitle'); ?>">
                                            <?=form_error('metatitle')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control" name="metakeywords" placeholder="Page Meta Keywords" value="<?=set_value('metakeywords'); ?>">
                                            <?=form_error('metakeywords')?>
                                            </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <input type="text" class="form-control" name="metaDescription" placeholder="Page Meta Description" value="<?=set_value('metaDescription'); ?>">
                                            <?=form_error('metaDescription')?>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Page</button>
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

<!--script type="text/javascript" src="<?=base_url()?>admin-assets/js/ckeditor/ckeditor.js"></script-->
<!--script type="text/javascript">
 /*CKEDITOR.replace('content');*/
</script-->

<script src="<?=base_url()?>admin-assets/editor/js/froala_editor.min.js"></script>
<script>
      $(function() {
          $('#content').editable({inlineMode: false,imageUploadURL: '<?=base_url()?>index.php/uploadimage',imageUploadParams: {id: "content"}})
      });
  </script>
  <script>
  $( window ).load(function() {
  	$(".froala-wrapper").next().remove();
});
</script>