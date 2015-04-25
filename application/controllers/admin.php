<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
  {
   parent::__construct();
   if(!$this->session->userdata('logged_in')){ redirect('login'); }
 }
 public function index()
 {
  $this->load->view('admin_header');
  $this->load->view('dashboard');
  $this->load->view('admin_footer');
}

public function pages($pageID=0)
{
  $this->load->view('admin_header');
  if($pageID==0){
   $data['pages'] = $this->common->get_all_pages();
   $this->load->view('manage_pages', $data);
 }
 else{
   $data['pages'] = $this->common->get_pages($pageID);
   $this->load->view('edit_page', $data);
 }
 $this->load->view('admin_footer');
}

public function addpage()
{
 
 $this->load->helper(array('form', 'url'));
 $this->load->library('form_validation');
 $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
 $this->form_validation->set_rules('title', 'Page Title', 'required');
 $this->form_validation->set_rules('description', 'Description', 'required');
 $this->form_validation->set_rules('metatitle', 'Page Meta Title', 'required');
 $this->form_validation->set_rules('metakeywords', 'Page Meta Keywords', 'required');
 $this->form_validation->set_rules('metaDescription', 'page Meta Description', 'required');
 if($this->form_validation->run() == FALSE)
 {
  $this->load->view('admin_header');
  $this->load->helper('form');
  $this->load->view('edit_page');
  $this->load->view('admin_footer');
}
else {
  $title = $this->input->post('title');
  $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
  $page_check=$this->common->check_page_url($title_url);
  if($page_check>0){ $title_url .='-'.rand(0,100); }
  $data = array(
    'title' => $title,
    'url' => $title_url,
    'description' => $_REQUEST['description'],
    'metaDescription'=>$_REQUEST['metaDescription'],
    'metaKeywords'=>$_REQUEST['metakeywords'],
    'metaTitle'=>$_REQUEST['metatitle'],
    'status'=>1,
    'type'=>'P',
    'addedOn'=>date('Y-m-d H:i:s'),
    'updatedOn'=>date('Y-m-d H:i:s')
    );
  
  if($this->db->insert('tbl_pages', $data)){
    $this->session->set_flashdata('response', '<div class="alert alert-success">New Page '.$_REQUEST['title'].' Successfully Added</div>');
  }
  else{
    $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Page.</div>');
  }
  redirect('/admin/pages/', 'refresh');
}

}

public function editpage()
{
  
 $this->load->helper(array('form', 'url'));
 $this->load->library('form_validation');
 $id = $this->input->post('id');
 $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
 $this->form_validation->set_rules('title', 'Page Title', 'required');
 $this->form_validation->set_rules('description', 'Description', 'required');
 $this->form_validation->set_rules('metatitle', 'Page Meta Title', 'required');
 $this->form_validation->set_rules('metakeywords', 'Page Meta Keywords', 'required');
 $this->form_validation->set_rules('metaDescription', 'page Meta Description', 'required');
 if($this->form_validation->run() == FALSE)
 {
  $this->load->view('admin_header');
  $data['pages'] = $this->common->get_pages($id);
  $this->load->view('edit_page',$data);
  $this->load->view('admin_footer');
}
else {
  $title = $this->input->post('title');
  $data = array(
    'title' => $title,
    'description' => $_REQUEST['description'],
    'metaDescription'=>$_REQUEST['metaDescription'],
    'metaKeywords'=>$_REQUEST['metakeywords'],
    'metaTitle'=>$_REQUEST['metatitle'],
    'updatedOn'=>date('Y-m-d H:i:s')
    );
  $old_title=$this->common->get_page_data($id,'title');
  $title_url=$this->common->get_page_data($id,'url');
  if($old_title!=$title){
    $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
    $page_check=$this->common->check_page_url($title_url);
    if($page_check>0){ $title_url .='-'.rand(0,100); }
    $data['url'] = $title_url;
  }
  
  $this->db->where('id', $id);
  if($this->db->update('tbl_pages', $data)){
    $this->session->set_flashdata('response', '<div class="alert alert-success">Page Successfully Updated.</div>');
  }
  else{
    $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Update Page.</div>');
  }
  redirect('/admin/pages/'.$id, 'refresh');
}

}


