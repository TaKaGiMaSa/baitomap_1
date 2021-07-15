<?php
	include 'db_config.php';
	if(!empty($_POST))
	{
		$baito_id = $_POST['baito_list_id'];
		$baito_name = $_POST['baito_list_name'];
		try
		{
		 // connect
		 $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
		 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $stmt = $db->query("SELECT * FROM review WHERE baito_id={$baito_id}");
		 $review = $stmt->fetchall(PDO::FETCH_ASSOC);
		 
		 $stmt = $db->query("SELECT id,name FROM users");
		 $user_review = $stmt->fetchall(PDO::FETCH_ASSOC);
		 
		 
		 $db = null;
		}
		catch(PDOException $e)
		{
	    	$error = $e->getMessage();
	    	exit;
		}
	}


?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Sample_GoogleMap</title>
		<link rel="stylesheet" href="css/star_review_view.css">
    </head>


    <body>
      <h1>バイトマップ</h1>
	  <p><a href="main.php">トップページに戻る</a></p>
	  	<?php
			 echo "<h2>{$baito_name}のみんなの口コミ</h2>";
			 echo "<hr>";
			   
	         foreach ($review as $r)
	         {
				 foreach($user_review as $u_r){
				   if($r['user_id'] == $u_r['id']){
					   $author = $u_r['name'];
					   $comment = $r['comment'];
		        	   $wrote_date = $r['wrote_date'];
					   $star = $r['star_review'];
					   echo "<div><h3>{$author}</h3>";
					   echo "<p>{$wrote_date}</p>";
					   echo "<p><span class='star5_rating' data-rate='{$star}'></span> 星{$star}</p>";
					   echo "<p>{$comment}</p></dev>";
					   echo "<hr>";
			       }
			    }     
		     }
		 ?>
		<br><br>
		
	</body>
</html>
