<?php
//session_start();
include("include/db.php");
include ("function/function.php");

?>

<html>
<head>
	<title>Shopping Cart</title>
	  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
 <link rel="stylesheet" href="views\layouts\font-awesome-4.7.0\css\font-awesome.min.css">
 
			 <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
			
			<link href="font-awesome-4.7.0\css\font-awesome.min.css" rel="stylesheet">
			<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
			 <link rel='stylesheet' href='/stylesheets/style.css'/>
			 <link rel='stylesheet' type="text/css" href='style2.css'/>
			 <link rel='stylesheet' type="text/css" href='style3.css'/>
			<style>
				*{
					font-family:verdana;
				}
			</style>

</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
 crossorigin="anonymous"></script>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		  </div>
	  
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			  <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
			  <li><a href="#">Link</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catagories <span class="caret"></span></a>
				<ul class="dropdown-menu">
				
				<?php
					getCategory();
                ?>
                <li role="separator" class="divider"></li>
				  <li><a href="#">Separated link</a></li>
				  <li role="separator" class="divider"></li>
				  <li><a href="#">One more separated link</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brand <span class="caret"></span></a>
				<ul class="dropdown-menu">
                <?php
                    getBrand();
                ?>
				  <li role="separator" class="divider"></li>
				  <li><a href="#">Separated link</a></li>
				  <li role="separator" class="divider"></li>
				  <li><a href="#">One more separated link</a></li>
				</ul>
			  </li>
			</ul>
			<form class="navbar-form navbar-left" method="get" action="result.php" enctype="multipart/form-data" >
			  <div class="form-group">
				<input type="text" name="user_query" class="form-control" placeholder="Search">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
                <li><a href="cart.php"> <i class="fa fa-truck" style="font-size: 18px;"></i> &nbsp;Shopping Cart</a></li>
                <li><a href="#">Item:-<?php total_item();?></a></li>
								<li><a href="#">Total price:-<?php total_price()?></a></li>

			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#">User Accoutn</a></li>
				  <li><a href="logout.php">Logout</a></li>

				</ul>
			  </li>
			</ul>
		  </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	  </nav>
<form action="cart.php" method="post">

<?php
		$ip = getRealIpAdress();
    global  $conn;
    $total = 0;
    
    $run_price = "select * from cart where ip_add = '$ip'";
    $run_price = mysqli_query($conn, $run_price);
    
    while($record = mysqli_fetch_array($run_price)){
        $pro_id = $record['p_id'];
        
        $run_pro_price = "select * from products where product_id = '$pro_id'";
        
        $run_pro_price = mysqli_query($conn, $run_pro_price);
        
        while($p_price = mysqli_fetch_array($run_pro_price)){
						$product_price = array($p_price['price']);
						$product_title = $p_price['product_title'];
						$img = $p_price['img1'];
						$price = $p_price['price'];
            $value = array_sum($product_price);
						$total +=$value;  
					
		?>

		<div class='row' style="margin-left:30px;">
			
			<div class='col-md-3'>
						<img src="admin/product_img/<?php echo"$img"?>" style="height:150px; widht:150px;">
			</div>
			<div class='col-md-3'>
						<h3><?php echo"$product_title"; ?></h3>
						<h4 style="color:green;">In Stock</h4>
						<label for="remove">Remove</label><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"  style="margin-left:10px;">
						
			</div>
			<div class='col-md-3'>
						<h3>Quantity</h3>
						<input type="number" name="qty" value="1" class="form-control" style="max-width:50px;">
				
			</div>
			<div class='col-md-3'>
						<h3>Price</h3>
							<input class="btn btn-success" type="button" value="<?php echo "$price"; ?>">
			</div>
</div>


				<?php }
			} ?>
			<h3 style="margin-left:70%";><b>Sub Total:      <?php total_price(); ?></b></h3>
			<a href="index.php"><input class="btn btn-success" type="button" value="Continue Shopping" style="margin-left:710px;"></a>
			<a href="checkout.php"><input class="btn btn-success" type="button" value="Checkout" style="margin-left:50px;"></a>
			<button name="update" class="btn btn-success">Update</button>
	</form>
		</section>
</body>
</html>

			<?php 
				 if(isset($_POST['update'])){
					foreach($_POST['remove'] as $remove_id){
						$del_product = "delete from cart where p_id = '$remove_id'";
						$run = mysqli_query($conn,$del_product);
						if($run){
							echo "<script>window.open('cart.php','_self')</script>";
						}
					}
				}
			
			?>

    