public function promotions($pageID=0)
{
  $this->load->view('admin_header');
  if($pageID==0){
   $data['pages'] = $this->common->get_all_promotions();
   $this->load->view('manage_promotions', $data);
 }
 else{
   $data['pages'] = $this->common->get_promotions($pageID);
   $this->load->view('edit_promotions', $data);
 }
 $this->load->view('admin_footer');
}

public function addpromotions()
{
 
 $this->load->helper(array('form', 'url'));
 $this->load->library('form_validation');
 $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
 $this->form_validation->set_rules('title', 'Promotion Title', 'required');
 $this->form_validation->set_rules('description', 'Description', 'required');
 if(empty($_FILES['image']['name'])){$this->form_validation->set_rules('image', 'Banner image', 'required');}
 $this->form_validation->set_rules('metatitle', 'Promotion Meta Title', 'required');
 $this->form_validation->set_rules('metakeywords', 'Promotion Meta Keywords', 'required');
 $this->form_validation->set_rules('metaDescription', 'Promotion Meta Description', 'required');
 if($this->form_validation->run() == FALSE)
 {
  $this->load->view('admin_header');
  $this->load->helper('form');
  $this->load->view('edit_promotions');
  $this->load->view('admin_footer');
}
else {
  $title = $this->input->post('title');
  $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
  $page_check=$this->common->check_page_url($title_url);
  if($page_check>0){ $title_url .='-'.rand(0,100); }
  $data = array(
    'title' => $title,
    'url' => $title_url,
    'description' => $_REQUEST['description'],
    'metaDescription'=>$_REQUEST['metaDescription'],
    'metaKeywords'=>$_REQUEST['metakeywords'],
    'metaTitle'=>$_REQUEST['metatitle'],
    'status'=>1,
    'type'=>'PR',
    'addedOn'=>date('Y-m-d H:i:s'),
    'updatedOn'=>date('Y-m-d H:i:s')
    );
  if (!empty($_FILES['image']['name'])){
          $config['upload_path'] = './images/promotions';
          $config['allowed_types'] = 'gif|jpg|png';
          $this->load->library('upload', $config);
          $field_name = 'image';
          $this->upload->do_upload($field_name);
          $thumb=$this->upload->data();
          /*$path = './images/category';
          $tconfig['image_library'] = 'gd2';
          $tconfig['create_thumb'] = FALSE;
          $tconfig['maintain_ratio'] = TRUE;
          $tconfig['source_image'] = $thumb['full_path'];
          $tconfig['new_image'] = $path;
          $tconfig['overwrite']    = TRUE;
          $tconfig['width']    = 350;
          $tconfig['height']   = 300;
          $this->load->library('image_lib', $tconfig);
          $this->image_lib->resize();*/
          $data['image']=$thumb['file_name'];
  }
  if($this->db->insert('tbl_pages', $data)){
    $this->session->set_flashdata('response', '<div class="alert alert-success">New Promotion '.$_REQUEST['title'].' Successfully Added</div>');
  }
  else{
    $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Promotion.</div>');
  }
  redirect('/admin/promotions/', 'refresh');
}

}

