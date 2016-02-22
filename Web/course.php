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
                //get info about course
                $course = query("SELECT * from courses WHERE id = ?", $_GET["id"])[0];
                
                //get list of students enrolled in the course
                $student_data = query("SELECT users.name, users.status, courses.id
                                    FROM student_course 
                                    INNER JOIN users ON student_course.student_id = users.id 
                                    INNER JOIN courses ON student_course.course_id = courses.id 
                                    WHERE courses.id = ?", $_GET["id"]);
                foreach($student_data as $data)
                {
                    $students[$data["name"]] = $data["status"];
                }
                
                //render instructor home page
                if (isset($students)){
                render("course.php", ["course" => $course, "students" => $students]);
                }
                else{
                    render("course.php", ["course" => $course]);
                }
            }
            else{
                
                //set stuff up for students
                $class = query("SELECT * from courses WHERE id = ?", $_GET["id"])[0];
                
                //don't allow students to get to this page
                render("class.php", ["class" => $class]);
            }
            
        }
        else{
        //don't allow students to get to this page
        redirect("/");
        }
    }
    
?>