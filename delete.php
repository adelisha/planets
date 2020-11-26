<?php
$connect = mysqli_connect("localhost", "root", "root", "planets" );
mysqli_query($connect, "SET NAMES utf8");
$zapros1="DELETE FROM center WHERE id=".$_GET['id'];
mysqli_query($connect, $zapros1);
echo "<script>window.location.href='lab4.php'</script>";
exit;
?>