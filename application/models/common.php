<?phpclass Common extends CI_Model {	function get_pages($id=0){		if($id==0){			$this->db->order_by("title", "ASC");			$query=$this->db->get_where('tbl_pages',array('status'=>1,'type'=>'P'));			return $query->result_array();		}		else {			$query=$this->db->get_where('tbl_pages',array('id'=>$id));			return $query->result_array();		}	}	function get_all_pages(){		$this->db->order_by("title", "ASC");		$query=$this->db->get_where('tbl_pages',array('type'=>'P'));		return $query->result_array();	}	function get_promotions($id=0){		if($id==0){			$this->db->order_by("title", "ASC");			$query=$this->db->get_where('tbl_pages',array('status'=>1,'type'=>'PR'));			return $query->result_array();		}		else {			$query=$this->db->get_where('tbl_pages',array('id'=>$id));			return $query->result_array();		}	}	function get_all_promotions(){		$this->db->order_by("title", "ASC");		$query=$this->db->get_where('tbl_pages',array('type'=>'PR'));		return $query->result_array();	}	function get_category($id=0){		if($id==0){			$this->db->order_by("category", "ASC");			$query=$this->db->get_where('tbl_category',array('status'=>1));			return $query->result_array();		}		else {			$query=$this->db->get_where('tbl_category',array('id'=>$id));			return $query->result_array();		}	}	function get_category_data($id,$column){		$this->db->select($column);		$this->db->limit(1);		$query=$this->db->get_where('tbl_category',array('id'=>$id));		$data=$query->result_array();		return $data[0][$column];	}	function get_all_category(){		$this->db->order_by("category", "ASC");		$query=$this->db->get('tbl_category');		return $query->result_array();	}	function check_category_url($url){		$query=$this->db->get_where('tbl_category',array('url'=>$url));		return $query->num_rows();	}	function check_page_url($url){		$query=$this->db->get_where('tbl_pages',array('url'=>$url));		return $query->num_rows();	}	function get_contact_data($column){		$query=$this->db->get_where('contact',array('id'=>1));		$data=$query->result_array();		return $data[0][$column];	}	function get_page_data($id,$column){		$this->db->select($column);		$this->db->limit(1);		$query=$this->db->get_where('tbl_pages',array('id'=>$id));		$data=$query->result_array();		return $data[0][$column];	}	function get_contacts(){		$query=$this->db->get_where('contact',array('id'=>1));		return $query->result_array();	}	function get_enquiry(){		$query=$this->db->order_by("id", "ASC");		$query=$this->db->get('enquiry');		return $query->result_array();	}	function get_testimonial(){		$query=$this->db->get_where('testimonial',array('status'=>1));		return $query->result_array();	}	function get_inspiration(){		$query=$this->db->get_where('tbl_inspiration',array('status'=>1));		return $query->result_array();	}	function get_all_inspiration(){		$query=$this->db->get('tbl_inspiration');		return $query->result_array();	}	function get_products($id=0){		if($id==0){			$this->db->order_by("title", "ASC");			$query=$this->db->get_where('tbl_products',array('status'=>1));			return $query->result_array();		}		else {			$query=$this->db->get_where('tbl_products',array('id'=>$id));			return $query->result_array();		}	}	function get_product_data($id,$column){		$this->db->select($column);		$this->db->limit(1);		$query=$this->db->get_where('tbl_products',array('id'=>$id));		$data=$query->result_array();		return $data[0][$column];	}	function get_product_features($pr_id){		$this->db->select('features');		$query=$this->db->get_where('tbl_product_features',array('pr_id'=>$pr_id));		$data=$query->result_array();		return $data;	}	function get_product_images($pr_id){		$query=$this->db->get_where('tbl_product_images',array('pr_id'=>$pr_id));		$data=$query->result_array();		return $data;	}	function get_all_products(){		$this->db->order_by("title", "ASC");		$query=$this->db->get('tbl_products');		return $query->result_array();	}	function get_all_products_by_category($cat){		$this->db->order_by("title", "ASC");		$query=$this->db->get_where('tbl_products',array('category'=>$cat));		return $query->result_array();	}	function check_product_url($url){		$query=$this->db->get_where('tbl_products',array('url'=>$url));		return $query->num_rows();	}}?>