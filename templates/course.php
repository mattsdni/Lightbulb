<link href="css/instructor_course.css" rel="stylesheet"/>

<h1><?= $course["name"] ?> <?= ($course["live"] == '0') ? "" : "(online)" ?></h1>
</br>

<?php
if ($course["live"] == "0")
{
  echo "<button class='btn btn-primary' ";
  echo 'style="margin-right: 10px;" onclick="window.location.';
  echo "href='/start_class.php?id=";
  echo $_GET["id"];
  echo "'";
  echo '">Start Class</button>';
  
}
else
{
  echo "<button class='btn btn-danger' ";
  echo 'style="margin-right: 10px;" onclick="window.location.';
  echo "href='/stop_class.php?id=";
  echo $_GET["id"];
  echo "'";
  echo '">Stop Class</button>';
}
?>
<!--<button class='btn btn-info' onclick="window.location.href='/edit_course.php?id=<?= $_GET["id"]  ?>'">Edit Course</button> -->

</br>

<!-- Display Active Students' statuses if course online -->
<?php
if ($course["live"] == "1")
{
echo '<h2 id="student-status">Student Status</h2>';
  echo '<table class="table table-bordered">';
    echo '<tbody>';
      if (isset($students))
      {
        $count = 0;
        foreach ($students as $name => $status)
        {
          if ($count % 4 == 0)
          {
            echo '<tr>';
          }
          
          echo '<td  style="padding-top: 3rem;" ';

            echo ' id="';
            echo space_to_dash($name);
            echo '"';
            echo '>';
            
            echo $name;
            echo '</td>';
          
          if ($count+1 % 4 == 0)
          {
            echo '<tr>';
          }
          $count = $count+1;
        }
      }
      
      
      
    echo '</tbody>';
  echo '</table>';
}
?>


</br>

<form class="form-horizontal" action="addStudent.php" id="add-student" method="POST">
<fieldset>




<!-- Form Name -->
<legend>Invite Student to Course</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="email">Student Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="student@example.edu" class="form-control input-md" required="">
    <input type="hidden" name="course" value="<?= $course["id"] ?>" />
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Invite</button>
  </div>
</div>

</fieldset>
</form>


<h2>Students</h2>
<ul class="list-group">
    <?php
    if (isset($students)){
      foreach ($students as $name => $status)
        {
          echo '<li class="list-group-item">';
          echo $name;
          echo '</li>';
      }
    }
    else{
      echo '<li class="list-group-item">';
          echo "(No Students)";
          echo '</li>';
    }
   ?>
</ul>

<script>

function space_to_dash(text)
{
  return text.replace(" ", "-");
}

function coursenum()
{
  var gett = window.location.search.replace("?", "");
  var reg = /id=(\d+)/;
  var match = reg.exec(gett);
  return match[1];
}
  function updateStatus()
    {
        $.ajax({
            type: 'post',
            url:'updateStudentsStatus.php',
            data: {
                course_id: coursenum()
            },
            complete: function (response)
            {
                if (response)
                {
                    var text = response.responseText;

                    //do stuff
                    if (text == null)
                    {
                        //totally broke
                    }
                    else
                    {
                      console.log(text);
                        //must have worked. tell the user?
                        var treeData = JSON.parse(text);
                        for(i = 0; i < treeData.length; i++)
                        {
                          //console.log(treeData[i]);
                          treeData[i]["name"] = space_to_dash(treeData[i]["name"]);
                          
                          $("#" + treeData[i]["name"]).removeClass();
                          
                          switch(treeData[i]["status"]) 
                          {
                            case "0":
                                $("#" + treeData[i]["name"]).addClass("getting-it");
                                break;
                            case "1":
                                $("#" + treeData[i]["name"]).addClass("unsure");
                                break;
                            case "2":
                                $("#" + treeData[i]["name"]).addClass("lost");
                                break;
                          }
                          
                          
                          
                        }
                    }
                }
            }
        });
    }
    setInterval(updateStatus, 1000);
</script>