<?php
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('agriwash', $connection);
	
$data = mysql_query("SELECT * FROM sh_properties ORDER BY modified DESC LIMIT 1") or die(mysql_error());
while($news = mysql_fetch_array($data)) { ?>
<div class="item" id="<?php echo $news['id']; ?>">
  <div class="mainimg">
    <figure><img src="http://localhost/shenstone-homes/uploads/<?php echo $news['image_1']; ?>" /></figure>
  </div><div class="alltext">
    <h2><?php echo $news['title']; ?><br /><span><?php echo substr($news['modified'], 0, 10); ?></span></h2>
    <h3><?php echo $news['price']; ?></h3>
    <p><?php echo nl2br($news['content']);//substr(nl2br($news['content']), 0, 165) . '...'; ?></p>
    <a class="edit" href="#" id="<?php echo $news['id']; ?>">Edit</a>
    <a href="http://localhost/shenstone-homes/lettings-management/<?php echo str_replace(' ', '-', $news['title']); ?>" class="linky" target="_blank">View</a>
    <a class="delete" href="#" id="<?php echo $news['id']; ?>">Delete</a>
  </div><div class="rest">
    <figure><img src="http://localhost/shenstone-homes/uploads/<?php echo $news['image_2']; ?>" /></figure><figure><img src="http://localhost/shenstone-homes/uploads/<?php echo $news['image_3']; ?>" /></figure><figure><img src="http://localhost/shenstone-homes/uploads/<?php echo $news['image_4']; ?>" /></figure><figure><img src="http://localhost/shenstone-homes/uploads/<?php echo $news['image_5']; ?>" /></figure>
  </div>
</div>
<?php } ?>