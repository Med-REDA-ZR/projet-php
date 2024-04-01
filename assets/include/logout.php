<?php
    session_start();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or a logged-out page
    header('location:../../pages/index.php');
?>