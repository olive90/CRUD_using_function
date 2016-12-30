<?php
	
	require_once 'header.php';

	require_once 'functions.php';

	$news_id = $_GET['id'];
	$query_result = Select_news_by_id($news_id);
	$row = mysqli_fetch_assoc($query_result);

	if(isset($_POST['submit']))
	{
		Update_news($_POST, $news_id);
	}
	
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<?php //echo $message;?>

		<h3 class="text-center">Update News</h3>
			<hr>
			<form class="form-horizontal" role="form" action="" method="post">
				<div class="form-group">
					 
					<label for="news_title" class="col-sm-2 control-label">
						News Title
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="news_title" value="<?=$row['news_title'];?>" />
					</div>
				</div>
				<div class="form-group">
					 
					<label for="author_name" class="col-sm-2 control-label">
						Author Name
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="author_name" value="<?=$row['author_name'];?>" />
					</div>
				</div>
				<div class="form-group">
					 
					<label for="news_short_description" class="col-sm-2 control-label">
						News Short Description
					</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="10" cols="5" name="news_short_description" /><?=$row['news_short_description'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="news_long_description" class="col-sm-2 control-label">
						News Long Description
					</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="10" cols="5" name="news_long_description" /><?=$row['news_long_description'];?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 
						<input type="submit" name="submit" value="UPDATE NEWS INFO" class="btn btn-info" style="padding:10px;">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	require_once 'footer.php';
?>