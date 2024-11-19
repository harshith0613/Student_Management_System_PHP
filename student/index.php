<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Student Data</title>
    <style>
        /* Custom styles for buttons and table */

        body {
    font-family: 'Roboto', sans-serif;
}


        .btn-custom {
            font-size: 14px;
            padding: 8px 20px;
            margin: 5px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-custom {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .alert-custom {
            font-weight: 600;
            text-align: center;
            border-radius: 5px;
        }

        .header-btn {
            font-size: 16px;
            padding: 10px 20px;
            margin-left: 10px;
        }

        .card-custom {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
        }

        .card-title {
            font-size: 22px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <!-- Header Section -->
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Student Data</h1>
            <a href="create.php" class="btn btn-primary header-btn">Add New Student</a>
        </header>

        <!-- Session Message Alerts -->
        <?php
        session_start();
        if (isset($_SESSION["create"])) {
            ?>
            <div class="alert alert-success alert-custom">
                <?php echo $_SESSION["create"]; unset($_SESSION["create"]); ?>
            </div>
            <?php
        }

        if (isset($_SESSION["update"])) {
            ?>
            <div class="alert alert-warning alert-custom">
                <?php echo $_SESSION["update"]; unset($_SESSION["update"]); ?>
            </div>
            <?php
        }

        if (isset($_SESSION["delete"])) {
            ?>
            <div class="alert alert-danger alert-custom">
                <?php echo $_SESSION["delete"]; unset($_SESSION["delete"]); ?>
            </div>
            <?php
        }
        ?>

        <!-- Students Table Section -->
        <div class="card card-custom">
            <h5 class="card-title">All Students</h5>
            <table class="table table-bordered table-hover table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Class Name</th>
                        <th>Date of Join</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("db.php");
                    $serialNumber = 1;
                    $sql = "
                        SELECT 
                            student.id, 
                            student.name, 
                            student.email, 
                            student.address, 
                            classes.class_name, 
                            student.created_at 
                        FROM 
                            student
                        JOIN 
                            classes 
                        ON 
                            student.class_id = classes.class_id";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        die("Query Failed: " . mysqli_error($conn));
                    }

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $serialNumber++; ?></td>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["address"] ?></td>
                            <td><?php echo $row["class_name"] ?></td>
                            <td><?php echo date("F j, Y", strtotime($row["created_at"])); ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row["id"]; ?>" class="btn btn-info btn-custom">View</a>
                                <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning btn-custom">Edit</a>
                                <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-custom">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
