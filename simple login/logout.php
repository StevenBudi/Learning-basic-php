<?php
    session_start();

    session_destroy();

    echo"<script>alert('Berhasil Log Out')</script>";
    header("Location:form.html");

?>