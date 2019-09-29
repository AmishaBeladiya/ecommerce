<?php
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
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!---------------------------------------------MAIN MENU-------------------------------->
<div class="bgimage">
    <div class="menu">


        <div class="rightmenu">
            <ul>
                <li id="fisrtlist"><a href="index.php"> HOME </a></li>
                <li><a href="all_product.php">  ALL PRODUCT </a></li>
                <li><a href="my)account.php" > MY ACCOUNT</a></li>
                <li><a href="register.php">SING UP</a></li>
                <li><a href="cart.php">  SHOPPING CART </a></li>
                <li><a href="contact.php">contact US</a></li>
            </ul>
        </div>

        <div class="leftmenu">
            <i class="fa fa-shopping-cart">    	&nbsp;<a> Logout</a></i>

        </div>
    </div>

    <div class="text">
        <h4> DESIGN • DEVELOPMENT • BRANDING </h4>
        <h1> We Care for Your <br>Health Every Moment</h1>
        <h3> WE ARE THE ONE OF THE WORLD’S TOP CREATIVE DESIGN AGENCIES </h3>
        <button id="buttonone"> like share </button>
        <button id="buttontwo"> Subscribe </button>
    </div>
</div>

<section id="feature">
    <h3 class="text-center">PEMIUM PRODUCTS</h3>
    <h4 class="text-center">We recommend</h4>
    <P class="copy">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
    <div class="container">

        <div class="row">
            <?php

            $get_product = "select * from products";

            $run_product = mysqli_query($conn, $get_product);

            while ($row_product = mysqli_fetch_array($run_product)) {
                $pro_id = $row_product['product_id'];
                $pro_title = $row_product['product_title'];
                $pro_cat = $row_product['cat_id'];
                $pro_brand = $row_product['brand_id'];
                $pro_price = $row_product['price'];
                $pro_img1 = $row_product['img1'];
                //$pro_id = $row_product['product_id'];


                echo "
	<div class='col-sm-6 col-md-4'>
	  <div class='thumbnail'>
		<img src='admin/product_img/$pro_img1' class='img-responsive' style=' margin-left:90px; max-width:250px; max-height:150px;'>
		<div class='caption'>
		  <h3>$pro_title</h3>
		  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate corrupti nam quasi atque ducimus! Amet at alias recusandae esse? Eaque eum magni illum, iusto est in Lorem ipsum dolor  alias recusandae sit amet consectetur adipisicing elit. velit veniam quam? Harum!</p>
		  <div class='clearfix'>
			  <div class='price pull-left '>$pro_price<br/>
                <a href='detail.php?pro_id=$pro_id'>Details</a>
                </div>
			  <a href='index.php?add_cart=$pro_id' class='btn btn-success pull-right'  role='button'>Add to Cart</a></p>
		</div>
	  </div>
	</div>
	</div>

";
            }
            ?>
        </div>
</section>

<section class="product" id="prd">
    <h3 class="text-center"> Procedure Category</h3>
    <p> Donec consequat sam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimusapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus at, semper varius orci.</p>

    <ul class="product-list">
        <li>
            <figure class="photos">
                <img src="D:\htmlcsswebsite\img\procedure\p1.jpg">
            </figure>
        </li>
        <li>
            <figure class="photos">
                <img src="D:\htmlcsswebsite\img\procedure\p2.jpg">
            </figure>
        </li>

        <li>
            <figure class="photos">
                <img src="D:\htmlcsswebsite\img\procedure\p3.jpg">
            </figure>
        </li>
        <li>
            <figure class="photos">
                <img src="D:\htmlcsswebsite\img\procedure\p1.jpg">
            </figure>
        </li>
    </ul>

</section>

<section class="city" id="cty">

    <h3 class="text-center">WE ARE CURRENTLY THESE CITIES</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <img src="img\city\city3.jpg">
                <h4>London</h4>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>

            </div>
            <div class="col-md-3">
                <img src="img\city\city6.jpg">
                <h4>London</h4>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>

            </div>
            <div class="col-md-3">
                <img src="img\city\city7.jpg">
                <h4>London</h4>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000--+ Happy Customer</p>

            </div>
            <div class="col-md-3">
                <img src="img\city\city1.jpg">
                <h4>London</h4>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>
                <p><i class="fa fa-cog"></i>1000+ Happy Customer</p>

            </div>

        </div>
    </div>
    </div>
</section>

<section class="test" id="about">
    <h3 class="text-center">OUR CUSTOMER CAN'T LIVE WITHOUT US</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Donec consequat sam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimusapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus at, semper varius orci.
                </p>
                <cite><img src="D:\htmlcsswebsite\img\procedure\p1.jpg">    Tushar Beladiya</cite>
            </div>

            <div class="col-md-4">
                <p>Donec consequat sam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimusapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus at, semper varius orci.
                </p>
                <cite><img src="D:\htmlcsswebsite\img\procedure\p1.jpg">   Krishna Savani</cite>
            </div>

            <div class="col-md-4">
                <p>Donec consequat sam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimusapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus at, semper varius orci.
                </p>
                <cite><img src="D:\htmlcsswebsite\img\procedure\p1.jpg">  Satish Beladiya</cite>
            </div>
        </div>
    </div>
</section>

<section class="form" id="sign">
    <div class="container">
        <h3 class="text-center">WE WILL HAPPY TO HEAR FORM YOU</h3>
        <div class="row gap">

            <div class="col-md-4" >
                <form class="1" action="index.html" method="post">

                    <input id="name" type="text" placeholder="Username" class="form-control"></br>
                    <input type="email" placeholder="email" class="form-control"></br>
                    <input type="password" placeholder="password" class="form-control"></br>
                    <label class="radio-inline">	MALE:<input type="radio" name="gender" value="male" class="form-control"></label>
                    <label class="radio-inline">FEMALE:<input type="radio" name="gender" value="female" class="form-control"></label>
                    <select class="form-control">
                        <option class="form-control">FYBCA</option>
                        <option class="form-control">SYBCA</option>
                        <option class="form-control">TYBCA</option>
                    </select>

            </div>
            <div class="col-md-8">
                <textarea class="form-control" rows="8" placeholder="Comment"></textarea>
                <button class="btn btn-warning btn-block"  type="submit" onclick="Isempty()">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>



