<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Outdoor Blind Admin Panel</title>
  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url()?>admin-assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="<?=base_url()?>admin-assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <!-- Timeline CSS -->
  <link href="<?=base_url()?>admin-assets/dist/css/timeline.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?=base_url()?>admin-assets/dist/css/sb-admin-2.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="<?=base_url()?>admin-assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="tps://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="tps://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

<link href="<?=base_url()?>admin-assets/editor/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>admin-assets/editor/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>admin-assets/editor/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<!-- Basic formatting for image, video, table, code and quote. -->
<link href="<?=base_url()?>admin-assets/editor/css/froala_content.min.css" rel="stylesheet" type="text/css" />
<!-- CSS rules for styling the block tags such as p, h1, h2, etc. -->
<link href="<?=base_url()?>admin-assets/editor/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.11.0.js"></script>
</head>
      <body>
        <div id="wrapper">
          <!-- Navigation -->
          <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?=base_url()?>index.php/admin">Outdoor Blinds</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
              <!-- /.dropdown -->
              <li class="dropdown">
                <a href="<?=base_url()?>index.php/admin/logout">
                  <i class="fa fa-sign-out fa-fw"></i> 
                </a>
                </li>
              <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                  <li>
                    <a href="<?=base_url()?>index.php/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-file-o fa-fw"></i> Manage Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li>
                        <a href="<?=base_url()?>index.php/admin/pages">Manage Pages</a>
                      </li>
                      <li>
                        <a href="<?=base_url()?>index.php/admin/addpage">Add New Page</a>
                      </li>
                    </ul>
                    <!-- /.nav-second-level -->
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-folder-o fa-fw"></i> Manage Category<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li>
                        <a href="<?=base_url()?>index.php/admin/category">Manage Categories</a>
                      </li>
                      <li>
                        <a href="<?=base_url()?>index.php/admin/addcategory">Add New Category</a>
                      </li>
                    </ul>
                    <!-- /.nav-second-level -->
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-database fa-fw"></i>Manage Products<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <?php $category = $this->common->get_all_category();
                            foreach($category as $cat){
                            ?>
                            <li>
                              <a href="<?=base_url()?>index.php/admin/product/<?=$cat['id']?>"><?=$cat['category']?></a>
                            </li>
                    
                            <?php  
                            }
                       ?>
                      </ul>
                    <!-- /.nav-second-level -->
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-flag-o fa-fw"></i> Manage Promotions<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li>
                        <a href="<?=base_url()?>index.php/admin/promotions">Manage Promotions</a>
                      </li>
                      <li>
                        <a href="<?=base_url()?>index.php/admin/addpromotions">Add New Promotion</a>
                      </li>
                    </ul>
                    <!-- /.nav-second-level -->
                  </li>
                  <li>
                    <a href="<?=base_url()?>index.php/admin/inspiration"><i class="fa fa-lightbulb-o fa-fw"></i> Manage Inspiration</a>
                  </li>
                  <li>
                    <a href="<?=base_url()?>index.php/admin/enquiry"><i class="fa fa-envelope fa-fw"></i> Enquiries</a>
                  </li>
                  <li>
                    <a href="<?=base_url()?>index.php/admin/testimonials"><i class="fa fa-edit fa-fw"></i> Testimonials</a>
                  </li>
                  <li>
                    <a href="<?=base_url()?>index.php/admin/contacts"><i class="fa fa-phone fa-fw"></i> Manage Contacts</a>
                  </li>
                  <li>
                    <a href="<?=base_url()?>index.php/admin/changepass"><i class="fa fa-key fa-fw"></i> Change Password</a>
                  </li>
                                   
                </ul>
              </div>
              <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
          </nav>