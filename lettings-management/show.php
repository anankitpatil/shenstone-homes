<?php include '../meta.php';
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('agriwash', $connection);
	
$esc = mysql_real_escape_string($_GET['title']);
$string = str_replace('-', ' ', $esc);
$data = mysql_query('SELECT * FROM sh_properties WHERE title = "'.$string.'" LIMIT 1') or die(mysql_error());
while($news = mysql_fetch_array($data)) { ?>

<title>Shenstone Homes | Properties</title>
<meta name="description" content="Shenstone Homes is a propert management and lettings agency which has been established for over 12 years,  with Javad Hosseini’s 30 years experience as a Consultant Structural Engineer, with his previous office at Tithebarn Street, Liverpool  where he practiced with his business partner Brian Latham. He designed most of the Beetham organisation projectsand also manages a large portfolio of rental properties for a number of Landlords.">

<?php include '../header.php'; ?>
<div class="wrapper" id="property">
  <div class="two">
    <figure><img src="../uploads/<?php echo $news['image_1']; ?>" alt="Shenstone Homes Properties. Management and letting. Design and build. <?php echo $news['title']; ?>" /></figure>
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
        <li><img src="../uploads/<?php echo $news['image_2']; ?>" alt="Shenstone Homes Properties. Management and letting. Design and build. <?php echo $news['title']; ?>" /></li>
        <li><img src="../uploads/<?php echo $news['image_3']; ?>" alt="Shenstone Homes Properties. Management and letting. Design and build. <?php echo $news['title']; ?>" /></li>
        <li><img src="../uploads/<?php echo $news['image_4']; ?>" alt="Shenstone Homes Properties. Management and letting. Design and build. <?php echo $news['title']; ?>" /></li>
        <li><img src="../uploads/<?php echo $news['image_5']; ?>" alt="Shenstone Homes Properties. Management and letting. Design and build. <?php echo $news['title']; ?>" /></li>
      </ul>
    </div>
    <!--<figure><img src="../uploads/<?php //echo $news['image_2']; ?>" /></figure><figure><img src="../uploads/<?php //echo $news['image_3']; ?>" /></figure><figure><img src="../uploads/<?php //echo $news['image_4']; ?>" /></figure><figure><img src="../uploads/<?php //echo $news['image_5']; ?>" /></figure>-->
  </div>
  <a href="./" class="viewall" title="Shenstone Homes Properties. Management and letting. Design and build. Properties managed to let">View all Properties</a>
</div>
<?php } ?>
<?php include '../footer.php'; ?>
