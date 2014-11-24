<div class="nav">Username: <b><?php echo $_SESSION['user_name']; /*echo sys_get_temp_dir();*/ ?></b><a class="logout" href="http://localhost/shenstone-homes/admin/index.php?logout=true">Logout</a></div>
<div class="add">
  <h1>Add a new property</h1>
  <form class="add-form" enctype="multipart/form-data">
    <div class="four">
      <div class="third">
        <label>Main Image</label>
        <a class="imagery_1" href="#" target="_blank"></a>
        <input type="file" class="image_1" name="image_1" />
      </div><div class="sixth">
        <label>Title</label>
        <input type="text" class="title" name="title" id="title" value="Enter the title here..." />
        <label>Address</label>
        <textarea name="content" class="content" id="content">Enter the address here...</textarea>
        <label>Price</label>
        <input type="text" class="price" name="price" id="price" value="Enter the price here..." />
      </div>
    </div>
    <div class="four other">
      <label>Other Images</label>
      <div class="one">
        <a class="imagery_2" href="#" target="_blank"></a>
        <input type="file" class="image_2" name="image_2" />
      </div><div class="one">
        <a class="imagery_3" href="#" target="_blank"></a>
        <input type="file" class="image_3" name="image_3" />
      </div><div class="one">
        <a class="imagery_4" href="#" target="_blank"></a>
        <input type="file" class="image_4" name="image_4" />
      </div><div class="one">
        <a class="imagery_5" href="#" target="_blank"></a>
        <input type="file" class="image_5" name="image_5" />
      </div>
    </div>
    <input type="button" value="Cancel" class="cancel" />
    <input type="submit" value="Save" class="save" />
  </form>
  <div class="subtract">
    <img src="../assets/loading.gif" />
  </div>
</div>
<?php include("all.php"); ?>
<h1>View / Edit properties</h1>
<?php while($news = mysql_fetch_array($data)) { ?>
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