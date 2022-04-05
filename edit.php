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
            echo "<script>alert('New todo is updated');window.location.href='index.php';</script>";
        };
    }else{
        $id = $_GET['id'];
        $query = "SELECT * FROM todo where id  = $id";
        $pdostatement = $pdo->prepare($query);
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
        // print_r("<pre>");
        // print_r($result);
    }
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="card">
        <div class="card-body">
            <h2>Update New Todo</h2>

            <form action="edit.php" method="post" enctype="multipart/form-data ">
                <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                <div class="form-group p-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?php echo $result[0]['title'] ?>" class="form-control" required>
                </div>

                <div class="form-group p-2">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo $result[0]['description'] ?></textarea>
                </div>

                <div class="form-group p-2">
                    <input type="submit" value="Update" class="btn btn-success" name="submit">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>