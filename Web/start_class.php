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
                //set live to 1 for the class
                query("UPDATE courses SET live=1 WHERE id = ?", $_GET["id"]);
                
                //redirect to class page
                $url = "/course.php?id=" . $_GET["id"];
                redirect($url);
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