<?php 
//session_start();
?>
<?php 
session_start();
include 'config.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>homepage</title>
</head>
<body style="background: skyblue;">
  <div style="width: 100%;height: 100vh;text-align: center;display: flex;justify-content: center;">
    <h1>Welcome <?php echo $_SESSION["userid"];?></h1>
  </div>
  </body>
</html>

