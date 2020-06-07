
<?php
    session_start();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $prixTotal = $_SESSION['TotalPrix'];

        $username       = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email          = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $ville          = filter_var($_POST['ville'], FILTER_SANITIZE_STRING);
        $AdressMac      = filter_var($_POST['AdressMac'], FILTER_SANITIZE_STRING);
        $VotrePay       = filter_var($_POST['VotrePay'], FILTER_SANITIZE_STRING);
        $CodePostal     = filter_var($_POST['CodePostal'], FILTER_SANITIZE_NUMBER_INT);
        $phone          = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $selectDevice   = $_POST['selectedDevice'];

                    // test
                    // $LesAchats  = ' Le Nom et prénom de l\'utilisateur et: ' . $username . "<br>" .
                    // 'sur la ville: ' . $ville . "<br>" .
                    // 'avec un Adress Mac: ' .$AdressMac . "<br>" .
                    // 'et payer: ' .$VotrePay . "<br>" .
                    // 'et Code Postal: ' .$CodePostal . "<br>" .
                    // 'et numero de telephone: ' .$phone . "<br>" .
                    // 'Sur Une device de: ' .$selectDevice . "<br>";

                    // $totalprix = 0;
                    // $totalquantity = 0;

                    // foreach ($_SESSION["shopping_cart"] as $product){
                    //     echo $product["name"]. "<br>";
                    //     echo "$".$product["price"] ."<br>";
                    //     echo $product["quantity"] ."<br><br>";
                    //     $totalquantity += $product["quantity"];
                    //     $totalprix += $product["price"];
                    // }
                    // echo "total quantity et: " . $totalquantity . "<br>";

                    // echo "et total prix et Total Et: " . $prixTotal . "$" . "<br>";

                    // echo $LesAchats;
                    // test

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


        // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parametres)]

        $headers    = 'Command From: ' . $email . ' name: ' . $username . '\r\n';
        $Myemail    = 'aibiyassin8@gmail.com';
        $subject    = 'tu as recervé une Commande sur le site IPTV';
        $LesAchats  = ' Le Nom et prénom de l\'utilisateur et: ' . $username . "<br>" .
        'sur la ville: ' . $ville . "<br>" .
        'avec un Adress Mac: ' .$AdressMac . "<br>" .
        'et payer: ' .$VotrePay . "<br>" .
        'et Code Postal: ' .$CodePostal . "<br>" .
        'et numero de telephone: ' .$phone . "<br>" .
        'Sur Une device de: ' .$selectDevice . "<br><br>";

        $totalprix = 0;
        $totalquantity = 0;

        foreach ($_SESSION["shopping_cart"] as $product){
            $LesAchats .= $product["name"]. "<br>";
            $LesAchats .= "$".$product["price"] ."<br>";
            $LesAchats .= $product["quantity"] ."<br><br>";
            $totalquantity += $product["quantity"];
            $totalprix += $product["price"];
        }
        $LesAchats .= "total quantity et: " . $totalquantity . "<br>";
        $LesAchats .= "et total prix et Total Et: " . $prixTotal . "$" . "<br>";

        echo $LesAchats;

        // $totalprix = 0;
        // $totalquantity = 0;

        // foreach ($_SESSION["shopping_cart"] as $product){
        //     echo $product["name"]. "<br>";
        //     echo "$".$product["price"] ."<br>";
        //     echo $product["quantity"] ."<br><br>";
        //     $totalquantity += $product["quantity"];
        //     $totalprix += $product["price"];
        // }
        // echo "total quantity et: " . $totalquantity . "<br>";
        // echo "et total prix et Total Et: " . $prixTotal . "$" . "<br>";

        // echo $LesAchats;

        if(empty($formErrors)){
            mail($Myemail, $subject, $LesAchats , $headers);

            $username       = '';
            $email          = '';
            $phone          = '';
            $ville          = '';
            $AdressMac      = '';
            $VotrePay       = '';
            $CodePostal     = '';
            $selectDevice   = '';
            // $LesAchats   .= '';

            $success = '<div class="alert alert-success">We have receirve your order</div>';

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
                <span class="add-to-card"><i class="fas fa-shopping-cart fa-3x"></i></span>
            </div>
        </div>
    </nav>
    <!-- end navbar -->


    <div class="container">
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1 class="text-center">Commander</h1>
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
                    cette email n'est pas <strong>VALID</strong>
                    </div>
            </div>
            <div class="form-group">
                    <input class="form-control form-control-lg ville" type="text" placeholder="ville" name="ville" 
                    value="<?php
                    if(isset($ville)){
                        echo $ville;
                    }
                     ?>">
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                    entrer valid<strong>ville</strong>
                    </div>
            </div>
            <div class="form-group">
                    <input class="form-control form-control-lg AdressMac" type="text" placeholder="adress MAC" name="AdressMac" 
                    value="<?php
                    if(isset($AdressMac)){
                        echo $AdressMac;
                    }
                     ?>">
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                    entrer Valid<strong>Adress Mac</strong>
                    </div>
            </div>
            <div class="form-group">
                    <input class="form-control form-control-lg VotrePay" type="text" placeholder="pays" name="VotrePay" 
                    value="<?php
                    if(isset($VotrePay)){
                        echo $VotrePay;
                    }
                     ?>">
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                    entrer a valid <strong>payer</strong> s'il te plait
                    </div>
            </div>
            <div class="form-group">
                    <input class="form-control form-control-lg CodePostal" type="text" placeholder="Code postal" name="CodePostal" 
                    value="<?php
                    if(isset($CodePostal)){
                        echo $CodePostal;
                    }
                     ?>">
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                    Remplir de cette zone et<strong>obligatoir</strong>
                    </div>
            </div>

            <input class="form-control form-control-lg phone" type="text" placeholder="type your phone number" name="phone" 
            value="<?php 
            if(isset($phone)){
                echo $phone;
            } 
            ?>">
            <i class="fa fa-phone fa-flip-horizontal fa-fw"></i>

            <!-- <div class="form-group">
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
            <span id="count"></span>
            </div> -->

            <div class="form-group">
                <select class="form-control form-control-lg MyfomSelectDevice" name="selectedDevice">
                    <option value="smart tv">smart tv</option>
                    <option value="android">android</option>
                    <option value="PC">PC</option>
                    <option value="M3U">M3U</option>
                    <option value="MAG">MAG</option>
                </select>
            </div>

            <input class="btn btn-success btn-block" type="submit" value="valider la command">
            <i class="fa fa-send fa-fw send-icone" style="color: white; position: relative; top: -36px;"></i>
        </form>
    </div>

        <!-- start footer -->
        <div class="footer text-center">
        <div class="container">
            <p>powered by live IPTV &copy 2020</p>
        </div>
    </div>
    <!-- end footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/f84ba90e3b.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="script/ContactFormscriptVC.js"></script>
    <!-- <script src="script/form.js"></script> -->
</body>
</html>

