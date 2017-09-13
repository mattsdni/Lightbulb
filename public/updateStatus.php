<?php

    /*
     * Receives an ajax request from class.php and updates the student's status
     *
     */
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //query("UPDATE users SET status = ? WHERE id = ?", $_POST["source1"], $_SESSION["id"]);
        updateStatus($_SESSION["id"], $_POST["c_num"], $_POST["source1"]);
        echo $_POST["source1"];
    }
    
?>