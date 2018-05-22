<?php
$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "mbrooks3", "mbrooks3", "mbrooks3");

# Author: Andrew Peterson

#sanity check
if (mysqli_connect_errno()) {
    exit("Error - could not connect to MySQL");
}

$cardio_machine = htmlspecialchars($_GET['cardio_id']);
$weight_machine = htmlspecialchars($_GET['weights_id']);
$cardio_machine = mysqli_real_escape_string($db, $cardio_machine);
$weight_machine = mysqli_real_escape_string($db, $weight_machine);
$time = 12.00; # this is for testing. Can add comment and un comment below to use current hour.
#$time = date('G'); # Un commenting this will make time be the current time 1-24.
#$minutes = date('i');
#$minutes = $minutes/60; # sets minutes equal to a decimal. .5 would be 30 minutes.
#$time = $time + minutes;

# If true, than that means the machine you clicked on was a cardio machine. It will show relevant info for that machine.
# If false, it will show relevant information for the weight room machine chosen.
if ($cardio_machine > 0) {
    $constructed_query = "SELECT * FROM Machines WHERE machine_id = '$cardio_machine';";
    $result = mysqli_query($db, $constructed_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $machine_name_array = mysqli_fetch_array($result);

    if ($time >= 22 || $time <= 6) {
        echo "<div class='machine'>
        <p><b>The Gym is not open yet. Check back in at 7am.</b></p>
        </div>";
    }
# Now we will look to see if the machine is being used.  For demo - the time will be 12:40pm
    $used_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$time';";
    $result = mysqli_query($db, $used_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $used_machine_array = mysqli_fetch_array($result);

    if (empty($used_machine_array) == false) {
        echo "<div class='machine'>
            <p>Machine name: $machine_name_array[machine_name]</p>
            <p>Machine is being used by:  $used_machine_array[student_id]</p>
        </div>";
        # Add next available time info here
        #$next_time = $time;
        $next_time = round($time) + .50;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);

            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array) == false) {
                #keep looping
                #$next_time = $next_time + 1;
                $next_time = $next_time + .5;
                #$counter = $counter + 1;
                $counter = $counter + .5;
            } else {
                # exit loop
                $counter = 22;

            }
        }
        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            #just changes the time from showing 0 to 12
            if ($next_time == 0.5) {
                $next_time = 12.5;
            }
            if ($next_time == 0.0) {
                $next_time = 12;
            }
            echo "<div class='machine'>
            <p>The next available time is: $next_time PM (2.5pm  == 2:30pm) </p>
        </div>";
        } else {
            echo "<div class='machine'>
            <p>The next available time is: $next_time AM. (2.5am  == 2:30am) </p>
        </div>";
        }

    } else {
        # add search to find the next hour that it is busy till.
        #$next_time = $time + 1;
        $next_time = round($time) + .5;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$cardio_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);
            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array)) {
                #keep looping
                #$next_time = $next_time + 1;
                $next_time = $next_time + .5;
                #$counter = $counter + 1;
                $counter = $counter + .5;
            } else {
                # exit loop
                $counter = 22;

            }
        }
        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            #just changes the time from showing 0 to 12
            if ($next_time == 0.5) {
                $next_time = 12.5;
            }
            if ($next_time == 0.0) {
                $next_time = 12;
            }
            echo "<div class='machine'>
            <p>Machine name: $machine_name_array[machine_name]</p>
            <p>There is nobody using this machine right now.<br /> <span class='register_link'>Click the machine you are hovering over to register for this machine right now!</span> </p>
            <p>The machine is available until: $next_time PM (2.5pm  == 2:30pm)</p>
        </div>";
        } else {
            echo "<div class='machine'>
            <p>Machine name: $machine_name_array[machine_name]</p>
            <p>There is nobody using this machine right now.<br /> <span class='register_link'>Click the machine you are hovering over to register for this machine right now!</span> </p>
            <p>The machine is available until: $next_time AM. (2.5am  == 2:30am)</p>
        </div>";
        }
    }

} else {
    $constructed_query = "SELECT * FROM Machines WHERE machine_id = '$weight_machine';";
    $result = mysqli_query($db, $constructed_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $machine_name_array = mysqli_fetch_array($result);
    if ($time >= 22 || $time <= 6) {
        echo "<div class='machine'>
        <p><b>The Gym is not open yet. Check back in at 7am.</b></p>
        </div>";
    }
# Now we will look to see if the machine is being used.  For demo - the time will be 10:00am
    $used_query = "SELECT * FROM Schedule WHERE machine_id = '$weight_machine' AND time_block = '$time';";
    $result = mysqli_query($db, $used_query);

    if (!$result) {
        print("Error - query could not be executed");
        $error = mysqli_error($db);
        print "<p> . $error . </p>";
        exit;
    }

    $used_machine_array = mysqli_fetch_array($result);

    if (empty($used_machine_array) == false) {
        echo "<div class='machine'>
            <p>Machine name: $machine_name_array[machine_name]</p>
            <p>Machine is being used by:  $used_machine_array[student_id]</p>
        </div>";
        # Add next available time info here
        #$next_time = $time + 1;
        $next_time = round($time) + .5;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$weight_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);
            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array) == false) {
                #keep looping
                #$next_time = $next_time + 1;
                $next_time = $next_time + .5;
                #$counter = $counter + 1;
                $counter = $counter + .5;
            } else {
                # exit loop
                $counter = 22;

            }
        }

        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            #just changes the time from showing 0 to 12
            if ($next_time == 0.5) {
                $next_time = 12.5;
            }
            if ($next_time == 0.0) {
                $next_time = 12;
            }
            echo "<div class='machine'>
            <p>The next available time is: $next_time PM. (2.5pm  == 2:30pm) </p>
        </div>";
        } else {
            echo "<div class='machine'>
            <p>The next available time is: $next_time AM. (2.5am  == 2:30am)</p>
        </div>";
        }

    } else {
        # add search to find the next hour that it is busy till.
        #$next_time = $time + 1;
        $next_time = round($time) + .5;
        $counter = $next_time;
        while ($counter < 22) {
            $next_avail_query = "SELECT * FROM Schedule WHERE machine_id = '$weight_machine' AND time_block = '$next_time';";
            $result = mysqli_query($db, $next_avail_query);
            if (!$result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $next_time_array = mysqli_fetch_array($result);

            if (empty($next_time_array)) {
                #keep looping
                #$next_time = $next_time + 1;
                $next_time = $next_time + .5;
                #$counter = $counter + 1;
                $counter = $counter + .5;
            } else {
                # exit loop
                $counter = 22;

            }
        }
        #Checks to see if the time is pm or am.
        if ($next_time > 12) {
            $next_time = $next_time - 12;
            #just changes the time from showing 0 to 12
            if ($next_time == 0.5) {
                $next_time = 12.5;
            }
            if ($next_time == 0.0) {
                $next_time = 12;
            }
            echo "<div class='machine'>
            <p>Machine name: $machine_name_array[machine_name]</p>
            <p>There is nobody using this machine right now.<br /> <span class='register_link'>Click the machine you are hovering over to register for this machine right now!</span> </p>
            <p>The machine is available until: $next_time PM (2.5pm  == 2:30pm)</p>
       </div>";
        } else {

            echo "<div class='machine'>
            <p>Machine name: $machine_name_array[machine_name]</p>
            <p>There is nobody using this machine right now.<br /> <span class='register_link'>Click the machine you are hovering over to register for this machine right now!</span> </p>
            <p>The machine is available until: $next_time AM. (2.5am  == 2:30am)</p>
       </div>";
        }
    }
}
