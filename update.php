<?php
    require('config.php');

    if($_POST){
        print_r("<pre>");
        var_dump($_POST);
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE todo SET title='$title',description='$description' WHERE id = '$id'" ;
        $pdostatement = $pdo->prepare($query);
        $result = $pdostatement->execute();
        if($result){
            echo "<script>alert('New todo is updated');window.location.href='index.php'</script>";
        };};
 ?>