public function editpromotions()
{
  
 $this->load->helper(array('form', 'url'));
 $this->load->library('form_validation');
 $id = $this->input->post('id');
 $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
 $this->form_validation->set_rules('title', 'Promotion Title', 'required');
 if(empty($_FILES['image']['name'])){$this->form_validation->set_rules('image', 'Banner image', 'required');}
 $this->form_validation->set_rules('description', 'Description', 'required');
 $this->form_validation->set_rules('metatitle', 'Promotion Meta Title', 'required');
 $this->form_validation->set_rules('metakeywords', 'Promotion Meta Keywords', 'required');
 $this->form_validation->set_rules('metaDescription', 'Promotion Meta Description', 'required');
 if($this->form_validation->run() == FALSE)
 {
  $this->load->view('admin_header');
  $data['pages'] = $this->common->get_promotions($id);
  $this->load->view('edit_promotions',$data);
  $this->load->view('admin_footer');
}
else {
  $title = $this->input->post('title');
  $data = array(
    'title' => $title,
    'description' => $_REQUEST['description'],
    'metaDescription'=>$_REQUEST['metaDescription'],
    'metaKeywords'=>$_REQUEST['metakeywords'],
    'metaTitle'=>$_REQUEST['metatitle'],
    'updatedOn'=>date('Y-m-d H:i:s')
    );
  if (!empty($_FILES['image']['name'])){
          $config['upload_path'] = './images/promotions';
          $config['allowed_types'] = 'gif|jpg|png';
          $this->load->library('upload', $config);
          $field_name = 'image';
          $this->upload->do_upload($field_name);
          $thumb=$this->upload->data();
          /*$path = './images/category';
          $tconfig['image_library'] = 'gd2';
          $tconfig['create_thumb'] = FALSE;
          $tconfig['maintain_ratio'] = TRUE;
          $tconfig['source_image'] = $thumb['full_path'];
          $tconfig['new_image'] = $path;
          $tconfig['overwrite']    = TRUE;
          $tconfig['width']    = 350;
          $tconfig['height']   = 300;
          $this->load->library('image_lib', $tconfig);
          $this->image_lib->resize();*/
          $data['image']=$thumb['file_name'];
  }
  $old_title=$this->common->get_page_data($id,'title');
  $title_url=$this->common->get_page_data($id,'url');
  if($old_title!=$title){
    $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
    $page_check=$this->common->check_page_url($title_url);
    if($page_check>0){ $title_url .='-'.rand(0,100); }
    $data['url'] = $title_url;
  }
  
  $this->db->where('id', $id);
  if($this->db->update('tbl_pages', $data)){
    $this->session->set_flashdata('response', '<div class="alert alert-success">Promotion Successfully Updated.</div>');
  }
  else{
    $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Update Promotion.</div>');
  }
  redirect('/admin/promotions/'.$id, 'refresh');
}

}


public function deletepage($id)
{
  $this->db->delete('tbl_pages', array('id' => $id));
  $this->session->set_flashdata('response', '<div class="alert alert-success">Successfully Deleted</div>');
  redirect($_SERVER['HTTP_REFERER']);
}
public function pagestatus($status,$id)
{
  $this->db->where('id', $id);
  $this->db->update('tbl_pages', array('status' => ($status=='active'?$status=1:$status=0)));
  redirect($_SERVER['HTTP_REFERER']);
}






public function category($cat=0)
{
 $this->load->view('admin_header');
 if($cat==0){
   $data['category'] = $this->common->get_all_category();
   $this->load->view('manage_category', $data);
 }
 else{
   $data['category'] = $this->common->get_category($cat);
   $this->load->view('edit_category', $data);
 }
 $this->load->view('admin_footer');
}

