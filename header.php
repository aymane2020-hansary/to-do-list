<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style_2.css">
    <link rel="stylesheet" type="text/css" href="css/stl.css">
    <!-- Bootstrap Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style_header.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title><?php echo $title; ?></title>
    
</head>
<body style="background-color: #f9f9f9 !important;">
    <!-- --------- NAV BAR --------- -->
    <header>
            <a href="index.php">
                <img class="logo" href="index.php" src="img/icons/logo.png" alt="Logo">
            </a>
            <div id="nav-toggle" class="MenuToggle">
                <div class="bar"></div>
            </div>
        <div class="RightButtons">
            <a href="boit-reception.php"><button>Boîte de réception</button></a>
            <a href="main.php"><button>Aujourd'hui</button></a>
            <a href="prochainement.php"><button>Prochainement</button></a>

            <a href="SignUp-SignIN.php"><button class="SignUp">S'inscrire</button></a>
            <a href="SignUp-SignIN.php"><button class="Login">Connexion</button></a>
        </div>
      
    </header>
    <div>
        <nav class="mobile-menu">
            <ul class="navLinks">
                <img class="logo" src="img/icons/logo.png" alt="Logo">
                
                <a href="boit-reception.php"><button>Boîte de réception</button></a>
                <a href="main.php"><button>Aujourd'hui</button></a>
                <a href="prochainement.php"><button>Prochainement</button></a>

                <div class="MenuButtonsMobile">
                    <a class="sm" href="SignUp-SignIN.php"><button class="SignUpMobile">S'inscrire</button></a>
                    <a class="lm" href="SignUp-SignIN.php"><button class="LoginMobile">Connexion</button></a>
                </div>
               <div class="socialMedia">
                   <a href="#"><i class="fab fa-facebook-square fa-2x" ></i></a>
                   <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
               </div>
            </ul>
        </nav>
    </div>