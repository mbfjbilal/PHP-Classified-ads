<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function create_comment($post_id)
	{
		$data = array(
			'comment_post_id' => $post_id,
			'comment_name'	  => $this->input->post('name'),
			'comment_email'	  => $this->input->post('email'),
			'comment_message' => $this->input->post('message')
		);

		return $this->db->insert('comments', $data);
	}

	public function get_comments($post_id)
	{
		$this->db->order_by('comment_id', 'desc');
		$query = $this->db->get_where('comments', array('comment_post_id' => $post_id));
		return $query->result_array();
	}

}

/* End of file comment_model.php */
/* Location: ./application/models/comment_model.php */
?>