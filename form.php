<!-- connection between database and form -->
<?php
$insertconf = false;
if(isset($_POST['Name'])){
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "day_17_5_3_2024"; // Replace space with underscore

    $con = mysqli_connect($server, $user, $password, $dbname);

    if(!$con){ // Corrected condition
        die("Connection with database not happening due to " . mysqli_connect_error());
    }

    $name = $_POST['Name'];
    $dob = $_POST['DOB'];
    $gender = $_POST['Gender'];
    $age = $_POST['Age'];

    $sql_query = "INSERT INTO `sql_intro` (`Name`, `DOB`, `Gender`, `Age`) VALUES ('$name', '$dob', '$gender', '$age')";

    if($con->query($sql_query) == true){
        $insertconf = true;
    }else{
        echo "ERROR: $sql_query <br> " . $con->error;
    }
    $con->close();
}
?>
<!-- create form to store user data in database -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample form for SQL</title>
    <style>
        body{
            background-color: beige;
            color: cornflowerblue;
        }
        .container{
            text-align: center;
        }
        input, textarea{
            margin-bottom: 8px;
        }
        #confirm h1{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- emoji codes are used like "&#128508;"
        get from the website -->
        <h1>Welcome to this site &#128508;.</h1>
        <p>Please fill in the below details &#128516;.</p>
    </div>
    <div class="container"> <!-- Changed class to 'container' -->
        <?php
        if($insertconf == true){
            echo "<h1>Thank you for filling &#128509;.</h1>";
        }
        ?>
    </div>
    <div>
        <form action="" method="post" style="text-align: center;">
            <input type="text" name="Name" id="name" placeholder="Enter your name" required><br>
            <input type="date" name="DOB" id="dob" placeholder="Date of Birth" required><br>
            <input type="text" name="Gender" id="gender" placeholder="Gender" required><br>
            <input type="text" name="Age" id="age" placeholder="Enter your age" required><br>
            <button type="submit" id="submitBtn" style="display: none;">Submit</button>
            <button type="reset">Reset</button>
        </form>
    </div>

    <script>
        var ageInput = document.getElementById('age'); // Changed id to 'age'
        var submitBtn = document.getElementById('submitBtn');
        ageInput.addEventListener('input', function(){
            //to set visible of submit button with if condition
            if(ageInput.value.trim().length > 0){
                submitBtn.style.display = 'inline';
            }else{
                submitBtn.style.display = 'none';
            }
        })
    </script>
</body>
</html>
