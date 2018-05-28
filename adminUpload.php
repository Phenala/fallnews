<?php
  include('util.php');
  sleep(1);
  session_start();
  session_destroy();
  unset($_SESSION);
  setcookie('PHPSESSID','0', time() - 500,'/');
  session_start();
  mysql_connect('den1.mysql2.gear.host:3306','senews','senews.password');
  mysql_select_db('senews');
  if (isset($_POST['password'])) {
    if ($_POST['password'] == '1234qazwsxedc') {
      $image = $_POST["imagelink"];
      $title = $_POST["title"];
      $content = $_POST["content"];
      $link = $_POST["link"];
      $source = $_POST["sourcelink"];
      $sourceicon = $_POST["sourceicon"];
      $category = $_POST["category"];
      addNews($title, $content, $image, $link, $source, $sourceicon, $category);
      echo('Article Submitted');
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Fall News Admin</title>
</head>
<body>
	<form method="post" action="adminUpload.php">
		<input id="authorization" type="password" name="password" placeholder="authorization password"><br/><br/>
    <input id="title" type="text" name="title" placeholder="title"><br/>
		<textarea id="content" name="content" placeholder="Enter news."></textarea><br/>
		<input id="link" type="text" name="link" placeholder="Enter Link"><br/>
    <input id="imagelink" type="text" name="imagelink" placeholder="Image Link"><br/>
    <input id="source" type="text" name="sourcelink" placeholder="Source"><br/>
    <input id="sourceicon" type="text" name="sourceicon" placeholder="sourceicon"><br/>
		<select id="category" name="category">
			<option value="technology">Technology</option>
			<option value="entertainment">Entertainment</option>
			<option value="gaming">Gaming</option>
		</select><br/>
    <input  id="submit"type="submit">
</body>
</html>
