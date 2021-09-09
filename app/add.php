<?php
    session_start();

    if(isset($_POST['title'])){
        require '../app/DB/db_conn.php';
        session_start();
    
        $title = $_POST['title'];
        
        if(empty($title)){
            header("Location: ../main.php?mess=error");
        }else{
            // This code is verify if the user_id is exists in DB
            // Cause when we delete the account and still in the page we can't add something
            $verify = $conn->query("SELECT * FROM login_to_do_list WHERE user_id = '".$_SESSION['user_id']."'");
            
            if($verify->rowCount() <= 0){
                echo "<script>alert(\"Ce compte n'existe pas, réessayez !\"); window.location = '../SignUp-SignIN.php';</script>";
            }else{
                $stmt = $conn->prepare("INSERT INTO todos(title, user_id, date_time) VALUE(?, ?, ?)");
                $res = $stmt->execute([$title, $_SESSION['user_id'], date('Y-m-d')]);
                
                if($res){
                    header("Location: ../main.php?mess=success");
                }else{
                    header("Location: ../main.php");
                }
        
                $conn = null;
                exit();
            }
        }
    }else{
        header("Location: ../main.php?mess=error");
    }
?>