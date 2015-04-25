         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Add/Edit Product</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
                <?=$this->session->flashdata('response');?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add/Edit Product Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php if(isset($product) && count($product)>0){ $row=$product[0]; ?>
                                    <div class="col-lg-12">
                                    <?=form_open_multipart('admin/editproduct')?>
                                        <div class="form-group">
                                            <label>Product Title</label>
                                            <input class="form-control" type="text" name="title" placeholder="Page Title" value="<?=$row['title']?>">
                                            <?=form_error('title')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Summary</label>
                                            <textarea class="form-control" name="summary" placeholder="Summary"> <?=$row['summary']?></textarea>
                                            <?=form_error('summary')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" name="description" id="content" placeholder="Description"> <?=$row['description']?></textarea>
                                            <?=form_error('description')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Images</label>
                                            <input type="file" class="form-control" name="images[]" multiple>
                                            <?=form_error('images')?>
                                            <?php 
                                            $images=$this->common->get_product_images($row['id']);
                                            foreach ($images as $i) {
                                                if($i['featured']==1){ ?>
                                                <img src="<?=base_url()?>images/products/<?=$i['image']?>" height="60" style="margin:10px;border:2px solid green" />     
                                                <?php } else { ?>
                                                <a href="<?=base_url()?>index.php/admin/featured/<?=$row['id']?>/<?=$i['id']?>">
                                                <img src="<?=base_url()?>images/products/<?=$i['image']?>" height="60" style="margin:10px;border:2px solid #fff" />     
                                                </a>
                                                <a href="<?=base_url()?>index.php/admin/removeimage/<?=$i['id']?>">
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                                </a>
                                                <?php } ?>   
                                                <?php } ?>
                                            </div>
                                        <div class="form-group" id="feature_group">
                                            <label>Product Features <a href="javascript:void(0)" onclick="clone()">Add More</a></label>
                                            <?php $i=2; if(count($features)>0){foreach($features as $f){ ?>
                                            <input class="form-control" id="feature<?=$i?>" type="text" name="features[]" placeholder="Product Feature" value="<?=$f['features']?>" style="margin-bottom:10px;">
                                            <!-- <a href="javascript:void(0)" onclick="this.remove();$('#feature<?=$i?>').remove()">X</a> -->
                                            <?php $i++; } } ?>
                                            <input class="form-control" id="feature1" type="text" name="features[]" placeholder="Product Feature" style="margin-bottom:10px;">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" type="text" name="metatitle" placeholder="Page Meta Title" value="<?=$row['meta_title']?>">
                                            <?=form_error('metatitle')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control" name="metakeywords" placeholder="Page Meta Keywords" value="<?=$row['meta_keywords']; ?>">
                                            <?=form_error('metakeywords')?>
                                            </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <input type="text" class="form-control" name="metaDescription" placeholder="Page Meta Description" value="<?=$row['meta_description']?>">
                                            <?=form_error('metaDescription')?>
                                        </div>
                                        <input type="hidden" name="id" value="<?=$row['id']?>"/>
                                        <button type="submit" class="btn btn-primary">Update Page</button>
                                    <?=form_close()?>
                                </div>
                                <?php } else { ?>
                                <div class="col-lg-12">
                                    <?=form_open_multipart('admin/addproduct/'.$category_id)?>
                                        <div class="form-group">
                                            <label>Product Title</label>
                                            <input class="form-control" type="text" name="title" placeholder="Page Title" value="<?=set_value('title'); ?>">
                                            <?=form_error('title')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Summary</label>
                                            <textarea class="form-control" name="summary" placeholder="Summary"> <?=set_value('summary')?></textarea>
                                            <?=form_error('summary')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" name="description" id="content" placeholder="Description"> <?=set_value('description'); ?></textarea>
                                            <?=form_error('description')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Images</label>
                                            <input type="file" class="form-control" name="images[]" multiple>
                                            <?=form_error('images')?>
                                        </div>
                                        <div class="form-group" id="feature_group">
                                            <label>Product Features <a href="javascript:void(0)" onclick="clone()">Add More</a></label>
                                            <input class="form-control" id="feature1" type="text" name="features[]" placeholder="Product Feature" value="<?=set_value('feature[]')?>" style="margin-bottom:10px;">
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
                                        <input type="hidden" name="category_id" value="<?=$category_id?>"/>
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
  <script>
  $( window ).load(function() {
    $(".froala-wrapper").next().remove();
});
</script>

<script type="text/javascript">
function clone(){
var input = $('input[id^="feature"]:last');

var num = parseInt( input.prop("id").match(/\d+/g), 10 ) +1;

// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
var feature = input.clone().prop('id', 'feature'+num ).val('');
var remove = '<a href="javascript:void(0)" onclick="this.remove();$(\'#feature'+num+'\').remove()">X</a>'
$('#feature_group').append(feature);
//$('#feature_group').append(remove);
}

</script>