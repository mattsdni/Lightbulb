<?php

    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_SESSION["type"]))
        {
            if ($_SESSION["type"] == "instructor")
            {
                //get stuff from database
                
                //render instructor home page
                render("create_class_form.php");
            }
            else{
                //don't allow students to get to this page
                redirect("/");
            }
            
        }
        else{
        //don't allow students to get to this page
        redirect("/");
        }
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //process dates
        if ($_POST["start_ampm"] == "1")
        {
            $start_hour = intval($_POST["start_hour"]) + 12;
        }
        else
        {
            $start_hour = $_POST["start_hour"];
        }
        $start_time = $start_hour . ":" . $_POST["start_minute"];

        if ($_POST["end_ampm"] == "1")
        {
            $end_hour = intval($_POST["end_hour"]) + 12;
        }
        else
        {
            $end_hour = $_POST["end_hour"];
        }
        $end_time = $end_hour . ":" . $_POST["end_minute"];
        
        //add the course thing
        $added = query('INSERT INTO courses (name, subj, number, section, start, end) VALUES(?, ?, ?, ?, ?, ?)', $_POST["name"], $_POST["subject"], $_POST["number"], $_POST["section"], $start_time, $end_time);
        
        if ($added === false)
        {
            apologize("Something went wrong adding the course");
        }
        
        //get id for that course
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        
        //add course to list of ourses that this instructor teaches
        query("INSERT INTO instructor_course (instructor_id, course_id) VALUES(?,?)", $_SESSION["id"], $id);

            //everything went fine, go to list of courses
        redirect("/classes.php");
    }
?>