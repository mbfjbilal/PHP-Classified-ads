<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE)
	{
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if ($slug === FALSE) {
			
			$this->db->order_by('posts.p_id', 'desc');
			$this->db->join('categories', 'categories.c_id = posts.p_category_id');
			$query = $this->db->get('posts');
			return $query->result_array();
			
			}

			// $query = $this->db->get_where('posts',array('p_slug'=>$slug));
			// return $query->row_array();
			$this->db->join('users', 'users.u_id = posts.p_user_id');
			$this->db->join('categories', 'categories.c_id = posts.p_id');
			$query = $this->db->get_where('posts',array('p_slug'=>$slug));
			return $query->row_array();

	}

	public function create_post($post_image)
	{
		$slug = url_title(strtolower($this->input->post('title')));

		$data = array(
			'p_title' => $this->input->post('title'),
			'p_slug' => $slug,
			'p_body' => $this->input->post('description'),
			'p_category_id'	=> $this->input->post('category_id'),
			'p_user_id' => $this->session->userdata('user_id'),
			'p_image'	=> $post_image
		);

		return $this->db->insert('posts', $data);
	}

	public function delete_post($id)
	{
				
		// $image_file_name = $this->db->select('p_image')->get_where('posts', array('p_id' => $id))->row()->p_image;
		// $cwd = getcwd(); //save the current working directory
		// $image_file_path = $cwd."\\assets\\images\\products\\";
		// chdir($image_file_path);
		// unlink($image_file_name);
		// chdir($cwd); //restore the previous working directory

		$this->db->where('p_id', $id);
		$this->db->delete('posts');
		return TRUE;
	}

	public function update_post()
	{
		$slug = url_title(strtolower($this->input->post('title')));

		$data = array(
			'p_title' => $this->input->post('title'),
			'p_slug' => $slug,
			'p_body' => $this->input->post('description'),
			'p_category_id'	=> $this->input->post('category_id')
		);

		$this->db->where('p_id', $this->input->post('id'));
		return $this->db->update('posts', $data);
	}

	public function get_categories()
	{
		$this->db->order_by('c_name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	public function get_posts_by_category($category_id)
	{
		$this->db->order_by('p_id', 'desc');
		$this->db->join('categories', 'categories.c_id = posts.p_category_id');
			$query = $this->db->get_where('posts', array('p_category_id' => $category_id));
		return $query->result_array();
	}

}
/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
?>