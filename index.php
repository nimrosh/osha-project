<?php 
    session_start();
    $connect = mysqli_connect('osha-hazard.csncxjd6amv0.us-east-1.rds.amazonaws.com', 'admin', '9zg5b1n!', 'webdata')
        or die("Problems connecting to Database.");
    $username = $password = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $username = mysqli_real_escape_string($connect,$_POST['uname']);
        $password = mysqli_real_escape_string($connect,$_POST['pword']); 

        $sql = "SELECT userID, userEmail, userPass FROM user WHERE userEmail = '".$username."' AND userPass = '".$password."'";
        $result = mysqli_query($connect,$sql);
        $count = mysqli_num_rows($result);
          
        if($count == 1) {
           $row = mysqli_fetch_assoc($result);
           $active = $row['userID'];
           $_SESSION['userID'] = $active;

           header("location: welcome.php");
        } else {
           $error = "Your Login Name or Password is invalid";
           echo $error;
        }  
    } 
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title> OSHA HAZARD IDENTIFICATION </title>
    
    <!--CSS & FONT LINKS-->
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&family=Rubik:wght@300;400&display=swap" rel="stylesheet">

    <!--FONT AWESOME-->
     <script src="https://kit.fontawesome.com/878cfd8419.js" crossorigin="anonymous"></script>

     <script src="js/jquery-3.5.1.min.js"></script>     
</head>
<body>
    <div class="flex-container">
        <div class="flex-item">
        <h1 id="title"> OSHA<br>HAZARD<br>IDENTIFICATION </h1>
        </div>
        <div class="flex-item">
        <div style="border:1px solid black;display:inline-block;padding-top:45px;">
        <button id="login"><p><i class="fab fa-google"></i> Sign in with Google</p></button>
        <form method="post">
                <div class="signinp">
                    <label for="uname">Email</label><br>
                    <input type="text" id="uname" name="uname">
                </div>
                <div class="signinp">
                    <label for="pword">Password</label><br>
                    <input type="password" id="pword" name="pword">
                </div>
                <div class="signinp">
                    <input type="submit" value="Sign in" class="btn" style="margin: 0px;"><br>
                </div>
        </form>
        </div>
        </div>
    </div>
    
</body>

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-firestore.js"></script>

    <script src="js/variables.js"></script>
    <script src="js/script.js"></script>    
    <script src="js/welcome.js"></script>
    <script src ="js/firebase.js"></script>

</html>
