<?php include '../meta.php'; ?>
<title>Shenstone Homes | Lettings & Management</title>
<?php include '../header.php'; ?>
<div class="wrapper" id="lettings">
  <div class="two">
    <h1>Lettings & Management</h1>
    <p>Shenstone Management is a property management team combining the expert know-how of experienced property professionals and backed up with chartered consultants. Specifically designed to help you capture the most profitable returns on your buy-to-let investments. Our expertise and assistance, as and when you need, it is a completely flexible service tailored to suit your requirements, including:</p>
    <ul>
      <li>Over 20 years experience in property management</li>
      <li>Marketing your property</li>
      <li>Finding suitable tenants</li>
      <li>Strict credit checks</li>
      <li>Rent collection and accounting</li>
      <li>Inventory preparation</li>
      <li>Regular property inspections</li>
      <li>In-house repair and maintenance teams</li>
      <li>Prompt response with rent arrears</li>
      <li>Property management to suit your needs</li>
      <li>Bespoke management package</li>
      <li>FREE no-obligation consultation</li>
    </ul>
  </div><div class="two">
    <figure><img src="../assets/about_s.jpg" /></figure>
  </div>
  <div class="four allprops">
    <?php include '../admin/all.php';
	while($news = mysql_fetch_array($data)) { ?><div class="one" id="<?php echo $news['id']; ?>">
        <?php $esc = mysql_real_escape_string($news['title']); $string = str_replace(' ', '-', $esc); ?>
        <a href="<?php echo $string; ?>">
          <figure><img src="http://localhost/shenstone-homes/uploads/<?php echo $news['image_1']; ?>" /></figure>
          <h2><?php echo $news['title']; ?><br /><span><?php echo substr($news['modified'], 0, 10); ?></span></h2>
          <h3><?php echo $news['price']; ?></h3>
          <!--<p><?php //echo nl2br($news['content']); ?></p>-->
        </a>
	  </div><?php } ?>
  </div>
</div>
<?php include '../footer.php'; ?>