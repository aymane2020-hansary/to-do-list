<!-- Bootstrap JS -->
<script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/MainJs.js"></script>
<script>
    $(document).ready(function(){
        $('.remove-to-do').click(function(){
            const id = $(this).attr('id');

            $.post("app/remove.php",
                {
                   id: id
                },
                (data) => {
                    if(data){
                        $(this).parent().hide(600); 
                    }
                });
        });

        $('.check-box').click(function(e){
            const id = $(this).attr('data-todo-id');

            $.post('app/check.php',
                {
                    id: id
                },
                (data) => {
                    if(data != 'error'){
                    const h2 = $(this).next();
                    if(data === '1'){
                        h2.removeClass('checked');
                    }else{
                        h2.addClass('checked');
                    }
                }
            });
        })
    });
</script>
</body>
</html>