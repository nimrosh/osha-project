<?php
    session_start();
    $connect = mysqli_connect('osha-hazard.csncxjd6amv0.us-east-1.rds.amazonaws.com', 'admin', '9zg5b1n!', 'webdata')
        or die("Problems connecting to Database.");
    //$uname=$_COOKIE['email'];
    $uID = $_SESSION['userID'];
    $date = $_COOKIE['sDate'];
    $_SESSION['sDate'] = $date;
    $pdate = $_SESSION['sDate'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title> OSHA HAZARD IDENTIFICATION </title>
    
    <!--CSS & FONT LINKS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&family=Rubik:wght@300;400&display=swap" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
</head>
<body>

    <!--ADDED CODE-->
    <input type="button" id="logoutHazard" class="btn" value="SIGN OUT"> 
    <input type="button" id="back" class="btn" value="DATES">
    <h1 id="heading"></h1>
    <!--<div class="scans"-->
    <div class="scans">
        <?php 
            $iquery = "select S.scanID, S.scanName from scan as S, user as U, user_scan as US 
                where S.scanID = US.scanID and US.userID = U.userID and 
                U.userID = ".$uID." and S.scanDate = '".$pdate."'";
            $result = mysqli_query($connect, $iquery)
                or die(mysqli_error($connect));
            echo '<div class="container">';
                echo '<div class="row">';
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            $name = $row['scanName'];
                            echo '<div onclick=scanClick(this.id) class="col-sm-4 scanBTN mx-auto dropdown" id="'.$row['scanID'].'">';
                                echo $name;
                            echo '</div>';
                        }
                    }
                echo '</div>';
            echo '</div>';
            
        ?>
    </div>
    <div class="hazards" hidden>
        
    </div>
    <!---->
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
    <script src="js/hazard.js"></script>
    <script src ="js/firebase.js"></script>

</html>
