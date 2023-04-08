<?php
// Check if admin is logged in
if(isset($_GET['admin'])){
    if($_GET['admin'] == 'true'){
        header('location: views/mitra/register.php');
    }
}
else{
    header('location: views/login/login.php');
}
