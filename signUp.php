<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-4" style="margin-top: 200px;">
                <form action="upload.php" method="post" enctype="multipart/form-data">

                    <label>Имя</label><br>
                    <input type="text" name="name" class="form-control" placeholder="Введите имя">
                    <label>Select image to upload:</label><br>
                    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit"><br><br>
                    <button type="submit" class="btn btn-success mt-1">Добавить пользователя</button>

                    <?php
                    session_start();
                    if (isset($_SESSION['message'])) {
                        echo '<p> ' . $_SESSION['message'] . ' </p>';
                        unset($_SESSION['message']);
                    }

                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>