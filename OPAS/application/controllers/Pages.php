<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page = 'home')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page);
		$data['main_categories'] = $this->Home_model->get_categories_by_main_category();
		$data['categories'] = $this->Category_model->get_categories();
		$data['posts'] = $this->Post_model->get_posts();
		$data['count_ads'] = $this->Home_model->categories_ads_count();

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
	}

	//home page search bar
	public function search()
	{
		$this->form_validation->set_rules('category_id', 'Category Name', 'required');
		$this->form_validation->set_rules('search', 'Search for store', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->view($page = 'home');
			// redirect('pages/view');
		} else {

		$category_id = $this->input->post('category_id');
		$keyword = $this->input->post('search');

		$data['categories'] = $this->Category_model->get_categories();
		$data['title'] = $this->Category_model->get_category($category_id)->c_name;
		$data['result'] = $this->Home_model->search_post($category_id,$keyword);
		// $data['count_ads'] = $this->Home_model->categories_ads_count();
		$data['search'] = TRUE;

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('categories/search',$data);
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');

		}
	}
	
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */

 ?>