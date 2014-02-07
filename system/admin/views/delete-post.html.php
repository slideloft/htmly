<?php
	$destination = $_GET['destination'];
	$url = $p->file;
	$oldurl = explode('_', $url);
	$oldtag = $oldurl[1];
	$oldmd = str_replace('.md','',$oldurl[2]);

	$replaced = substr($oldurl[0], 0,strrpos($oldurl[0], '/')) . '/';
	$dt = str_replace($replaced,'',$oldurl[0]);
	$t = str_replace('-','',$dt);
	$time = new DateTime($t);
	$timestamp= $time->format("Y-m-d");
	// The post date
	$postdate = strtotime($timestamp);
	// The post URL
	$post = site_url().date('Y/m', $postdate).'/'.$oldmd;
	
	if($destination == 'post') {
		$back = $post;
	}
	else {
		$back = site_url() . $destination;
	}
	
?>
<?php echo '<p>Are you sure want to delete <strong>' . $p->title . '</strong>?</p>';?>
<form method="POST">
	<input type="hidden" name="file" value="<?php echo $p->file ?>"/><br>
	<input type="submit" name="submit" value="Delete"/>
	<span><a href="<?php echo $back ?>">Cancel</a></span>
</form>