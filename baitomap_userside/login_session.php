<?php
  //ログイン処理
  include 'db_config.php';

  $users = array();
  $flag = 0;
  try
  {
     // connect
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // user一覧を取得
     $stmt = $db->query("SELECT * FROM users");
     $_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach($_users as $u)
     {
       $tmp = array(
           "id"=> $u['id'],
           "name" => $u['name'],
           "password" => $u['password'],
       );
       $users[] = $tmp;
     }
     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
    $user_id    = $_POST['username']; // 入力されたユーザー名
    $password   = $_POST['password']; // 入力されたパスワード
    
    foreach($users as $u){
          $_id   = $u['id'];
          $_name = $u['name'];
          $_pass = $u['password'];  
          if($user_id == $_name){
              $id = $_id;
              $name = $_name;
              $pass = $_pass;
          };
    }
    // if($user_id != $name || $password != $pass){
    //   echo"<a href='login.php'>戻る</a>";
    //   die('ユーザー名またはパスワードが間違っています');
    //   };
   
    // ログイン認証成功の処理
    // session_start();
    // session_regenerate_id(true); // セッションIDをふりなおす
    // $_SESSION['user_id'] = $id;
    // $_SESSION['username'] = $name;
    // $_SESSION['login_flag'] = 1; // ログインしているかどうかを表すフラグ
    
    // header("Location: main.php");
    
    if(password_verify($password, $pass)){
      session_start();
      session_regenerate_id(true); // セッションIDをふりなおす
      $_SESSION['user_id'] = $id;
      $_SESSION['username'] = $name;
      $_SESSION['login_flag'] = 1; // ログインしているかどうかを表すフラグ
      header("Location: main.php");
    } else {
      echo "<p>ユーザー名またはパスワードが間違っています</p>";
      echo "<a href='login.php'>戻る</a>";
    }

?>