public function addcategory()
{
 
 $this->load->helper(array('form', 'url'));
 $this->load->library('form_validation');
 $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
 $this->form_validation->set_rules('title', 'Category Title', 'required');
 $this->form_validation->set_rules('metatitle', 'Category Meta Title', 'required');
 $this->form_validation->set_rules('metakeywords', 'Category Meta Keywords', 'required');
 $this->form_validation->set_rules('metaDescription', 'Category Meta Description', 'required');
 if($this->form_validation->run() == FALSE)
 {
  $this->load->view('admin_header');
  $this->load->helper('form');
  $this->load->view('edit_category');
  $this->load->view('admin_footer');
}
else {
  $title = $this->input->post('title');
  $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
  $page_check=$this->common->check_category_url($title_url);
  if($page_check>0){ $title_url .='-'.rand(0,100); }
  $data = array(
   'category' => $title,
   'url' => $title_url,
   'meta_description'=>$_REQUEST['metaDescription'],
   'meta_keywords'=>$_REQUEST['metakeywords'],
   'meta_title'=>$_REQUEST['metatitle'],
   'status'=>1,
   'added_on'=>date('Y-m-d H:i:s')
   );
  if (!empty($_FILES['image']['name'])){
    $config['upload_path'] = './images/category';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->load->library('upload', $config);
    $field_name = 'image';
    $this->upload->do_upload($field_name);
    $thumb=$this->upload->data();
                            /*$path = './images/category';
                            $tconfig['image_library'] = 'gd2';
                            $tconfig['create_thumb'] = FALSE;
                            $tconfig['maintain_ratio'] = TRUE;
                            $tconfig['source_image'] = $thumb['full_path'];
                            $tconfig['new_image'] = $path;
                            $tconfig['overwrite']    = TRUE;
                            $tconfig['width']    = 350;
                            $tconfig['height']   = 300;
                            $this->load->library('image_lib', $tconfig);
                            $this->image_lib->resize();*/
                            $data['image']=$thumb['file_name'];
                          }
                          if($this->db->insert('tbl_category', $data)){
                            $this->session->set_flashdata('response', '<div class="alert alert-success">New Category '.$_REQUEST['title'].' Successfully Added</div>');
                          }
                          else{
                            $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Category.</div>');
                          }
                          redirect('/admin/category/', 'refresh');
                        }
                        
                      }

                      public function editcategory()
                      {
                        
                       $this->load->helper(array('form', 'url'));
                       $this->load->library('form_validation');
                       $id = $this->input->post('id');
                       $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
                       $this->form_validation->set_rules('title', 'Category Title', 'required');
                       $this->form_validation->set_rules('metatitle', 'Category Meta Title', 'required');
                       $this->form_validation->set_rules('metakeywords', 'Category Meta Keywords', 'required');
                       $this->form_validation->set_rules('metaDescription', 'Category Meta Description', 'required');
                       if($this->form_validation->run() == FALSE)
                       {
                        $this->load->view('admin_header');
                        $data['category'] = $this->common->get_category($id);
                        $this->load->view('edit_category',$data);
                        $this->load->view('admin_footer');
                      }
                      else {
                        $title = $this->input->post('title');
                        $data = array(
                         'category' => $title,
                         'meta_description'=>$_REQUEST['metaDescription'],
                         'meta_keywords'=>$_REQUEST['metakeywords'],
                         'meta_title'=>$_REQUEST['metatitle']
                         );
                        $old_title=$this->common->get_category_data($id,'category');
                        $title_url=$this->common->get_category_data($id,'url');
                        if($old_title!=$title){
                          $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
                          $page_check=$this->common->check_category_url($title_url);
                          if($page_check>0){ $title_url .='-'.rand(0,100); }
                          $data['url'] = $title_url;
                        }
                        if (!empty($_FILES['image']['name'])){
                          $config['upload_path'] = './images/category';
                          $config['allowed_types'] = 'gif|jpg|png';
                          $this->load->library('upload', $config);
                          $field_name = 'image';
                          $this->upload->do_upload($field_name);
                          $thumb=$this->upload->data();
                            /*$path = './images/category';
                            $tconfig['image_library'] = 'gd2';
                            $tconfig['create_thumb'] = FALSE;
                            $tconfig['maintain_ratio'] = TRUE;
                            $tconfig['source_image'] = $thumb['full_path'];
                            $tconfig['new_image'] = $path;
                            $tconfig['overwrite']    = TRUE;
                            $tconfig['width']    = 350;
                            $tconfig['height']   = 300;
                            $this->load->library('image_lib', $tconfig);
                            $this->image_lib->resize();*/
                            $data['image']=$thumb['file_name'];
                          }
                          $this->db->where('id', $id);
                          if($this->db->update('tbl_category', $data)){
                            $this->session->set_flashdata('response', '<div class="alert alert-success">Category Successfully Updated.</div>');
                          }
                          else{
                            $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Update Category.</div>');
                          }
                          redirect('/admin/category/'.$id, 'refresh');
                        }
                        
                      }

                      public function deletecategory($id)
                      {
                        $this->db->delete('tbl_category', array('id' => $id));
                        $this->session->set_flashdata('response', '<div class="alert alert-success">Category Successfully Deleted</div>');
                        redirect('/admin/category/', 'refresh');
                      }
                      public function categorystatus($status,$id)
                      {
                        $this->db->where('id', $id);
                        $this->db->update('tbl_category', array('status' => ($status=='active'?$status=1:$status=0)));
                        redirect('/admin/category/', 'refresh');
                      }

                      public function products($pr_id=0)
                      {
                       $this->load->view('admin_header');
                       if($pr_id==0){
                         $data['product'] = $this->common->get_all_products();
                         $this->load->view('manage_products', $data);
                       }
                       else{
                         $data['product'] = $this->common->get_products($pr_id);
                         $data['features'] = $this->common->get_product_features($pr_id);
                         $this->load->view('edit_product', $data);
                       }
                       $this->load->view('admin_footer');
                     }
                     public function product($cat=0)
                     {
                       $this->load->view('admin_header');
                       $data['category_id']=$cat;
                       $data['product'] = $this->common->get_all_products_by_category($cat);
                       $data['category'] = $this->common->get_category_data($cat,'category');
                       $this->load->view('manage_products', $data);
                       $this->load->view('admin_footer');
                     }

                     public function addproduct($cat=0)
                     {
                       $this->load->helper(array('form', 'url'));
                       $this->load->library('form_validation');
                       $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
                       $this->form_validation->set_rules('title', 'Product Title', 'required');
                       $this->form_validation->set_rules('summary', 'Product summary', 'required');
                       $this->form_validation->set_rules('description', 'Product Description', 'required');
                       $this->form_validation->set_rules('metatitle', 'Product Meta Title', 'required');
                       $this->form_validation->set_rules('metakeywords', 'Product Meta Keywords', 'required');
                       $this->form_validation->set_rules('metaDescription', 'Product Meta Description', 'required');
                       if($this->form_validation->run() == FALSE)
                       {
                        $this->load->view('admin_header');
                        $this->load->helper('form');
                        $data['category_id']=$cat;
                        $this->load->view('edit_product',$data);
                        $this->load->view('admin_footer');
                      }
                      else {
                        $title = $this->input->post('title');
                        $cat = $this->input->post('category_id');
                        $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
                        $page_check=$this->common->check_product_url($title_url);
                        if($page_check>0){ $title_url .='-'.rand(0,100); }
                        $data = array(
                         'title' => $title,
                         'category' => $cat,
                         'url' => $title_url,
                         'summary'=>$_REQUEST['summary'],
                         'description'=>$_REQUEST['description'],
                         'meta_description'=>$_REQUEST['metaDescription'],
                         'meta_keywords'=>$_REQUEST['metakeywords'],
                         'meta_title'=>$_REQUEST['metatitle'],
                         'status'=>1,
                         'added_on'=>date('Y-m-d H:i:s')
                         );
                        
                        if($this->db->insert('tbl_products', $data)){
                          $pr_id=$this->db->insert_id();
                          if (!empty($_FILES['images']['name'])){
                            $this->addimages($pr_id,TRUE);
                          }

                          $features=$this->input->post('features');
                          $f_data=array(
                            'pr_id'=>$pr_id,
                            'status'=>1,
                            'added_on'=>date('Y-m-d H:i:s')
                            );
                          foreach ($features as $f) {
                            if(strlen($f)>0){
                              $f_data['features']=$f;
                              $this->db->insert('tbl_product_features', $f_data);
                            }
                          }
                          $this->session->set_flashdata('response', '<div class="alert alert-success">New Product '.$_REQUEST['title'].' Successfully Added</div>');
                        }
                        else{
                          $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Product.</div>');
                        }
                        redirect('/admin/product/'.$cat, 'refresh');
                      }
                      
                    }

                    public function editproduct()
                    {
                      
                     $this->load->helper(array('form', 'url'));
                     $this->load->library('form_validation');
                     $id = $this->input->post('id');
                     $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
                     $this->form_validation->set_rules('title', 'Product Title', 'required');
                     $this->form_validation->set_rules('description', 'Product Description', 'required');
                     $this->form_validation->set_rules('summary', 'Product summary', 'required');
                     $this->form_validation->set_rules('metatitle', 'Product Meta Title', 'required');
                     $this->form_validation->set_rules('metakeywords', 'Product Meta Keywords', 'required');
                     $this->form_validation->set_rules('metaDescription', 'Product Meta Description', 'required');
                     if($this->form_validation->run() == FALSE)
                     {
                      $this->load->view('admin_header');
                      $data['product'] = $this->common->get_products($id);
                      $data['features'] = $this->common->get_product_features($id);
                      $this->load->view('edit_product',$data);
                      $this->load->view('admin_footer');
                    }
                    else {
                      $title = $this->input->post('title');
                      $data = array(
                       'title' => $title,
                       'summary'=>$_REQUEST['summary'],
                       'description'=>$_REQUEST['description'],
                       'meta_description'=>$_REQUEST['metaDescription'],
                       'meta_keywords'=>$_REQUEST['metakeywords'],
                       'meta_title'=>$_REQUEST['metatitle'],
                       'updated_on'=>date('Y-m-d H:i:s')
                       );
                      $old_title=$this->common->get_product_data($id,'title');
                      $title_url=$this->common->get_product_data($id,'url');
                      if($old_title!=$title){
                        $title_url=str_replace('--','-',str_replace('--','-',strtolower(url_title($title))));
                        $page_check=$this->common->check_product_url($title_url);
                        if($page_check>0){ $title_url .='-'.rand(0,100); }
                        $data['url'] = $title_url;

                      }
                      
                      $this->db->where('id', $id);
                      if($this->db->update('tbl_products', $data)){
                        if (!empty($_FILES['images']['name'])){
                          $this->addimages($id,FALSE);
                        }
                        $this->db->delete('tbl_product_features', array('pr_id' => $id));
                        $features=$this->input->post('features');
                        $f_data=array(
                          'pr_id'=>$id,
                          'status'=>1,
                          'added_on'=>date('Y-m-d H:i:s')
                          );
                        foreach ($features as $f) {
                          if(strlen($f)>0){
                            $f_data['features']=$f;
                            $this->db->insert('tbl_product_features', $f_data);
                          }
                        }

                        $this->session->set_flashdata('response', '<div class="alert alert-success">Product Successfully Updated.</div>');
                      }
                      else{
                        $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Update Product.</div>');
                      }
                      redirect('/admin/products/'.$id, 'refresh');
                    }
                    
                  }
                  
                  public function addimages($pr_id,$featured){

                   if(@$_FILES['images']['name']!=''){
                    $config = array(
                      'upload_path'   => './images/products/',
                      'allowed_types' => 'jpg|gif|png',
                      );                    
                    $this->load->library('upload', $config);
                    $images = array();
                    $i=1;
                    foreach (@$_FILES['images']['name'] as $key => $image) {
                      $_FILES['images[]']['name']= $_FILES['images']['name'][$key];
                      $_FILES['images[]']['type']= $_FILES['images']['type'][$key];
                      $_FILES['images[]']['tmp_name']= $_FILES['images']['tmp_name'][$key];
                      $_FILES['images[]']['error']= $_FILES['images']['error'][$key];
                      $_FILES['images[]']['size']= $_FILES['images']['size'][$key];
                      $fileName = $image;
                      $images[] = $fileName;
                      $config['file_name'] = $fileName;
                      $this->upload->initialize($config);
                      if ($this->upload->do_upload('images[]')) {
                        $file=$this->upload->data();
                        $data = array(
                         'pr_id' => $pr_id,
                         'image' => $file['file_name'],
                         'added_on'=>date('Y-m-d H:i:s')
                         );
                        if($i==1 && $featured==TRUE){$data['featured']=1;}
                        $query=$this->db->insert('tbl_product_images',$data);
                      }
                      $i++;
                    }
                  }
                }

                public function deleteproduct($id)
                {
                  $this->db->delete('tbl_products', array('id' => $id));
                  $this->session->set_flashdata('response', '<div class="alert alert-success">Category Successfully Deleted</div>');
                  redirect($_SERVER['HTTP_REFERER']);
                }
                public function productstatus($status,$id)
                {
                  $this->db->where('id', $id);
                  $this->db->update('tbl_products', array('status' => ($status=='active'?$status=1:$status=0)));
                  redirect($_SERVER['HTTP_REFERER']);
                }
                public function removeimage($id)
                {      
                  $this->db->delete('tbl_product_images', array('id' => $id));
                  $this->session->set_flashdata('response', '<p style="text-align:center;color:red;">Image Successfully Deleted</p>');
                  redirect($_SERVER['HTTP_REFERER']);
                  
                }
                public function featured($pr_id,$id)
                {
                  $this->db->where('pr_id', $pr_id);
                  $this->db->update('tbl_product_images', array('featured' => 0));
                  $this->db->where('id', $id);
                  $this->db->update('tbl_product_images', array('featured' => 1));
                  $this->session->set_flashdata('response', '<p style="text-align:center;color:red;">Image successfully featured.</p>');
                  redirect($_SERVER['HTTP_REFERER']);
                  
                }
                function contacts()
                {
                  $data['contact'] = $this->common->get_contacts();
                  $this->load->view('admin_header');
                  $this->load->helper(array('form'));
                  $this->load->view('manage_contacts',$data);
                  $this->load->view('admin_footer');
                }

                function updatecontact()
                {
                  $this->load->helper(array('form', 'url'));
                  $data = array(
                   'address' => $_REQUEST['address'],
                   'phone' => $_REQUEST['phone'],
                   'facebook' => $_REQUEST['facebook'],
                   'twitter' => $_REQUEST['twitter'],
                   'skype' => $_REQUEST['skype'],
                   'email'=>$_REQUEST['email']
                   );
                  $this->db->where('id','1' );
                  $this->db->update('contact', $data);
                  $this->session->set_flashdata('response', '<div class="alert alert-success">Contact Details Successfully Updated.</div>');
                  redirect('admin/contacts', 'refresh');
                }

                function Enquiry()

                {
                 $this->load->view('admin_header');
                 $this->load->helper(array('form'));
                 $data['enquiry'] = $this->common->get_enquiry();
                 $this->load->view('manage_enquiry',$data);
                 $this->load->view('admin_footer');
               }

               function removeenquiry($id)

               {

                 $this->db->delete('enquiry', array('id' => $id));
                 $this->session->set_flashdata('response', '<div class="alert alert-success">Enquiry Successfully Removed</div>');
                 redirect('/admin/enquiry/', 'refresh');

               }

               function testimonials()
               {
                $session_data = $this->session->userdata('logged_in');
                $this->load->view('admin_header');
                $this->load->helper(array('form'));
                $data['testimonial'] = $this->common->get_testimonial();
                $this->load->view('manage_testimonial',$data);
                $this->load->view('admin_footer');
                
              }
              function addtestimonial(){
               $this->load->helper(array('form', 'url'));
               $this->load->library('form_validation');
               $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
               $this->form_validation->set_rules('name', 'Author name', 'required');
               $this->form_validation->set_rules('content', 'Testimonial', 'required');
               if($this->form_validation->run() == FALSE)
               {
                $this->load->view('admin_header');
                $this->load->helper(array('form'));
                $data['testimonial'] = $this->common->get_testimonial();
                $this->load->view('manage_testimonial',$data);
                $this->load->view('admin_footer');
              }
              else {
               $this->load->helper(array('form', 'url'));
               $author = $this->input->post('name');
               $website = $this->input->post('website');
               $tes = $this->input->post('content');
               $data = array(
                 'author' => $author,
                 'testimonial' => $tes,
                 'website' => $website,
                 'status'=>1
                 );
               $this->db->insert('testimonial', $data);
               $this->session->set_flashdata('response', '<div class="alert alert-success">Testimonial Successfully Added.</div>');
               redirect('/admin/testimonials/', 'refresh');
             }
           }

           function removetestimonial($id)
           {
             $this->db->delete('testimonial', array('id' => $id));
             $this->session->set_flashdata('response', '<div class="alert alert-danger">Testimonial Successfully Deleted</div>');
             redirect('/admin/testimonials/', 'refresh');
           }
           function inspiration()
           {
            $this->load->view('admin_header');
            $this->load->helper(array('form'));
            $data['inspiration'] = $this->common->get_all_inspiration();
            $this->load->view('manage_inspiration',$data);
            $this->load->view('admin_footer');
          }

          function addinspiration()
          {
           $this->load->helper(array('form', 'url'));
           $this->load->library('form_validation');
           $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
           $this->form_validation->set_rules('url', 'Banner URL', 'required');
           if (empty($_FILES['image']['name'])){$this->form_validation->set_rules('image', 'Banner image', 'required');
         }
         if($this->form_validation->run() == FALSE)
         {
          $this->load->view('admin_header');
          $this->load->helper('form');
          $data['inspiration'] = $this->common->get_all_inspiration();
          $this->load->view('manage_inspiration',$data);
          $this->load->view('admin_footer');
        }
        else {
          
          if (!empty($_FILES['image']['name'])){
            $config['upload_path'] = './images/inspiration';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $field_name = 'image';
            $this->upload->do_upload($field_name);
            $thumb=$this->upload->data();
                            /*$path = './images/category';
                            $tconfig['image_library'] = 'gd2';
                            $tconfig['create_thumb'] = FALSE;
                            $tconfig['maintain_ratio'] = TRUE;
                            $tconfig['source_image'] = $thumb['full_path'];
                            $tconfig['new_image'] = $path;
                            $tconfig['overwrite']    = TRUE;
                            $tconfig['width']    = 350;
                            $tconfig['height']   = 300;
                            $this->load->library('image_lib', $tconfig);
                            $this->image_lib->resize();*/
                            $data['image']=$thumb['file_name'];
                            $data['url']=$_REQUEST['url'];
                            $data['added_on']=date('Y-m-d H:i:s');
                          }
                          if($this->db->insert('tbl_inspiration', $data)){
                            $this->session->set_flashdata('response', '<div class="alert alert-success">New Inspiration Banner Successfully Added</div>');
                          }
                          else{
                            $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Inspiration Banner.</div>');
                          }
                          redirect('/admin/inspiration/', 'refresh');
                        }

                      }
                      function removeinspiration($file,$id)
                      {
                       unlink('./images/inspiration/'.$file);
                       $this->db->delete('tbl_inspiration', array('id' => $id));
                       $this->session->set_flashdata('response', '<div class="alert alert-danger">Inspiration Banner Successfully Deleted</div>');
                       redirect('/admin/inspiration/', 'refresh');
                     }


                     function changePass()

                     {
                       $session_data = $this->session->userdata('logged_in');
                       $data['username'] = $session_data['username'];
                       $this->load->helper(array('form'));
                       $this->load->view('admin_header');
                       $this->load->view('change_password');
                       $this->load->view('admin_footer');
                     }

                     public function logout()
                     {
                      $this->session->unset_userdata('logged_in');
                      redirect('/', 'refresh');
                    }
                  }
