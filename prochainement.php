<?php
    require 'app/DB/db_conn.php';
    session_start();

    $now = time(); // Checking the time now when home page starts.
    if (($now > $_SESSION['expire'])){
        session_destroy();
        header('Location: SignUp-SignIN.php');
    }
?>
    <!-- ************************ -->
    <?php 
        $title = "Prochainement";
        require 'header.php'; ?>
    <!-- ************************ -->
    <style>
         #date-input{ border: none; } #date-input:focus{ outline: none; } 
    </style>

    <h3 class="row justify-content-center" style="color: #53bbf4; width: 100%; margin-top: 30px">Prochainement</h3>

    <div class="main-section">
        <div class="add-section">
            <form action="app/add_prochainement.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                        <input type="text" name="title" style="border-color: #ff6666;" placeholder="Ce champ est obligatoire !" />
                        <input id="date-input" type="date" name="date_time" placeholder="Date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" style="background: whitesmoke; height: 30px"/>
                        <button type="submit">Ajouter <img src="img/icons/plus.png" style="width: 20px"></button>
                <?php }else{ ?>
                           <input type="text" name="title" placeholder="Que devez-vous faire ?" /> 
                           <input id="date-input" type="date" name="date_time" placeholder="Date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" style="background: whitesmoke; height: 30px"/>
                    <button type="submit">Ajouter <img src="img/icons/plus.png" style="width: 20px"></button>
                <?php } ?>
            </form>
        </div>
        <?php 
            $todos = $conn->query("SELECT * FROM todos WHERE user_id = '".$_SESSION['user_id']."' and DATE(date_time) > DATE(NOW()) ORDER BY id DESC");
        ?>
        <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" alt="Photo" width="100%">
                        <img src="img/Ellipsis.gif" alt="GIF" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"class="remove-to-do">x</span>
                        <?php if($todo['checked']){ ?>
                            <input type="checkbox"
                                   data-todo-id = "<?php echo $todo['id']; ?>"
                                   class="check-box" 
                                   checked />
                            <h2 class="checked"><?php echo $todo['title']; ?></h2>
                        <?php }else{ ?>
                            <input type="checkbox" style="color: green; position: absolute; margin-top: 10px"
                                   data-todo-id = "<?php echo $todo['id']; ?>"
                                   class="check-box" />
                            <h2 style="padding: 5px 6px 0 35px; max-width: 92%; inline-size: 450px; overflow-wrap: break-word;">
                                <?php echo $todo['title']; ?>
                            </h2>
                        <?php } ?>
                        </br>
                        <small>created: <?php echo $todo['date_time']; ?><span style="color: green; margin-left: 6px"">en cour</span></small>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- ************************ -->
    <?php require 'footer.php'; ?>
    <!-- ************************ -->