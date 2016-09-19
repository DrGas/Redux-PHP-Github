<?php require_once("db_const.php");  
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
$connection->set_charset("utf8");  ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chuck Norris Facts</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<header>
  <h1>Chuck Norris Facts</h1>
  <?php 

	 
		 if ($connection->connect_error) {
			die('Connect Error: ' . $connection->connect_error);
			} else {
			echo '<span class="hint">[Successful connection to MySQL database!]</span>';
			}
		 
		 ?>
</header>
<?php 
		 $jokesdata = $connection->query("SELECT * FROM jokes ORDER BY id DESC"); 
		
		 ###############################################################################################
		 # Oh my god - I need a way to render ALL records from the database, not only the last one :-( #
		 # This makes me sick...                                                                       # 
		 ###############################################################################################
		 while($jokes = $jokesdata->fetch_assoc()){
			echo '<!-- single Chuck Norris joke start -->
			<div class="joke">
					<img src="' . $jokes['img'] . '" class="joke-img" alt="Chuck Norris caricature"/>
					<h2>' . $jokes['joke'] .  '</h2>	       
            </div>';
			echo '<!-- single joke end -->'; }
		 ?>
</body>
</html>