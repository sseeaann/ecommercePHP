<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ecommerce_controller extends CI_Controller {

	public function index()
	{
		$products = $this->ecommerce_model->getProducts();
		$orders = $this->session->userdata('orders');
		$this->load->view('landing_page', array(
			'products' => $products,
			'orders' => $orders
			));
	}

	public function addToCart()
	{
		$cart = $this->session->userdata('orders');
		$cart[] = $this->input->post();
		$this->session->set_userdata('orders', $cart);
		redirect('/');
	}

	public function view_cart()
	{
		$products = $this->session->userdata('orders');
		$this->load->view('view_cart', array(
			'products' => $products));
	}

	public function deleteItem()
	{
		$delete = $this->input->post('deleteItem');
		$cart = $this->session->userdata('orders');
		unset($cart[$delete]);
		$this->session->set_userdata('orders', $cart);
		redirect('view_cart');
	}
}
