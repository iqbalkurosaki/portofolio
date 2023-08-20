<script>
    var seconds = 1;
    setInterval(
        function(){
            if (seconds <= 1) {
                window.location = 'menu_alumni.php?a=biodata';
            }
            else {
                document.getElementById('secondo').innerHTML = --seconds;
            }
        },
        1000
    );
</script>
