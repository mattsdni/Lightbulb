<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        nobar_render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_GET["type"]))
        {
            $type = $_GET["type"];
        }
        else{
            $type = "student";
        }
        // register the user and log them in
        //validate fields
        if (empty($_POST["email"]) || empty($_POST["password"] || empty($_POST["name"])))
        {
            apologize("You must fill out all the fields.");
        }
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords do not match.");
        }
        
        
        //everything looks good. add to database
        $didRegister = query("INSERT INTO users (name, email, hash, type) VALUES(?, ?, ?, ?)", $_POST["name"], $_POST["email"], crypt($_POST["password"]), $type);
        if ($didRegister === false)
        {
            apologize("Username already taken.");
        }
        
        //remember who just registered and log them in
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $user = query("SELECT * from users WHERE id=?", $id)[0];
        $_SESSION["id"] = $id;
        $_SESSION["type"] = $user["type"];
        $_SESSION["name"] = $user["name"];
        redirect("index.php");
    }

?>
