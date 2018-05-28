<?php

mysql_connect('den1.mysql2.gear.host:3306','senews','senews.password');
mysql_select_db('senews');

function addNews($title, $content, $image, $link, $source, $sourceicon, $category) {
  $title = mysql_real_escape_string(htmlspecialchars($title));
  $content = mysql_real_escape_string(htmlspecialchars($content));
  $image = mysql_real_escape_string($image);
  $link = mysql_real_escape_string($link);
  $source = mysql_real_escape_string($source);
  $sourceicon = mysql_real_escape_string($sourceicon);
  $category = mysql_real_escape_string($category);
  mysql_query("insert into news values ('$title', '$content', '$image', '$link', '$source', '$sourceicon', '$category')");
}

function getNewsByType($type) {
  $arr = array();
  $results = mysql_query("select * from news where category='$type'");
  while ($result = mysql_fetch_assoc($results)) {
    array_push($arr, $result);
  }
  $arr = array_reverse($arr);
  return $arr;
}

function getNewsHtml($array) {
  $html = "";
  $articleTemplate = "
  <article>
    <div class='article'>
      <h3>replace_title</h3>
      <div class='artpic'>
        <img src='replace_image_link'>
      </div>
      <div>
        replace_content
      </div>
      <a href='replace_link'>
        <div class='source'>
          <img width='30px' src='replace_source_icon'>
          <div>
            replace_source
          </div>
        </div>
      </a>
    </div>
    <div class='hider'>
      <div class='extender'>
        <span onclick='extend(this);'>Read more</span>
      </div>
    </div>
  </article>";
  foreach ($array as $key => $value) {
    $article = $articleTemplate;
    $article = str_replace("replace_title", $value['title'], $article);
    $article = str_replace("replace_content", $value['content'], $article);
    $article = str_replace("replace_source_icon", $value['sourceicon'], $article);
    $article = str_replace("replace_source", $value['source'], $article);
    $article = str_replace("replace_link", $value['link'], $article);
    $article = str_replace("replace_image_link", $value['image'], $article);
    while(strpos($article, '<br/><br/><br/><br/>') !== false) {
      $article = str_replace("<br/><br/><br/><br/>", "<br/><br/>", $article);
    }
    $html = $html.$article;
  }
  return $html;
}

 ?>
