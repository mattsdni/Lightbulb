<h1>Create a Class</h1>

<p>You can fill out this form to add a class to your account. After the class is created, it will be available 
in the classes list. From there you can invite students to your class.</p>

<form class="form-horizontal" action="create_class.php" method="post">
<fieldset>

<!-- Form Name -->
<legend></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Class Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Intro to Physics" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="number">Number</label>  
  <div class="col-md-4">
  <input id="number" name="number" type="text" placeholder="101" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="subject">Subject</label>  
  <div class="col-md-4">
  <input id="subject" name="subject" type="text" placeholder="PHYS" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="section">Section</label>  
  <div class="col-md-4">
  <input id="section" name="section" type="text" placeholder="01" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="start_hour">Start Time (hour)</label>
  <div class="col-md-1">
    <select id="start_hour" name="start_hour" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="start_minute">Start Time (minute)</label>
  <div class="col-md-2">
    <select id="start_minute" name="start_minute" class="form-control">
      <option value="00">:00</option>
      <option value="05">:05</option>
      <option value="10">:10</option>
      <option value="15">:15</option>
      <option value="20">:20</option>
      <option value="25">:25</option>
      <option value="30">:30</option>
      <option value="35">:35</option>
      <option value="40">:40</option>
      <option value="45">:45</option>
      <option value="50">:50</option>
      <option value="55">:55</option>
    </select>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="start_ampm">AM/PM</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="start_ampm-0">
      <input type="radio" name="start_ampm" id="start_ampm-0" value="0" checked="checked">
      AM
    </label> 
    <label class="radio-inline" for="start_ampm-1">
      <input type="radio" name="start_ampm" id="start_ampm-1" value="1">
      PM
    </label>
  </div>
</div>







<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="start_hour">End Time (hour)</label>
  <div class="col-md-1">
    <select id="end_hour" name="end_hour" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="start_minute">End Time (minute)</label>
  <div class="col-md-2">
    <select id="end_minute" name="end_minute" class="form-control">
      <option value="00">:00</option>
      <option value="05">:05</option>
      <option value="10">:10</option>
      <option value="15">:15</option>
      <option value="20">:20</option>
      <option value="25">:25</option>
      <option value="30">:30</option>
      <option value="35">:35</option>
      <option value="40">:40</option>
      <option value="45">:45</option>
      <option value="50">:50</option>
      <option value="55">:55</option>
    </select>
  </div>
</div>


<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="end_ampm">End Time</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="end_ampm-0">
      <input type="radio" name="end_ampm" id="end_ampm-0" value="0" checked="checked">
      AM
    </label> 
    <label class="radio-inline" for="end_ampm-1">
      <input type="radio" name="end_ampm" id="end_ampm-1" value="1">
      PM
    </label>
  </div>
</div>




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Create Class</button>
  </div>
</div>

</fieldset>
</form>
