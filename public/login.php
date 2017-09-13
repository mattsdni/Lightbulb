<?php

    // configuration
    require("../includes/config.php");

    // user reached page via link
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        nobar_render("login_form.php", ["title" => "Log In"]);
    }

    // user reached page form submit
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            //username was blank
            apologize("email was blank");
        }
        else if (empty($_POST["password"]))
        {
            //password was blank
            apologize("password was blank.");
        }

        
        // query database for user
        $rows = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
        
        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
                $_SESSION["type"] = $row["type"];
                $_SESSION["name"] = $row["name"];

                // redirect to home
                redirect("/");
            }
        }

        // if you get here then you got a bad username or pass
        apologize("Bad Username or Password. Double check your email and password spelling.");
    }
    
?>