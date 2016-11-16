<?php 

 include 'dbFunction.php';
include_once 'dbConnect.php';
//echo $_SESSION['username'];
if(!isset($_SESSION['username']))
  {header('Location: index.html');}
$funObj = new dbFunction($conn);
  if(isset($_POST['submitm']))
  {
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$funobj = new dbFunction($conn);
include_once 'dbConnect.php';

 {

    //echo "string";
    $designation = $_POST['designation'];
    $linkgp = $_POST['linkgp'];
    $linklin = $_POST['linklin'];
    $linktw = $_POST['linktw'];
    $linkfb = $_POST['linkfb'];
    $end_year = $_POST['end_year'];
    $start_year = $_POST['start_year'];
    $name = $_POST['username'];

    $targetDir = "propics/";
    $targetFile = $targetDir.basename($name.".jpg");

    if(move_uploaded_file($_FILES['photo_path']['tmp_name'], $targetFile)){
    
      
      $data['name']= $name;
      $data['start_year']= $start_year;
      $data['end_year']= $end_year;
      $data['linkgp']= $linkgp;
      $data['linkfb']= $linkfb;
      $data['linktw']= $linktw;
      $data['linklin']= $linklin;
      $data['designation']= $designation;
      $data['photo_path']= $targetFile;

      $funobj->addMember($data);

    }else {
      echo "File Not Uploaded<br>";
    }

    //echo $title."<br>".$desc;
  }
}

  if (isset($_POST['submit']))

  {
    $funobj = new dbFunction($conn);
    include_once 'dbConnect.php';
    $data['name'] = $_POST['event_name'];
    $data['desc'] = $_POST['event_desc'];
    $data['date'] = $_POST['event_date'];
    $data['conductor1'] = $_POST['event_conductor1'];
    $data['conductor2'] = $_POST['event_conductor2'];

    $targetDir = "eventpics/";
    $targetFile = $targetDir.basename($data['name'].".jpg");

    if(move_uploaded_file($_FILES['photo_path']['tmp_name'], $targetFile)){
     // echo "string9";
      $data['photo_path'] = $targetFile;
       $funobj->addEvent($data);

    }
    else {
      echo "File Not Uploaded<br>";
    }
  }

  

 

?>
<html>
<head>
  <meta charset="utf-8">
    
    <link rel="stylesheet" href="style.css">

</head>
<body style="background: #2c3338;
  color: #606468;">
   <div id="login" class="col-md-4">
 
      <form name='form-login' method="post" action="" enctype="multipart/form-data">

       
          <input type="text" id="member" name= "username"  placeholder="Name" required="required">
           
            <input style="width :45%" type="text" name="start_year" placeholder="start_year" required="required">
         <input style="width :45%" type="text" id="member" name= "end_year"  placeholder="End Year" required="required">
          
          <input style="width :45%" type="text" id="linkfb" name= "linkfb"  placeholder="Facebook_Link">
          <input style="width :45%" type="text" id="linktw" name= "linktw"  placeholder="Twitter_Link" inline>
          <input style="width :45%" type="text" id="linklin" name= "linklin"  placeholder="Linkedin_Link">
           <input style="width :45%" type="text" id="linkgp" name= "linkgp"  placeholder="Googleplus_Link">
            <input  type="text" name="designation" placeholder="Designation" required="required">

          <input type="file"  name="photo_path" required="required">
        <input type="submit" value="Submit" name="submitm" id="submitmember">
         

      </form>
   
    </div>


    <div id="login" class="col-md-4">
 
      <form name='form-login' method="post" action="" enctype="multipart/form-data" >

       
        <input type="text"  name= "event_name"  placeholder="Event Name" required="required">
        <input type="text"  name= "event_desc"  placeholder="Event Description" required="required">
        <input type="date"  name= "event_date"  placeholder="Date" required="required">
        <input type="text"  name= "event_conductor1"  placeholder="conductor1" required="required">
        <input type="text"  name= "event_conductor2"  placeholder="conductor2" required="required"> 
        <input type="file"  name="photo_path" required="required">  
        <input type="submit" value="Submit" name="submit">
         

      </form>
   
    </div>
</body>
   
</html>