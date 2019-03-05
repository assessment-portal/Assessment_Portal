
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	<style type="text/css">
  		.cd-main-nav a:hover {
    color: #cd6f0d;
    text-decoration: none;
}
  	</style>
  	<!-- <script type="text/javascript">
  		$(document).ready(function(){
   
   $('#up').load("log.php");

});
  	
  	</script> -->
	<title>InfiData Admin Dashboard</title>
</head><br><br><br><br>
<body>
	<header>
		<div class="cd-logo" ><a href="#0"><img src="infi.png" width="100px" height="65px" alt="Logo"></a></div>

		<nav class="cd-main-nav-wrapper">
			<ul class="cd-main-nav">
				
				<li> <?php if(@$_GET['q']==1)  ?><a href="dash.php?q=1">User</a></li>
				 <li><?php if(@$_GET['q']==2)  ?><a href="dash.php?q=2">Ranking</a></li>
				<li>><?php if(@$_GET['q']==1)  ?><a href="teacherregg.php">Add Teacher</a></li>
				<li><a href="teacherdetails.php">Teacher</a></li>
				<li id="up"><a href="fileupload.php">Upload Documents</a></li>
				<!-- <li><a href="#0"><?php echo "Hello ". $_SESSION['manager']; ?></a></li> -->
				<li><a href="logout.php">Log Out</a></li>
				<li>
					<a href="#0" class="cd-subnav-trigger"><span>Dashboard</span></a>

					<ul>
						<li class="go-back"><a href="#0">Menu</a></li>
						<li><?php if(@$_GET['q']==0) ?><a href="dash.php?q=0">Quiz</a></li>
						<li><a href="dash.php?q=4">Add Quiz</a></li>
						<li><a href="dash.php?q=5">Remove Quiz</a></li>
						<li><a href="subquest.php">Add Subjective</a></li>
						<li><a href="showans.php">Show Ans</a></li>
						<li id="up"><a href="courseadd.php">Add Course</a></li>
						<li><a href="#0" class="placeholder">Placeholder</a></li>
					</ul>
				</li>
			</ul> <!-- .cd-main-nav -->
		</nav> <!-- .cd-main-nav-wrapper -->
		
		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>
	</header>
	<!-- 
	<main class="cd-main-content">
		main content here
	</main> -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>