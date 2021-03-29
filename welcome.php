<?php
session_start();
$connect = mysqli_connect('osha-hazard.csncxjd6amv0.us-east-1.rds.amazonaws.com', 'admin', '9zg5b1n!', 'webdata');

if ($connect) {
    if(isset($_SESSION['userID'])){
        $uID = $_SESSION['userID'];
    }
    
} else {
    echo "not connected ";
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title> Welcome! </title>
    
    <!--CSS & FONT LINKS-->
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&family=Rubik:wght@300;400&display=swap" rel="stylesheet">
    <!--FONT AWESOME-->
     <script src="https://kit.fontawesome.com/878cfd8419.js" crossorigin="anonymous"></script>

     <script src="js/jquery-3.5.1.min.js"></script>

</head>
<body>
    <input type="button" id="logout" class = "btn" value="SIGN OUT"> 
    <h1 id="welcomeTitle"></h1>
    <div id="dates">
        <table style="margin: auto;">
            <tbody style="font-family:Oswald; font-size: 30px; text-align: center;">
                <?php
                    $quer = "select * from user as U, user_scan as US, scan as S 
                            where U.userID = ".$uID." and U.userID = US.userID and US.scanID = S.scanID";
                    $result = mysqli_query($connect, $quer);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $date = $row['scanDate'];
                            echo "<tr style='height:90px'>";
                                echo "<td>".$date."</td>";
                                echo "<td><button onclick='dateClick(this.id)' id='".$date."' style='border-radius:8px; background-color:white; border-color:black; outline:none; onclick'><i class='fas fa-angle-double-right' style='color:black; font-size: 18px;'></i></button></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
  
    <?php
    
    /*
    if(isset($_SESSION["uname"])){
        $uname =(json_decode($_POST["uname"]));
        $sql = mysqli_query($connect, "SELECT * from user WHERE userEmail = '.$uname.'")
                            or die(mysqli_error($connect));
        if(mysqli_num_rows($sql) === 1){
           exit('This email is in the Database');
        }
        else if(mysqli_num_rows($sql) === 0){
           // $sql_email = "INSERT INTO user(userEmail) VALUES ('$uname')";
            //$query = mysqli_query($connect, $sql_email);
            echo "Adding the username to table";
        }
        else{
            echo 'There was an error';
        }
    }
    */
        
    $scanDate ="SELECT DISTINCT scanDate FROM scan";
    $array = array();

    if($result = mysqli_query($connect, $scanDate)){
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)){
            $array[] = $row['scanDate'];
        }
     }
    }
    ?>
    

</body>

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-firestore.js"></script>

    <script type="text/javascript"> var jArray =<?php echo json_encode($array); ?>
    </script>
    <script src="js/variables.js"></script>
    <script src="js/script.js"></script>
    <script src="js/welcome.js"></script>
    <script src ="js/firebase.js"></script>


</html>
