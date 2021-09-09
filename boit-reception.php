<?php
    require 'app/DB/db_conn.php';
    session_start();

    $now = time(); // Checking the time now when home page starts.
    if (($now > $_SESSION['expire'])){
        session_destroy();
        header('Location: SignUp-SignIN.php');
    }
    /* ************************ */
    $title = "Boîte de réception";
    require 'header.php'; ?>
    <!-- ************************ -->
        
    <h3 class="row justify-content-center" style="color: #53bbf4; width: 100%; margin-top: 30px">Boîte de réception</h3>

    <div class="main-section">

        <?php             
            $tds = $conn->query("SELECT * FROM todos WHERE user_id = '".$_SESSION['user_id']."' ORDER BY date_time ASC");
        ?>
        <div class="show-todo-section">
            <?php if($tds->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" alt="Photo" width="100%">
                        <img src="img/Ellipsis.gif" alt="GIF" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($to = $tds->fetch(PDO::FETCH_ASSOC)) { 
                    if(date('Y-m-d') < $to['date_time'])
                    {
                        echo '<small style="color: green; margin-left: 15px">En cour</small> <hr style="width: 94%; margin: 0px 0px -1px 14px">';
                    }else if(date('Y-m-d') > $to['date_time']){
                        echo '<small style="color: red; margin-left: 15px">En retard</small> <hr style="width: 94%; margin: 0px 0px -1px 14px">';
                } ?>
                <div class="todo-item">
                    <span id="<?php echo $to['id']; ?>"class="remove-to-do">x</span>
                        <?php if($to['checked']){ ?>
                            <input type="checkbox"
                                   data-todo-id = "<?php echo $to['id']; ?>"
                                   class="check-box" 
                                   checked />
                            <h2 class="checked"><?php echo $to['title']; ?></h2>
                        <?php }else{ ?>
                            <input type="checkbox" style="color: green; position: absolute; margin-top: 10px"
                                   data-todo-id = "<?php echo $to['id']; ?>"
                                   class="check-box" />
                            <h2 style="padding: 5px 6px 0 35px; max-width: 92%; inline-size: 450px; overflow-wrap: break-word;">
                                <?php echo $to['title']; ?>
                            </h2>
                        <?php } ?>
                        </br>
                        <small>created: <?php echo $to['date_time']; 
                                if(date('Y-m-d') < $to['date_time'])
                                { ?>
                                        <span style="color: green; margin-left: 10px">
                                            <?php echo'+'; echo  round(abs(strtotime($to['date_time']) - strtotime(date('Y-m-d')))/86400); echo'Jour'; ?>
                                        </span>
                                <?php }else if(date('Y-m-d') > $to['date_time']){?>
                                        <span style="color: red; margin-left: 10px">
                                            <?php echo'-'; echo  round(abs(strtotime($to['date_time']) - strtotime(date('Y-m-d')))/86400); echo'Jour'; ?>
                                        </span>
                                <?php }?>
                        </small>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- ************************ -->
    <?php require 'footer.php'; ?>
    <!-- ************************ -->