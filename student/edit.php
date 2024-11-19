<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Student Record</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            include("db.php");
            $sql = "SELECT * FROM student WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

        ?>

        <form action="process.php" method="post" enctype="multipart/form-data">
            
        <div class="form-element my-4">
                <input type="file" class="form-control" name="image" required>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" value="<?php echo $row["name"]; ?>" name="name" placeholder="Enter Name:" required>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" value="<?php echo $row["email"]; ?>" name="email" placeholder="Email:" required>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" value="<?php echo $row["address"]; ?>" name="address" placeholder="Enter Address:" required>
            </div>

            <div class="form-element my-4">
                <select name="class" class="form-control" required>
                    <option value="">Select Class</option>
                    <option value="1" <?php if($row["class_id"]=="1"){echo " selected"; } ?>>6</option>
                    <option value="2" <?php if($row["class_id"]=="2"){echo " selected"; } ?>>7</option>
                    <option value="3" <?php if($row["class_id"]=="3"){echo " selected"; } ?>>8</option>
                    <option value="4" <?php if($row["class_id"]=="4"){echo " selected"; } ?>>9</option>
                    <option value="5" <?php if($row["class_id"]=="5"){echo " selected"; } ?>>10</option>
                </select>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" value="<?php echo $row["created_at"]; ?>" name="date" placeholder="Enter Address:" readonly requiled >
            </div>

            <!-- <div class="form-element my-4">
                <input type="text" class="form-control" name="Description" placeholder="Enter Description:">
            </div> -->
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <div class="form-element">
                <input type="submit" class="btn btn-success" name="edit" value="Edit book">
            </div>
        </form>


        <?php
        }
        ?>


    </div>
</body>
</html>