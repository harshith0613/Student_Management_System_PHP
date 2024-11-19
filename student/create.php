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
            <h1>Add Student Details</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post" enctype="multipart/form-data">
            
            <div class="form-element my-4">
                <input type="file" class="form-control" name="image" required>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="name" placeholder="Enter Name:" required>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="email" placeholder="Email:" required>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="address" placeholder="Enter Address:" required>
            </div>

            <div class="form-element my-4">
                <select name="class" class="form-control" required>
                    <option value="">Select Class</option>
                    <option value="1">6</option>
                    <option value="2">7</option>
                    <option value="3">8</option>
                    <option value="4">9</option>
                    <option value="5">10</option>
                </select>
            </div>

            <!-- <div class="form-element my-4">
                <input type="text" class="form-control" name="Description" placeholder="Enter Description:">
            </div> -->
            <div class="form-element">
                <input type="submit" class="btn btn-success" name="create" value="Add book">
            </div>
        </form>
    </div>
</body>
</html>