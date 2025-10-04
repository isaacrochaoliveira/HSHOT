<?php 

function LOGOFF() {
    @session_start();
    
    @session_destroy();
    
    echo "<script>location.href ='http://localhost/HSHOT/hshot/home.php?pag=login'</script>";
}

?>