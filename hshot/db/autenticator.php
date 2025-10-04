<?php 

define('URL', 'http://localhost/HSHOT/');

@session_start();

if (!(isset($_SESSION['email']))) {
    // echo "<script>location.href='http://localhost/HSHOT/hshot'</script>";
}
function AUTENT() {
    return @$_SESSION['usuario']['id_membro'];
}
?>