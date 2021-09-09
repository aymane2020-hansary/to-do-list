<?php
    require 'app/DB/db_conn_login.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire/Connexion</title>
    <link rel="stylesheet" href="css/SignUp-SignIN.css">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background-color: #fafafa;">
  
   <?php 
    if(isset($_POST['Loginn']))
    {
        $user_name = strtolower($_POST['user_name']);
        $user_password = $_POST['user_password'];
    
        $conn = getDB();
        $sql = "SELECT * FROM login_to_do_list WHERE user_name = LOWER('".$user_name."') AND user_password = '".$user_password."'";
        $results = mysqli_query($conn, $sql);
    
        if($results === false){
            echo mysqli_error($conn);
        }
        else{
            $n = ''; $p = '';
            
            while($row = mysqli_fetch_assoc($results)) {
                $n = strtolower($row['user_name']);
                $p = $row['user_password'];
                $_SESSION['user_id'] = $row['user_id']; // Session Contain the user id 
                $_SESSION['user_name'] = strtolower($row['user_name']); // Session Contain the user name
              
                $_SESSION['start'] = time(); // Taking now logged in time.
                $_SESSION['expire'] = $_SESSION['start'] + (15 * 60); // Ending a session in 15 minutes from the starting time.
            }
            
            if(($user_name == $n) && ($user_password == $p))
            {
                header('Location: main.php');
            }else{
                echo "<script>alert(\"Ce compte n'existe pas, réessayez !\")</script>";
            } 
        }       
    }

    if(isset($_POST['sign_up']))
    {
        if(($_POST['user_name'] == '') || ($_POST['user_password'] == '')){
            echo "<script>alert(\"Remplair Vous Les Champs !\");</script>";
        }else{
            $conn = getDB();
            $ver = $conn->query("SELECT * FROM login_to_do_list WHERE user_name = LOWER('".$_POST['user_name']."')");
            $rowCount = $ver->num_rows;
            if($rowCount <= 0){
                $sql = "INSERT INTO login_to_do_list(first_name, last_name, user_name, user_password) VALUES(LOWER('".$_POST['first_name']."'), LOWER('".$_POST['last_name']."'), LOWER('".$_POST['user_name']."'), '".$_POST['user_password']."')";
                $results = mysqli_query($conn, $sql);
        
                if($results === false){
                    echo mysqli_error($conn);
                }
                else{
                    header('Location: SignUp-SignIN.php');
                }   
            }else{
                echo "<script>alert(\"Cette Email existe déja, réessayez !\"); window.location = './SignUp-SignIN.php';</script>";
            }
        }
    }
?>
   
    <header>
        <nav id="nav-menu">
          <a href="index.php">
            <img class="logo" src="img/Logo/logo.png" alt="Logo">
          </a>
        </nav>
    </header>
    <div class="banner"></div>


    <div class="form">
      <div class="row topT">
        <ul class="tab-group">
          <li class="tab active"><a href="#signup">S'inscrire</a></li>
          <li class="tab"><a href="#login">Connexion</a></li>
        </ul>
      </div>
    <div class="tab-content">
       <div id="signup">
        <form method="POST">
         <h1 class="Stitle">Inscription gratuite</h1>
         <div class="row">
          <label class="form-label">Prénom <spanc class="restrict">*</spanc></label>
          <input type="text" name="first_name" class="form-control" placeholder="Prénom" value="" required>
         </div>
         <div class="row">
          <label class="form-label">Nom<spanc class="restrict">*</spanc></label>
          <input type="text" name="last_name" class="form-control" placeholder="Nom" value="" required>
         </div>
  
  
         <div class="row">
          <label class="form-label">E-mail<spanc class="restrict">*</spanc></label>
          <input type="email" name="user_name" class="form-control" placeholder="E-mail" value="" required>
         </div>
  
         <div class="row">
          <label class="form-label">Mot de passe<spanc class="restrict">*</spanc></label>
          <input type="password" name="user_password" class="form-control" placeholder="Mot de passe" value="" required>
         </div>
         
         <div class="row">
          <div class="">
            <input id="newsletter-subscribe" type="checkbox"  name="newsletter_subscribe" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" required>
            <label id="pp" class="text-gray-300" for="newsletter-subscribe">
              En vous inscrire, vous acceptez <a href="policy.php">Politique </a> de <a href="index.php">TODOLIST</a>
            </label>
          </div>
         </div>
  
         <div class="row">
          <button class="sign" name="sign_up">Créer un nouveau compte</button>
         </div>
           </form>
      </div>
      
      <div id="login">
       <form action="" method="POST">
        <h1 class="Stitle">Bienvenue !</h1>
        <div class="row">
          <label class="form-label">E-mail</label>
          <input type="email" name="user_name" class="form-control" placeholder="E-mail" value="" required>
         </div>
         <div class="row">
          <label class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="user_password" placeholder="Mot de passe" value="" required>
         </div>
  
         <div class="row">
          <button class="sign" name="Loginn">Connexion</button>
         </div>
        </form>
      </div>
    </div>
     
    </div>
  
    <div class="s1"></div>

    <footer class="foot">
      <img src="img/Logo/logoFooter.png" alt="">
      <h2 class="h2">  © Copyright 2021, Tous droits réservés. </h2>
    </footer>   


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/SignUp-SignIN.js"></script>
  </body>
</html>