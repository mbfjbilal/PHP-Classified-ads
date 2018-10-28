<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function search_post($category_id,$keyword)
	{
		if (!empty($keyword)) {
		$this->db->like('p_category_id', $category_id)->or_like('p_title',$keyword);
		$this->db->join('categories', 'categories.c_id = posts.p_category_id');
		$query = $this->db->get('posts');

		$result = array(
			'query' => $query->result_array(),
			'count' => $query->num_rows()
		);

		return $result;

		} else {
			die('Error:Searching error');
		}
		
	}

	// public function get_posts()
	// {
	// 	$this->db->order_by('p_id', 'desc');
	// 	$query = $this->db->get('posts', 3);
	// 	return $query->result_array();
	// }

	public function get_categories_by_main_category()
	{
		$get_main_category_query = $this->db->get('main_category');
		$data['main_categories'] = $get_main_category_query->result_array();

		foreach ($data['main_categories'] as $key=> $row) {
					
				$child_cat = $this->db->where('c_belongs_to' , $row['m_c_id'])->get('categories');
 				$child_cat = $child_cat->result_array();
 				$data['main_categories'][$key]['categories'] = $child_cat;
				}
			return $data['main_categories'];
			exit;	
	}

	public function categories_ads_count()
	{
		$get_category_query = $this->db->get('categories');
		$data['categories'] = $get_category_query->result_array();

		foreach ($data['categories'] as $key=> $row) {
					
			$this->db->where('p_category_id' , $row['c_id']);
			$this->db->from('posts');
			$count_ads = $this->db->count_all_results();
 			// $count_ads = $count_ads->count_all_results();
 			$data['categories'][$key]['posts'] = $count_ads;
				}
			return $data['categories'];
			exit;	
	}

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */