<?php 
require('config.php');

$query = "DELETE FROM todo where id = '$_GET[id]'";
$pdostatement = $pdo->prepare($query);
$result = $pdostatement->execute();
if($result){
    echo "<script>alert('todo has been deleted');window.location.href='index.php';</script>";
};
?>