<?php include '../meta.php'; ?>
<title>Shenstone Homes | Properties</title>
<?php include '../header.php'; ?>
<?php
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('shenstone-homes', $connection);
	
$esc = mysql_real_escape_string($_GET['title']);
$string = str_replace('-', ' ', $esc);
$data = mysql_query('SELECT * FROM properties WHERE title = "'.$string.'" LIMIT 1') or die(mysql_error());
while($news = mysql_fetch_array($data)) { ?>
<div class="wrapper" id="property">
  <div class="two">
    <figure><img src="../uploads/<?php echo $news['image_1']; ?>" /></figure>
  </div><div class="two">
    <h1><?php echo $news['title']; ?><br /><span><?php echo substr($news['modified'], 0, 10); ?></span></h1>
    <p><?php echo nl2br($news['content']); ?></p>
    <h3><?php echo $news['price']; ?></h3>
    <form>
      <input type="button" name="enquire" class="enquire" value="Enquire">
    </form>
  </div>
  <div class="four">
    <div class="banner">
      <div class="left"><img src="../assets/arrow.png" /></div>
      <div class="right"><img src="../assets/arrow.png" /></div>
      <ul>
        <li><img src="../uploads/<?php echo $news['image_2']; ?>" /></li>
        <li><img src="../uploads/<?php echo $news['image_3']; ?>" /></li>
        <li><img src="../uploads/<?php echo $news['image_4']; ?>" /></li>
        <li><img src="../uploads/<?php echo $news['image_5']; ?>" /></li>
      </ul>
    </div>
    <!--<figure><img src="../uploads/<?php //echo $news['image_2']; ?>" /></figure><figure><img src="../uploads/<?php //echo $news['image_3']; ?>" /></figure><figure><img src="../uploads/<?php //echo $news['image_4']; ?>" /></figure><figure><img src="../uploads/<?php //echo $news['image_5']; ?>" /></figure>-->
  </div>
</div>
<?php } ?>
<?php include '../footer.php'; ?>
