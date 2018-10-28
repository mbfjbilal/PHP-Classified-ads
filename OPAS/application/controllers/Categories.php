<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function index($offset = 0)
	{
		// pagination config
		$config['base_url'] = base_url() . "categories/index/";
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 9;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination');

		//In it pagination
		$this->pagination->initialize($config);
		
		$data['posts'] = $this->Post_model->get_posts(FALSE, $config['per_page'], $offset);
		$data['categories'] = $this->Category_model->get_categories();
		// showing search div on index page
		$data['search'] = FALSE;

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('categories/search',$data);
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		
		$data['title'] = 'Create Category';
		$data['main_categories'] = $this->Category_model->get_main_categories();

		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('main_category_id', 'Category Belongs To', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('categories/create_view', $data);
			$this->load->view('templates/footer');
		}else {
			$this->Category_model->create_category();
			$this->session->set_flashdata('category_created','Your category has been created.');
			redirect('categories');
		}
	}

	public function create_main()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		
		$data['title'] = 'Create Category';

		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[12]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('categories/create_view', $data);
			$this->load->view('templates/footer');
		}else {
			$this->Category_model->create_main_category();
			$this->session->set_flashdata('category_created','Your category has been created.');
			redirect('categories');
		}
	}

	public function posts($id)
	{
		$data['title'] = $this->Category_model->get_category($id)->c_name;
		$data['posts'] = $this->Post_model->get_posts_by_category($id);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		
		$this->Category_model->delete_category($id);
		$this->session->set_flashdata('category_deleted','Your category has been deleted.');
		redirect('categories');
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */

 ?>