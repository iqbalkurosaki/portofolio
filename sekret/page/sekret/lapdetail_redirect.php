<script>
    var seconds = 1;
    setInterval(
        function(){
            if (seconds <= 1) {
                window.location = '../page/menu_sekret.php?a=cek_data';
            }
            else {
                document.getElementById('secondo').innerHTML = --seconds;
            }
        },
        1000
    );
</script>
