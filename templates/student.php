<?php
    echo '<h1>Hello, ';
    echo $_SESSION['name'];
    echo '</h1>';
?>
</br></br>

<?php
if (count($classes) == 0)
{
    echo "<h3>You don't have any classes currently.</h3>";
}
else{
    echo "<h3>Here's a list of your classes</h3>";
}
echo '<ul class="list-group">';
for ($i = 0; $i < count($classes); $i++)
{
    echo '<li class="list-group-item">';
    echo '<a href="/course.php?id=';
    print $classes[$i]["id"];
    echo '">';
    print $classes[$i]["name"];
    echo '</a>';
    echo '</li>';
}
?>