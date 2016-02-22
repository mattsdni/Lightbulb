<?php

    // configuration
    require("../includes/config.php"); 

    //reset student status to 0
    
    
    // log out current user, if any
    logout();

    // redirect user
    redirect("/");

?>
