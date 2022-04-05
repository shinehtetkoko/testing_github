<?php
    require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
        <?php
            $query = "SELECT * FROM todo ORDER BY id desc";
            $pdostatement = $pdo->prepare($query);
            $pdostatement -> execute();
            $result = $pdostatement -> fetchAll();
            // print_r($result);
        ?>
        <div class="card">
            <div class="card-body">
                <h2>Todo Home Page</h2>

                <a href="create.php" class="btn btn-primary mb-3">Create New+</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created_at</th>
                            <th colspan="" class="">Actions</th>
                        </tr>
                    </thead>
                    <?php
                    
                    if($result){
                        $i = 0;
                        foreach ($result as $value) {
                            $title = $value['title'];
                            $decription = $value['description'];
                            $created_at = $value['created_at'];
                    ?>
                    <tr>
                        <td><?php echo ++$i?></td>
                        <td><?php echo $title?></td>
                        <td><?php echo $decription?></td>
                        <td><?php echo date('y-m-d',strtotime($created_at)) ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
                       
                            <a href="delete.php?id=<?php echo $value['id'] ?>" class="btn btn-danger m-auto">Delete</a>
                        </td>
                    </tr>

                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>

</body>
</html>