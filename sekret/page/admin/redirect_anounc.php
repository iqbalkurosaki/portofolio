<script>
    var seconds = 1;
    setInterval(
        function(){
            if (seconds <= 1) {
                window.location = '../page/menu_admin.php?a=anounc_input';
            }
            else {
                document.getElementById('secondo').innerHTML = --seconds;
            }
        },
        1000
    );
</script>
