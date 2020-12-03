<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row align-items-center" style="min-height: 360px;">
            <div class="col-md align-middle">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Photo</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'connection.php';
                        $res = mysqli_query($conn, "SELECT * FROM `users` LIMIT 10");
                        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

                            echo '<tr>';
                            echo '<td>', $row['id'], '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td><img src=' . $row['photo'] .' width="200" alt="" class="img-thumbnail mt-10"></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row align-items-end">
        <div class="col-md-3 offset-md-8">
                <a href="signUp.php" class="btn btn-primary btn-lg" tabindex="-1" role="button"><h1>Add User</h1></a>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>