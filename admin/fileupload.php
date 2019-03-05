<?php
   include('dashboard.php');
   ?>
<?php
 include_once 'conn.php';
 session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['manager']))){
header("location:admin.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'conn.php';

}?>

<?php
if(isset($_POST["submit"])){
$courses = $_POST["cour"];
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["pdf_file"]["name"];
move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/pdf/" . $_FILES["pdf_file"]["name"]);
// $filepath = "uploads/pdf/" . $_FILES["pdf_file"]["name"];
// echo "<img src=".$filepath." height=200 width=300 />";
// echo "<a href='/uploads/pdf/ai.pdf'>Open PDF</a>";
$sql=mysqli_query($conn,"INSERT INTO `upload_pdf_file`(`courses`,`pdf_file`) VALUES ('$courses','$upload_pdf')");
if($sql){
	echo "<script>alert('File Submited Successful')</script>";
}
else{
	echo "<script>alert('File Submit Error!!')</script>";
}
}
?>
<?php
    $qt="SELECT * FROM courses";
    $rest= mysqli_query($conn,$qt);
    $options="";
   while($row2 = mysqli_fetch_array($rest)) {
       $options=$options."<option>$row2[desg]</option>";
//       $name = $row2['name'];
//       echo $name;
   }
  ?>
 <!-- <?php  
                $query = "SELECT * FROM upload_pdf_file ORDER BY id DESC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['pdf_file'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  -->
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <style type="text/css">
           #ui{
        background-color: #ffffff;
        padding: 30px 50px 50px 50px;
        margin-top: 10px;
        border-radius: 10px;
        opacity: 1;
        
    }
   #ui input{
     background-color: #f2f2f2;
   }
     label{
        color: black;
        font-family: serif;
        font-size: 22px;
    }

    #p{
    
        margin-top: 10px;
        margin-left: 150px;
        font-size: 40px;
        color:  #193059;
        font-weight: bold;
}
    .container{
        float: center;
        margin-top: 130px;
         width: 600px;
  height: 300px;
  
  border: 1px solid #193059;

    }
 .form-group button
 {
    background-color:#cd6f0d;
    color: white;
 }
 .form-control{
    background-color:#f2f2f2;
 }

      </style>
</head>
<body>
   <div class="container">
    
                    <p id="p">FILE UPLOAD</p>
                     <br>
                     
	<form method="post" class="form-group" action="fileupload.php" role="form" enctype="multipart/form-data">
   <div class="row">
       <div class="col-lg-6">
	         <label>Subject</label>
       </div>
       <div class="col-lg-6">
       <select name="cour" class="form-control"> <?php echo $options; ?> </select> 
     </div>
    </div>
    <br>
  <div class="row">
       <div class="col-lg-6">
	          <label>File</label>   
      </div>
       <div class="col-lg-6">
          <input type="file" name="pdf_file" class="form-control" id="pdf_file" accept="application/pdf" / required>
       </div>
  </div><br><br>
	         <button id="send" type="submit" name="submit" class="btn btn-block btn-lg">Submit</button>
</form>
</div>
</div>
<div class="col-lg-3"></div>
</div>
</div>
</body>
</html>