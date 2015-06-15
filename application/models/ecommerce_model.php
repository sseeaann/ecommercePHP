<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ecommerce_model extends CI_Model {

	public function getProducts()
	{
		$query = "SELECT * FROM products";
		$result = $this->db->query($query)->result_array();
		return $result;
	}
}
