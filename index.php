<?php

session_start();
include('db.php');
$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
    $code = $_POST['code'];
    $result = mysqli_query($con, "SELECT * FROM `products` WHERE `code`='$code'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $code = $row['code'];
    $price = $row['price'];
    $image = $row['image'];
    $MONTH = $row['MONTH'];

    $cartArray = array(
        $code => array(
            'name' => $name,
            'code' => $code,
            'price' => $price,
            'image' => $image,
            'MONTH' => $MONTH,
            'quantity' => 1,
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        // $status = "<div class='box'>Product is added to your cart!</div>";
        $status = '<div class="alert alert-success Myalert" role="alert">
    Product is added to your cart!
  </div>';
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($code, $array_keys)) {
            $status = '<div class="alert alert-danger Myalert" role="alert">
        Product is Already added to your cart!
      </div>';
        } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
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
    <title>iptv</title>
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
        <a class="navbar-brand" href="#" style="font-family: 'Noto Sans TC', sans-serif;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">HOME</a>
                <a class="nav-item nav-link" href="products.php">abonnement</a>
                <a class="nav-item nav-link" href="Espacerevendeur.php">espace revendeur</a>
                <a class="nav-item nav-link" href="testGratuit.php">test iptv Gratuit</a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="
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
                if (!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>

                    <span class="add-to-card"><a href="products_cart.php"><i class="fas fa-shopping-cart fa-2x"></i><span class="iteam-in-cart"><?php echo $cart_count; ?></span></a></span>
                <?php
                } else {
                ?>
                    <span class="add-to-card"><i class="fas fa-shopping-cart fa-2x"></i></span>

                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- start offre la meilleure qualité -->

    <div class="offre">
        <div class="overlay">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <p class="live-iptv-text" data-wow-duration="3s">Live IPTV vous <br> offre la meilleure <br> qualité du marché</p>
                    <p class="notrequalité" data-wow-duration="4s">NOTRE QUALITÉ RESUME NOTRE <br> CÉLÉBRITÉ</p>
                    <div class="my-btn">
                        <a href="#" class="btn btn-lg active" role="button" aria-pressed="true">Primary link</a>
                        <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- end offre la meilleure qualité -->


    <!-- start commander des maintenant -->

    <div class="commander text-center">
        <div class="container">
            <p class="wow flip" data-wow-duration="2s">Commander Votre</p>
            <h1 class="wow flipInX" data-wow-duration="3s">Abonnement IPTV chez Royale IPTV</h1>
            <p class="wow flipOutY" data-wow-duration="4s">Le Meilleur abonnement IPTV à Des Prix Imbattables</p>
            <a href="#" class="btn btn-primary btn-lg wow fadeInTopLeft" role="button" aria-pressed="true">commander des maintenant
                ></a>
            <p class="wow flipOutX" data-wow-duration="5s">Nécessite uniquement une bonne connexion internet pour fonctionner</p>
        </div>
    </div>

    <!-- end commander des maintenant -->

    <!-- start Qui sommes nous ? -->

    <div class="Qui-sommes-nous text-center">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h1>Qui sommes nous ?</h1>
                    <p class="parag">Royale IPTV est un fournisseur d’abonnement IPTV
                        de haute qualité depuis 4 ans, nos serveurs iptv
                        contiennent plus de 18000 chaines en tout type
                        de qualité, Ultra full hd iptv, Full hd iptv,
                        Hd iptv, Sd iptv .
                        ainsi que des VOD ( derniers films et series à jour)
                        on donne de l’importance et la priorité a la
                        performance de nos serveurs pour ne pas avoir des
                        coupures et pour vous assurer une réception de chaine
                        en très haute fluidité.</p>
                </div>
                <!-- <div class="col-md"> -->
                <img src="img/3.jpg" alt="img" class="wow rotateOut">
                <!-- </div> -->
            </div>
            <div class="Mycontent">
                <p>Obtenez Un Test IPTV Gratuit , Vérifiez La Qualité Des Chaines Avant de Vous Abonner à Notre
                    <br> Abonnement</p>
                <button type="button" class="btn btn-primary">Obtenez votre test 24h gratuit</button>
            </div>
        </div>
    </div>

    <!-- end Qui sommes nous ? -->

    <!-- start pricing table -->

    <div class="pricing-table">
        <div class="container">
            <div class="row">

                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <span class="news">Nouveau</span>
                            <h2 class="header1">1 Mois normal</h2>
                            <div class="border-bottom bor"></div>
                            <p class="P2"><del class="price1">€25.00</del><span class="euro-icon">€</span><span class="price2">19</span><span class="price3">,99</span></p>
                            <div class="border-bottom"></div>
                            <ul>
                                <li><i class="fas fa-check"></i>+9000 Chaînes</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+3000 VOD , en Fr , En et Ar.</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+2000 Series</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Compatible avec Smart TV - GSE IPTV - MAG/VLC...</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Assistance technique & Support 24/7</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Livraison Immédiate</li>
                            </ul>
                            <button type="button" class="btn btn-primary">commander</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <span class="news">Nouveau</span>
                            <h2 class="header1">1 Mois normal</h2>
                            <div class="border-bottom bor"></div>
                            <p class="P2"><del class="price1">€30.00</del><span class="euro-icon">€</span><span class="price2">25</span><span class="price3">,99</span></p>
                            <div class="border-bottom"></div>
                            <ul>
                                <li><i class="fas fa-check"></i>+9000 Chaînes</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+3000 VOD , en Fr , En et Ar.</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+2000 Series</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Compatible avec Smart TV - GSE IPTV - MAG/VLC...</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Assistance technique & Support 24/7</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Livraison Immédiate</li>
                            </ul>
                            <button type="button" class="btn btn-primary">commander</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <span class="news green" style="background-color: #00C853;">promotion</span>
                            <h2 class="header1">1 Mois normal</h2>
                            <div class="border-bottom bor"></div>
                            <p class="P2"><del class="price1">€118.00</del><span class="euro-icon">€</span><span class="price2">99</span><span class="price3">,99</span></p>
                            <div class="border-bottom"></div>
                            <ul>
                                <li><i class="fas fa-check"></i>+9000 Chaînes</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+3000 VOD , en Fr , En et Ar.</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+2000 Series</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Compatible avec Smart TV - GSE IPTV - MAG/VLC...</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Assistance technique & Support 24/7</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Livraison Immédiate</li>
                            </ul>
                            <button type="button" class="btn btn-primary">commander</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <span class="news green" style="background-color: #00C853;">promotion</span>
                            <h2 class="header1">1 Mois normal</h2>
                            <div class="border-bottom bor"></div>
                            <p class="P2"><del class="price1">€98.00</del><span class="euro-icon">€</span><span class="price2">89</span><span class="price3">,99</span></p>
                            <div class="border-bottom"></div>
                            <ul>
                                <li><i class="fas fa-check"></i>+9000 Chaînes</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+3000 VOD , en Fr , En et Ar.</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>+2000 Series</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Compatible avec Smart TV - GSE IPTV - MAG/VLC...</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Assistance technique & Support 24/7</li>
                                <div class="border-bottom liBorB"></div>
                                <li><i class="fas fa-check"></i>Livraison Immédiate</li>
                            </ul>
                            <button type="button" class="btn btn-primary">commander</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- end pricing table -->

    <!-- START POURQUOI CHOISIR -->

    <div class="POURQUOI-CHOISIR text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="card wow flash" data-wow-duration="2s">
                        <div class="card-body">
                            <i class="fas fa-server fa-7x" style="color: darkgrey;"></i>
                            <h5 class="card-title">MISE A JOUR</h5>
                            <p class="card-text">la mise à jour faites automatiquement pour vous
                                garantir une meilleure qualité de service, vous
                                augmenter le nombre des chaines, vods et séries,
                                et que vous trouverez de nouvelles chaines sur
                                votre appareil sans aucun effort de votre part.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="card wow flash" data-wow-duration="3s">
                        <div class="card-body">
                            <i class="fas fa-phone-alt fa-7x" style="color: darkgrey;"></i>
                            <h5 class="card-title">SUPPORT</h5>
                            <p class="card-text">WL’équipe ORANGE IPTV vous garantit un support
                                commercial et technique 24H/7J.Assistance et
                                accompagnement lors de l’activation de l’IPTV.
                                On est là aussi pour vos demandes et réclamations
                                par chat directement sur notre page facebook,
                                email ou sur WhatsApp.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="card wow flash" data-wow-duration="4s">
                        <div class="card-body">
                            <i class="fas fa-wifi fa-7x" style="color: darkgrey;"></i>
                            <h5 class="card-title">CONNEXION INTERNET</h5>
                            <p class="card-text">La vitesse diffère suivant la qualité de la vidéo.
                                Pour la qualité de HD le minimum conseillé est 6 Mbps,</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END POURQUOI CHOISIR -->

    <!-- start Nos packs Normal -->

    <div class="NosPacksNormal">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="bord">
                        <div class="subbord">
                            <div class="roundP">
                                <p class="p">PACKS NORMAL</p>
                                <P class="p">3 MONTH</P>
                                <input type="submit" class="btn" value="commander">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="bord price3">
                        <div class="subbord">
                            <div class="roundP color1">
                                <p class="p">PACKS NORMAL</p>
                                <P class="p">6 MONTH</P>
                                <input type="submit" class="btn" value="commander">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="bord price4">
                        <div class="subbord">
                            <div class="roundP color2">
                                <p class="p">PACKS NORMAL</p>
                                <P class="p">12 MONTH</P>
                                <input type="submit" class="btn" value="commander">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end Nos packs Normal -->

    <!-- test gratuit -->

    <div class="test-gratuit text-center">
        <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true">test gratuit</a>
    </div>

    <!-- test gratuit -->

    <!-- start Nos packs Adult -->

    <div class="NosPacksNormal">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="bord price3">
                        <div class="subbord">
                            <div class="roundP">
                                <p class="p">PACKS ADULT</p>
                                <P class="p">3 MONTH</P>
                                <input type="submit" class="btn" value="commander">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="bord price1">
                        <div class="subbord">
                            <div class="roundP color1">
                                <p class="p">PACKS ADULT</p>
                                <P class="p">6 MONTH</P>
                                <input type="submit" class="btn" value="commander">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="bord price2">
                        <div class="subbord">
                            <div class="roundP color2">
                                <p class="p">PACKS ADULT</p>
                                <P class="p">12 MONTH</P>
                                <input type="submit" class="btn" value="commander">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end Nos packs Adult -->

    <!-- Start final text -->

    <div class="final-text text-center">
        <div class="container">
            <p>Test IPTV premium gratuit offert par Royale IPTV de 24 heures gratuitement, pour que vous pourrez verifier la haute qualité de nos serveurs par vous même avant de commander
                votre abonnement IPTV. </p>

            <p>Royale IPTV est un fournisseur d’abonnement IPTV : qui est un ensemble de programmes qui vous permet d’accéder à différentes application multimédia et services interactifs
                tels que télévision HD live, radio, caméra / DVD, messaging, EPG (Electronic Program Guide), VOD /MOD (Video On Demand / Music On Demand), RSS, …</p>

            <p>Parmi ces applications vous aurez Smart IPTV , M3u, Mag,Android IPTVde haute qualité grace a la puissance de nos serveurs , on disposent de plus de 20000 chaines et VOD en SD,
                HD et full HD (DERNIERS FILMS ET SERIES A JOUR), notre priorité c’est la performance de nos serveur IIPTVet de mieux vous servir.</p>

            <p>Nous vous assurons une réception des chaines en très haute qualité d’image qui vous permettra aussi d’assurer le bon conditionnement lors d’un visionnement de vos matchs et
                évènement préférés, en plus des vidéos a la demande en HD ou Full HD. Grâce à l’application Smart IPTV ( smart tv) l’activation de votre abonnement est assez simple,
                entièrement à distance sans intervention de votre part ni connaissance technique, nous disposons aussi d’une application Android sous le nom IPTV Smarters qui fonctionne
                avec un identifiant et mot de passe.</p>

            <p>A partir d’aujourd’hui ne ratez aucun match !!</p>

            <p>Regardez Toutes les compétitions sportives sans coupure grâce aux abonnements ROYALE IPTV.</p>

            <p>Ne gaspillez plus votre ARGENT avec ces opérateurs TRADIONNELS !! </p>

            <p>Demandez votre Test IPTV premium gratuit Aujourd’hui </p>

            <p>Test IPTV gratuit</p>

            <p> IPTV , IPTV , IPTV</p>
        </div>
    </div>

    <!-- end final text -->

    <!-- start footer -->
    <div class="footer text-center">
        <div class="container">
            <p class="powered">Powered by live IPTV &copy 2020</p>
            <p class="contactnous">plus d'info contacter</p>
            <p class="contactnous" style="font-family: cursive;"><a href="https://web.whatsapp.com/send?phone=+212606196089&text=Bonjour,%20J%27aimerais%20avoir%20plus%20d%27information%20sur%20votre%20solution." target="_blank"><i class="fab fa-whatsapp">+212 606196089</i></a></p>
        </div>
    </div>
    <!-- end footer -->
    <script src="script/script.js"></script>
    <!-- <script src="script/wow.min.js"></script> -->
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/f84ba90e3b.js" crossorigin="anonymous"></script>
</body>

</html>