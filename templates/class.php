<!-- Custom styles for this template -->
<link href="css/student_class.css" rel="stylesheet">

<h1><?= $class["name"] ?><?= ($class["live"] == '0') ? " (offline)" : " (online)" ?></h1>
</br>

<?php
//display the status selectors if the class is online
if ($class["live"] == '1')
{
    
echo '<form class="form-horizontal">
<fieldset>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type="button" onclick="updateStatus(0)" id="getting" name="singlebutton" class="btn btn-block btn-success">Getting It</button>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type="button" onclick="updateStatus(1)" id="unsure" name="singlebutton" class="btn btn-block btn-warning">Unsure</button>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type="button" onclick="updateStatus(2)" id="lost" name="singlebutton" class="btn btn-block btn-danger">Lost</button>
  </div>
</div>

</fieldset>
</form>';
    
    
}

?>

<script>

function coursenum()
{
  var gett = window.location.search.replace("?", "");
  var reg = /id=(\d+)/;
  var match = reg.exec(gett);
  return match[1];
}

$('form').submit(false);
    function updateStatus(code)
    {
      switch (code)
      {
        case 0:
          $("#getting").addClass("selected");
          $("#unsure").removeClass("selected");
          $("#lost").removeClass("selected");
          break;
        case 1:
          $("#getting").removeClass("selected");
          $("#unsure").addClass("selected");
          $("#lost").removeClass("selected");
          break;
        case 2:
          $("#getting").removeClass("selected");
          $("#unsure").removeClass("selected");
          $("#lost").addClass("selected");
          break;
        
      }
        $.ajax({
            type: 'post',
            url:'updateStatus.php',
            data: {
                source1: code,
                c_num: coursenum()
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
                        //must have worked. tell the user?
                         //document.getElementById("mytext").innerHTML = text;
                    }
                }
            }
        });
    }
</script>
