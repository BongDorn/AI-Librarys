<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Text</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Text</h2>
        <?php
        include 'config.php';
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM text_data WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        ?>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="text">Text:</label>
                <input type="text" class="form-control" id="text" name="text" value="<?php echo $row['text']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php
            } else {
                echo "No text found.";
            }
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
