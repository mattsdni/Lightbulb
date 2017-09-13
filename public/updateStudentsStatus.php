<?php

    /*
     * Receives an ajax request from class.php and updates the student's status
     *
     */
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //echo dump($_POST);
        // $student_data = query("SELECT users.name, users.status, courses.id
        //                             FROM student_course 
        //                             INNER JOIN users ON student_course.student_id = users.id 
        //                             INNER JOIN courses ON student_course.course_id = courses.id 
        //                             WHERE courses.id = ?", $_POST["course_id"]);
        
        $student_data = getCourseStatus($_POST["course_id"]);
        print(json_encode($student_data));
    }
    
?>