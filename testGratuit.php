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

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        
        // $userverify = '';
        // $usermessage = '';

        // if(strlen($username) <= 2){
        //     $userverify = 'you must have more than 2 character in username';
        // }

        // if(strlen($message) <= 5){
        //     $usermessage = 'you must have more than 2 character in message' . '<br>';
        // }

        $formerrors = array();
        if(strlen($username) <= 2){
            $formerrors[] = 'you must have more than <strong>2</strong> character in username' . '<br>';
            // array_push($formerrors, 'you must have more than 2 character in username' . '<br>');
        }
        if(strlen($message) < 10){
            $formerrors[] = 'you must have more than <strong>10</strong> character in message' . '<br>';
            // array_push($formerrors, 'you must have more than 2 character in message' . '<br>');
        }

        // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parametres)]

        $headers = 'From: ' . $email . '\r\n';
        $Myemail = 'abdessamadrahmouni@gmail.com';
        $subject = 'Contact Form';

        if(empty($formErrors)){
            mail($Myemail, $subject, $message, $headers);

            $username = '';
            $email = '';
            $phone = '';
            $message = '';

            $success = '<div class="alert alert-success">We have receirve your message</div>';

        }

        // ini_set('SMTP','smtp.localhost');
        // $Myemail = ini_set('sendmail_from', $email);
        // $subject = 'Contact Form';
        // $headers = 'From: ' . $email . '\r\n';


        // if(empty($formErrors)){
        //     mail($Myemail, $subject, $message, $headers);

        //     $username = '';
        //     $email = '';
        //     $phone = '';
        //     $message = '';

        //     $success = '<div class="alert alert-success">We have receirve your message</div>';

        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/ContactFormStyle.css">
	<link rel='stylesheet' href='style/products_cart_style.css' type='text/css' media='all' />
    <link rel="stylesheet" href="style/style.css" type="text/css" />
    <link rel="stylesheet" href="style/animate.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
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

    <div class="container">
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1 class="text-center">TEST GRATUIT</h1>
            <h5 class="text-center">Le but de ce  test  iptv gratuit est clair, c’est de tester la qualité de nos chaînes et sa comptabilité avec votre débit internet.</h5>
            <div class="uppertestgratuit">
                <div class="row">
                    <div class="col-md">
                        <i class="fas fa-info fa-4x"></i>
                        <p>SAISIR VOS INFORMATION</p>
                    </div>
                    <div class="col-md">
                        <i class="fas fa-paper-plane fa-4x"></i>
                        <p>CLIQUER SUR ENVOYER</p>
                    </div>
                    <div class="col-md">
                        <i class="fas fa-check fa-4x"></i>
                        <p>LE TEST SERA ACTIVER APRÈS 24H AU MAXIMUM ( VÉRIFIER VOTRE BOITE EMAIL )</p>
                    </div>
                </div>
            </div>
                <?php if(!empty($formerrors)){ ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                <?php
                        foreach($formerrors as $errors){
                            echo $errors;
                        }
                ?>
                    </div>
                <?php } ?>

                <?php if(isset($success)){ echo $success;} ?>

            <div class="form-group">
                <input class="form-control form-control-lg username user" type="text" placeholder="type your username" name="username" 
                value="<?php
                if(isset($username)){
                    echo $username;
                }
                 ?>">
                    <?php 
                    // if(isset($userverify)){
                    //     echo $userverify;
                    // }
                    ?>
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    you must have more than <strong>2</strong> character in username
                </div>
            </div>
            <div class="form-group">
                    <input class="form-control form-control-lg email" type="email" placeholder="type your email" name="email" 
                    value="<?php
                    if(isset($email)){
                        echo $email;
                    }
                     ?>">
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                    email can't be <strong>EMPTY</strong>
                    </div>
            </div>
            <input class="form-control form-control-lg phone" type="text" placeholder="type your phone number" name="phone" 
            value="<?php 
            if(isset($phone)){
                echo $phone;
            } 
            ?>">
            <i class="fa fa-phone fa-flip-horizontal fa-fw"></i>

            <div class="form-group">
            <textarea class="form-control form-control-lg textArea" placeholder="your massage" maxlength="500" id="text" name="message"><?php if(isset($message)){ echo $message; } ?></textarea>
            <?php
                // if(isset($usermessage)){
                //     echo $usermessage;
                // }
            ?>
                <div class="alert alert-danger custom-alert">
                you must have more than <strong>10</strong> character in message
                </div>
            <span class="asterisx">*</span>
            </div>
            <span id="count"></span>
            <input class="btn btn-success btn-block" type="submit" value="envoyer">
            <i class="fa fa-send fa-fw send-icone" style="color: white; position: relative; top: -36px;"></i>
        </form>
    </div>

        <!-- Start final text -->

        <div class="final-text text-center">
        <div class="container">
            <p>Test IPTV premium gratuit offert par Royale IPTV  de 24 heures gratuitement, pour que vous pourrez verifier la haute qualité de nos serveurs par vous même avant de commander 
                votre abonnement IPTV. </p>

            <p>Royale IPTV est un fournisseur d’abonnement IPTV : qui est un ensemble de programmes qui vous permet d’accéder à différentes application multimédia et services interactifs 
                tels que télévision HD live, radio, caméra / DVD, messaging, EPG (Electronic Program Guide), VOD /MOD (Video On Demand / Music On Demand), RSS, …</p>

            <p>Parmi ces applications vous aurez Smart IPTV , M3u, Mag,Android IPTVde haute qualité grace a la puissance de nos serveurs , on disposent de plus de 20000 chaines et VOD en SD, 
                HD et full HD (DERNIERS FILMS ET SERIES A JOUR), notre priorité c’est la performance de nos serveur IIPTVet de mieux vous servir.</p>

            <p>Nous vous assurons une réception des chaines en très haute qualité d’image qui vous permettra aussi d’assurer le bon conditionnement lors d’un visionnement de vos matchs et 
                évènement préférés, en plus des vidéos a la demande en HD ou Full HD. Grâce à l’application Smart IPTV ( smart tv) l’activation de votre abonnement est assez simple, 
                entièrement à distance sans intervention de votre part ni connaissance technique, nous  disposons aussi d’une application Android sous le nom IPTV Smarters qui fonctionne 
                avec un identifiant et mot de passe.</p>

            <p>A partir d’aujourd’hui ne ratez aucun match !!</p>

            <p>Regardez Toutes les compétitions sportives sans coupure grâce aux abonnements ROYALE IPTV.</p>

            <p>Ne gaspillez plus votre ARGENT avec ces opérateurs TRADIONNELS !! </p>

            <p>Demandez votre Test IPTV premium gratuit Aujourd’hui </p>

            <p>Test IPTV gratuit</p>

            <p> IPTV ,  IPTV ,  IPTV</p>
        </div>
    </div>

    <!-- end final text -->

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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="script/ContactFormscript.js"></script>
</body>
</html>