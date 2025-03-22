<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['fullname']);
error_reporting(E_ERROR | E_PARSE);
$module=$_REQUEST['module'];
if($module=="") {
$content="main.php";
} else {
$content="$module.php";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fliud">
        <div class="row">
            <div class="col-md-3 border border-primary">
                <ul>
                    <li><a href="?module=login" target="main"><h3>Login</h3></a></li>
                    <li><a href="?module=signin" target="main"><h3>Signin</h3></a></li>
                </ul>
                
        
            </div>
            <div class="col-md-9 border border-primary">
                <?php include($content); ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>