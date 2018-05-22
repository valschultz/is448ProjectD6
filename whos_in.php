<!DOCTYPE html>
<html lang="EN">

<!--Author: Andrew Peterson	-->
<?php
#checks the session. Will redirect to the login page if there is no session user id.
#comment out the session checking if testing
session_start();
if ($_SESSION['login_user']) {
} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectModified/Registration.html");
}
?>
<head>
    <title>View available machines | Collaborate</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="whos_in.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
    <link rel="stylesheet" type="text/css" href="mockup.css" />
</head>

<body>

    <p>
        <a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
            <img src="UMBCretrievers.jpg" alt="UMBC retriever" height="150" />
        </a>
    </p>


    <div class="menu">
        <a class="menu_link" href="https://swe.umbc.edu/~mbrooks3/is448/project3/studenthomepage.php">
            My Page
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~andrewp2/is448/is448ProjectD6/whos_in.php">
            See Who's In
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule_home.php">
            Today's Schedule
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            Equipment Registration
        </a>
        <br />
        <br />
        <a class="menu_link" href="https://swe.umbc.edu/~schultz4/is448/projectFinal/logout.php">
            Log-Out
        </a>
    </div>


    <div class="whos_in_intro">
        <h1>Who's in the gym? </h1>
        <h2>View the available machines below.</h2>
        <p>
            Use this page to view open machines and make sure you get a machine next to your friend.
        </p>
        <p>
        <?php echo "<i>The current time is: </i>" . date("h:i:sa") . ". "; ?>
            For the demo, the time set to 12pm.
        </p>
    </div>

    <div class="info_spot" id="info">

    </div>
    <div class="whos_in_cardio">
        <hr />
        <h2>Cardio Balcony</h2>
        <!-- The amount of tread mills and ellipticals given to us.-->
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_1"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_2"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_3"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_4"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_5"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_6"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_7"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="cardio_recs" id="cr_8"></div>
        </a>
    </div>
    <div class="whos_in_weight_room">
        <br />
        <hr />

        <h2>Weight Room</h2>
        <!-- The amount of squat racks and bench presses given to us.-->
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="weight_room_recs" id="wrr_1"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="weight_room_recs" id="wrr_2"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="weight_room_recs" id="wrr_3"></div>
        </a>
        <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
            <div class="weight_room_recs" id="wrr_4"></div>
        </a>
    </div>

</body>

</html>