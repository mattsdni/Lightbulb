<h1>Classes You Teach</h1>


<ul class="list-group">
<?php
for ($i = 0; $i < count($courses); $i++)
{
    echo '<li class="list-group-item">';
    echo '<a href="/course.php?id=';
    print $courses[$i]["id"];
    echo '">';
    print $courses[$i]["name"];
    echo '</a>';
    echo '</li>';
}
?>

