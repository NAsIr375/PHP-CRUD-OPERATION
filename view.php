<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <?php

                include("/Backend/htdocs/newfolder/config/connection.php");

                $sql = "SELECT * FROM info";
                $query = mysqli_query($conn, $sql);

                echo"
                
                <table class='mt-5 table table-bordered text-center'>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                
                
                
                
                ";

                while ($data = mysqli_fetch_assoc($query)) {
                    $id = $data["id"];
                    $firstname = $data["firstname"];
                    $lastname = $data["lastname"];
                    $email = $data["email"];
                    $phone = $data["phone"];

                    // check
                    // echo $id. " " .$firstname." ".$lastname." ".$email."";
                    
                    echo "
                    
                    <tr>
                    
                    <td>$id</td>
                    <td>$firstname</td>
                    <td>$lastname</td>
                    <td>$email</td>
                    <td>$phone</td>
                   
                    <td>

                       
                        <span >
                        <a href='edit.php ?id=$id' class='btn btn-success text-white text-decoration-none'> Edit </a>
                        </span>

                        <span>
                        <a href='view.php ? deleteid=$id' class='btn btn-danger text-white text-decoration-none'> Delete </a>
                        </span>
                    
                    
                    </td>

                    
                    
                    
                    </tr>
                    
                    
                    ";

                }
                
   

            ?>
            <a href="home.php"style="text-decoration: none;">Home</a>
        
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

                if(isset($_GET["deleteid"])){
                    $deleteid = $_GET["deleteid"];

                    $sql = "DELETE FROM  info WHERE id = '$deleteid' ";

                    if(mysqli_query($conn,$sql)===TRUE){

                        // header('location: view.php');

                    }

                }



?>