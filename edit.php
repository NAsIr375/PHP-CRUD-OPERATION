<?php

include("/Backend/htdocs/newfolder/config/connection.php");

$firstname = $lastname = $email = $phone = "";
$id = "";

// Check if ID is provided in the GET request
if (isset($_GET["id"])) { 
    $id = $_GET["id"];
    $sql = "SELECT * FROM info WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($data = mysqli_fetch_assoc($query)) {
        $firstname = $data["firstname"];
        $lastname = $data["lastname"];
        $email = $data["email"];
        $phone = $data["phone"];
    }
}

// Update data
if (isset($_POST["update"])) {
    $id = $_POST["id"]; // Corrected ID assignment
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Validate ID before updating
    if (!empty($id) && is_numeric($id)) {
        $sql = "UPDATE info SET 
            firstname = '$firstname',
            lastname = '$lastname',
            email = '$email',
            phone = '$phone'
            WHERE id = '$id'";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "Data updated successfully";
        } else {
            echo "Update failed: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid ID";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Form</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-primary mt-3">Update Form</h1>

                <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                    <div class="mb-2 mt-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo htmlspecialchars($firstname); ?>" required>
                    </div>

                    <div class="mb-2">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo htmlspecialchars($lastname); ?>" required>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>

                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" required>
                    </div>

                    <div class="mb-2">
                        <input type="submit" value="Update" name="update" class="btn btn-info">
                    </div>
                </form>
                <a href="view.php" style="text-decoration: none;">Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
