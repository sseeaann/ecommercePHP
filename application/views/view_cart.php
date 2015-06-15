<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-theme.min.css">
	<style type="text/css">
		.product{
			/*text-align: center;*/
			background-color: #eee;
			border: 1px solid black;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="/">Ecommerce</a>
	    </div>

	    <div class="col-md-3 pull-right">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/">Continue Shopping</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	</div>
	<div class="container col-md-8 col-md-offset-2 product">
		<div class="row-offset-1">
			<h2>Check Out</h2>
		</div>
		<div class="row-pull-1">
				<table class="table table-striped">
					<thead>
						<tr>
							<td><strong>Qty</strong></td>
							<td><strong>Description</strong></td>
							<td><strong>Price</strong></td>
						</tr>
					</thead>
					<tbody>
<?php 
	if(count($this->session->userdata('products')) >= 0) 
	{
		foreach($products as $key => $product)
		{
?>
						<tr>
							<td><?=$product['quantity'];?></td>
							<td><?=$product['description'];?></td>
							<td>$<?=$product['price'];?></td>
							<td>
							<form method="post" action="/ecommerce_controller/deleteItem">
							<input type="hidden" name="deleteItem" value="<?= $key; ?>">
							<button type="submit" class="btn btn-danger">Remove from cart</button>
							</form>
							</td>
						</tr>
					</tbody>
<?php } }?>
				</table>
				<div class="col-md-6-pull-left"><h3><strong>Total: $
<?php 
	if(count($this->session->userdata('products')) < 1)
	{
		$cost = 0;
		foreach($products as $prodcuts)
		{
			$cost += $product['price'] * $product['quantity'];
		}
		echo $cost;
	}
	else
	{
		echo 0;
	}
?>
				</strong></h3></div>
		</div>
	</div>
	<script src="/assets/jquery-1.11.2.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js">
		
	</script>
</body>
</html>