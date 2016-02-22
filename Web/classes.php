<?php

    /*
     * This file displays the list of courses that an instructor has
     *
     */
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_SESSION["type"]))
        {
            if ($_SESSION["type"] == "instructor")
            {
                //get stuff from database
                //get all courses that the logged in instructor teaches
                $courses = query("SELECT users.id, users.name users, courses.*
                                    FROM instructor_course 
                                    INNER JOIN users ON instructor_course.instructor_id = users.id 
                                    INNER JOIN courses ON instructor_course.course_id = courses.id 
                                    WHERE users.id = ?", $_SESSION['id']);

                //render instructor home page
                render("classes.php", ["courses" => $courses]);
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
    
?>