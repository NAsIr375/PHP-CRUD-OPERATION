<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            

            <h1 class="text-center text-primary mt-3">Registration Form</h1>

                <form action="insert.php" method="POST">

                <div class="mb-2 mt-3 ">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control">
                </div>

                <div class="mb-2">
                
                    <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-info">
                   
                </div>

                
                </form>

                <a href="home.php"style="text-decoration: none;">Home</a>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

    if(isset($_POST["submit"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        include("/Backend/htdocs/newfolder/config/connection.php");
        $sql = "INSERT INTO info (firstname, lastname, email, phone) VALUES ('$firstname', '$lastname', '$email', '$phone')";

       if(mysqli_query($conn, $sql)===TRUE){
        echo "Data insert";
        }
        else{
            echo"not inserted";
        }
      
    }

   

?>