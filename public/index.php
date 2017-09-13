<?php

    // configuration
    require("../includes/config.php");
    
    if (isset($_SESSION["type"]))
    {
        if ($_SESSION["type"] == "instructor")
        {
            //get stuff from database
            $courses = query("SELECT users.id, users.name AS users, courses.* FROM instructor_course INNER JOIN users ON instructor_course.instructor_id = users.id INNER JOIN courses ON instructor_course.course_id = courses.id WHERE users.id = ?", $_SESSION['id']);
            
            //dump($courses);
            foreach($courses as $course)
            {
                $list[$course["name"]] = $course["id"];
            }
            if (isset($list))
            {
                $_SESSION["courses"] = $list;
            }
            //dump($_SESSION);

            //render instructor home page
            render("instructor.php");
        }
        else if ($_SESSION ["type"] == "student")
        {
            //get stuff from database
            $courses = query("SELECT users.id, users.name AS users, courses.* FROM student_course INNER JOIN users ON student_course.student_id = users.id INNER JOIN courses ON student_course.course_id = courses.id WHERE users.id = ?", $_SESSION['id']);
            
            
            //dump($courses);
            if (isset($courses))
            {
                foreach($courses as $course)
                {
                    $list[$course["name"]] = $course["id"];
                }
            }
            
            if (isset($list))
            {
                $_SESSION["courses"] = $list;
            }
            //dump($_SESSION["courses"]);
            
            //render student home page
            render("student.php", ["classes" => $courses]);
        }
    }
    else{
    
        // render landing page
        require("../templates/landing.php");    
    }
?>