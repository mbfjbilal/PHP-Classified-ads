<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function create($post_id)
	{
		$slug = $this->input->post('p_slug');
		$data['post'] = $this->Post_model->get_posts($slug);

		$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('posts/single_view', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Comment_model->create_comment($post_id);
			redirect('posts/'.$slug);
		}
	}

}

/* End of file Comments.php */
/* Location: ./application/controllers/Comments.php */
?>