         <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Manage Enquiries</h1>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
         <div class="row">
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enquiries Recieved
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?=$this->session->flashdata('response');?>
                                <?php if(isset($enquiry) && count($enquiry)!=0){ ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Recieved at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($enquiry as $row){ ?>
                                        <tr valign="top">
                                        <td valign="top"><?=$row['name']?></td>
                                        <td valign="top"><?=$row['phone']?></td>
                                        <td valign="top"><a href="mailto:<?=$row['email']?>"><?=$row['email']?></a></td>
                                        <td valign="top" width="30%"><?=$row['message']?></td>
                                        <td align="center" valign="top"><?=date('d-M-Y',strtotime($row['added_on']))?></td>
                                        <td align="center" valign="top"><a href="<?=base_url()?>index.php/admin/removeenquiry/<?=$row['id']?>" style="text-decoration: none;">
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                        </a></td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                                <?php } else { ?>
                                <div class="alert alert-danger">Sorry. No enquiries found.</div>
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