<?php

    // configuration
    require("../includes/config.php");

        // query database for user
        $rows = query("SELECT * FROM users WHERE email = ?", "student@school.edu");

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $row["id"];
            $_SESSION["type"] = $row["type"];
            $_SESSION["name"] = $row["name"];

            // redirect to home
            redirect("/");
        }


?>
