<?php

    /*
     * This file automatically adds a student to a class if they have an account on the site
     * (based on their email address)
     *
     */
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $student = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
        
        //make sure there is a student with that email address
        if (count($student) == 1)
        {
            $exists = query("SELECT * FROM student_course WHERE student_id = ? and course_id = ?", $student[0]["id"], $_POST["course"] );
            if (count($exists) == 0)
            {
                query("INSERT into student_course (student_id, course_id) VALUES(" . $student[0]["id"] . ", " . $_POST["course"] . ")");
                query("INSERT into student_course_status (student_id, course_id, status) VALUES(?,?,0)", $student[0]["id"], $_POST["course"]);
            }
        }
        $url = "/course.php?id=" . $_POST['course'];
        redirect($url);
    }
    
?>