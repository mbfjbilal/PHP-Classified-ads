<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function create_category()
	{
		$data = array(
			'c_name' => $this->input->post('name'),
			'c_user_id' => $this->session->userdata('user_id'),
			'c_belongs_to' => $this->input->post('main_category_id')
		);

		return $this->db->insert('categories', $data);
	}

	public function create_main_category()
	{
		$data = array(
			'm_c_name' => $this->input->post('name')
		);

		return $this->db->insert('main_category', $data);
	}	

	public function get_categories()
	{
		$this->db->order_by('c_name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	public function get_category($id)
	{
		$query = $this->db->get_where('categories', array('c_id' => $id));
		return $query->row();
	}

	public function get_main_categories()
	{
		$this->db->order_by('m_c_name');
		$query = $this->db->get('main_category');
		return $query->result_array();
	}

	public function delete_category($id)
	{
		$this->db->where('c_id', $id);
		$this->db->delete('categories');
		return TRUE;
	}


}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */
?>