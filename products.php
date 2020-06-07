<?php

session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
$MONTH = $row['MONTH'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
    'image'=>$image,
    'MONTH'=>$MONTH,
	'quantity'=>1,
)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
    // $status = "<div class='box'>Product is added to your cart!</div>";
    $status = '<div class="alert alert-success Myalert" role="alert">
    Product is added to your cart!
  </div>';
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
        $status = '<div class="alert alert-danger Myalert" role="alert">
        Product is Already added to your cart!
      </div>';	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    $status = '<div class="alert alert-success Myalert" role="alert">
    Product is added to your cart!
  </div>';
	}

	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style/ContactFormStyle.css">
    <link rel="stylesheet" href="style/style.css" type="text/css" />
	<link rel='stylesheet' href='style/products_cart_style.css' type='text/css' media='all' />
</head>
<body>

    <!-- Start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="img/1.png" alt="img" class="logo">
        <a class="navbar-brand" href="#" style="font-family: 'Noto Sans TC', sans-serif;">logo name</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">HOME</a>
                <a class="nav-item nav-link" href="products.php">abonnement</a>
                <a class="nav-item nav-link" href="Espacerevendeur.php">espace revendeur</a>
                <a class="nav-item nav-link" href="testGratuit.php">test iptv Gratuit</a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="
                        color: black;
                    ">
                        smart iptv
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="GSEiptv.php">GSE IPTV</a>
                        <a class="dropdown-item" href="fonctionement-avec-vlc.php">IPTV avec VLC</a>
                        <a class="dropdown-item" href="MAGiptv.php">MAG IPTV</a>
                        <a class="dropdown-item" href="smartLiveTv.php">SMART LIVE TV</a>
                    </div>
                </li>
                <a class="nav-item nav-link" href="contact.php">Contact us</a>
                <?php
                if(!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
                
                <span class="add-to-card"><a href="products_cart.php"><i class="fas fa-shopping-cart fa-3x"></i><span class="iteam-in-cart"><?php echo $cart_count; ?></span></a></span>
                <?php
                                                        }
                else{
                ?>
                <span class="add-to-card"><i class="fas fa-shopping-cart fa-3x"></i></span>

                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

<div class="pricing-cards text-center">
        <div class="container">
            <h1 class="H1 wow flash">Nos packs Normal</h1>
            <div class="row">

<?php

$result = mysqli_query($con,"SELECT * FROM products WHERE id BETWEEN 1 AND 5;");
while($row = mysqli_fetch_assoc($result)){                 
        echo '
                <div class="col-sm-12 col-lg-4">
                <form method="post" action="">
                <input type="hidden" name="code" value='.$row['code'].' />
                    <div class="pricing-card wow bounceIn SpecifiqueColorOne">
                        <div class="pricingTable-header">
                            <h3 class="title">'.$row['name'].'</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">$' .$row['price']. '</span>
                            <span class="duration">' .$row['MONTH']. '</span>
                        </div>
                        <div class="pricing-content">
                            <!-- <ul>
                                <li>50GB Disk Space</li>
                                <li class="disable">50 Email Accounts</li>
                                <li>50GB Bandwidth</li>
                                <li class="disable">Maintenance</li>
                                <li>15 Subdomains</li>
                            </ul> -->
                            <div class="pricingTable-signup">
                              <a class="btn btn-lg" href="#">
                              <button type="submit" class="btn buy">Add to cart</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
        ';
        }
?>
            </div>
        </div>
</div>

<!-- PACK ADULT -->

<div class="pricing-cards text-center">
        <div class="container">
            <h1 class="H1 wow flash">Nos packs ADULT</h1>
            <div class="row">

            <?php

$result = mysqli_query($con,"SELECT * FROM products WHERE id BETWEEN 6 AND 10;");
while($row = mysqli_fetch_assoc($result)){                 
        echo '
                <div class="col-sm-12 col-lg-4">
                <form method="post" action="">
                <input type="hidden" name="code" value='.$row['code'].' />
                    <div class="pricing-card wow bounceIn SpecifiqueColorTwo">
                        <div class="pricingTable-header">
                            <h3 class="title">'.$row['name'].'</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">$' .$row['price']. '</span>
                            <span class="duration">' .$row['MONTH']. '</span>
                        </div>
                        <div class="pricing-content">
                            <!-- <ul>
                                <li>50GB Disk Space</li>
                                <li class="disable">50 Email Accounts</li>
                                <li>50GB Bandwidth</li>
                                <li class="disable">Maintenance</li>
                                <li>15 Subdomains</li>
                            </ul> -->
                            <div class="pricingTable-signup">
                              <a class="btn btn-lg" href="#">
                              <button type="submit" class="btn buy">Add to cart</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
        ';
        }
?>
            </div>
        </div>
</div>

<!-- PACK ADULT -->
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

        <!-- start footer -->
        <div class="footer text-center">
        <div class="container">
            <p>powered by live IPTV &copy 2020</p>
        </div>
    </div>
    <!-- end footer -->

        <script src="script/script.js"></script>
        <script src="script/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://kit.fontawesome.com/f84ba90e3b.js" crossorigin="anonymous"></script>

</body>
</html>
