<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function index($offset = 0)
	{
		// pagination config
		$config['base_url'] = base_url() . "posts/index/";
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination');

		//In it pagination
		$this->pagination->initialize($config);
		
		$data['title'] = 'Latest Ads';
		$data['posts'] = $this->Post_model->get_posts(FALSE, $config['per_page'], $offset);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		$data['post'] = $this->Post_model->get_posts($slug);
		$post_id = $data['post']['p_id'];
		$data['comments'] = $this->Comment_model->get_comments($post_id);

		if (empty($data['post'])) {
			show_404();
		}

		$data['title'] = $data['post']['p_title'];

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('posts/single_view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		
		$data['title'] = 'Create Ad';

		$data['categories'] = $this->Post_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[12]');

		$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[5]');

		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		}else {
			//upload image
			$config['upload_path'] 		= './assets/images/products';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '2000';
			$config['max_height'] 		= '2000';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			}else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->Post_model->create_post($post_image);
			//set message 
			$this->session->set_flashdata('post_created','Your post has been created.');
			redirect('posts');
		}

	
	}


	public function delete($id)
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->Post_model->delete_post($id);
		$this->session->set_flashdata('post_deleted','Your post has been deleted.');
		redirect('posts');
	}


	public function edit($slug)
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		
		$data['post'] = $this->Post_model->get_posts($slug);

		//check user
		if($this->session->userdata('user_id') != $this->Post_model->get_posts($slug)['p_user_id']){
			redirect('posts');
		}

		if (empty($data['post'])) {
			show_404();
		}

		$data['title'] = 'Edit Post';

		$data['categories'] = $this->Post_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[12]');

		$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[5]');

		if ($this->form_validation->run() === FALSE) {
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('posts/edit_view', $data);
		$this->load->view('templates/footer');
		}else {
			die();
		}
	}

	public function update()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		
		$this->Post_model->update_post();
		$this->session->set_flashdata('post_updated','Your post has been updated.');
		redirect('posts');
	}

}

/* End of file Posts.php */
/* Location: ./application/controllers/Posts.php */

 ?>