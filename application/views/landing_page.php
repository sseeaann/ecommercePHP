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
	        <li><a href="/view_cart">Shopping Cart (
<?php 
		if(count($this->session->userdata('orders')) > 0)
		{
			$qty = 0;
			foreach($orders as $order)
			{
				$qty += $order['quantity'];
			} 
			echo $qty;
		}
		else
		{
			echo 0;
		}
?>
	        )</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	</div>
	<div class="container col-md-8 col-md-offset-2 product">
		<div class="row-offset-1">
			<h2>Products</h2>
		</div>
		<div class="row-pull-1">
				<table class="table table-striped">
					<thead>
						<tr>
							<td><strong>Description</strong></td>
							<td><strong>Price</strong></td>
							<td><strong>Qty</strong></td>
						</tr>
					</thead>
					<tbody>
<?php foreach($products as $product) { ?>
					<form method="post" action="/ecommerce_controller/addToCart">
						<tr>
							<td><?= $product['description']; ?></td>
							<td>$<?= $product['price']; ?></td>
							<td>
								<select id="quantity" name="quantity">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>
							<td>
								<input type="hidden" name="id" value="<?= $product['id'];?>">
								<input type="hidden" name="description" value="<?= $product['description'];?>">
								<input type="hidden" name="price" value="<?= $product['price'];?>">
								<button type="submit" class="btn btn-primary">Add to cart</button>
							</td>
						</tr>
					</tbody>
					</form>
<?php } ?>
				</table>
		</div>
	</div>
	<script src="/assets/jquery-1.11.2.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js">
		
	</script>
</body>
</html>