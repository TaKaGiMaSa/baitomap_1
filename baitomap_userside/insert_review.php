<?php
	include 'db_config.php';
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    $baito_id = $_POST["baito_id"];
		$user_id = $_POST["user_id"];
		$wrote_date = $_POST["wrote_date"];
		$comment = $_POST["comment"];
		// レビューの星で押されたボタン
		if(isset($_POST['star1'])){
			$star = $_POST['star1'];
		} else if(isset($_POST['star2'])){
			$star = $_POST['star2'];
		} else if(isset($_POST['star3'])){
			$star = $_POST['star3'];
		} else if(isset($_POST['star4'])){
			$star = $_POST['star4'];
		} else if(isset($_POST['star5'])){
			$star = $_POST['star5'];
		}
		
		try
		{
		 // connect
		 $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
		 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 // DBに保存する
		 $db->exec("INSERT INTO review(baito_id, user_id, wrote_date, comment, star_review) 
			       VALUES({$baito_id}, {$user_id}, '{$wrote_date}', '{$comment}', {$star})");
		 $db = null;
		}
		catch(PDOException $e)
		{
	    	$error = $e->getMessage();
	    	exit;
		}
	}
	
	// リダイレクト
	http_response_code( 301 );
	header('Location: main.php');
	exit;
?>

