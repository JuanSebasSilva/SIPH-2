<?php
    session_start();
    if(session_status() != 2 or $_SESSION['aut'] != 'ñasedj12j23jnkj14nñ+;:'){
        session_destroy();
        header("Location: index.php");
        exit();
    }
?>