
<?php
session_start();
if($_SESSION['id'] == '') {
    echo "Please Login!";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=../index.php'>";
    exit();
}
 $_SESSION['fullname'];

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
                    <li><a href="?module=main"><h3>home</h3></a></li>
                    <li><a href="?module=about"><h3>about</h3></a></li>
                    <li><a href="?module=transactions"><h3>transactions</h3></a></li>
                    <li><a href="../index.php"><h3>logout</h3></a></li>
                </ul>
                
        
            </div>
            <div class="col-md-9 border border-primary">
                <?php include($content); ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
