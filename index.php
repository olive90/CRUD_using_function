<?php
	require_once 'header.php';

	require_once 'functions.php';

	if(isset($_GET['status']))
	{
		if($_GET['status'] == 'delete')
		{
			$news_id = $_GET['id'];
			Delete_news($news_id);
		}
	}

	$query_result = Select_all_news();
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<h3 class="text-center">Daily News Update</h3>

<?php

	while ($row = mysqli_fetch_assoc($query_result)) 
	{

?>

		<hr>
		<div class="container-fluid" style="background-color:#D8D8D8;">
			<div class="row">
				<div class="col-sm-12">
				<br>
					<table>
						<tr>
							<th><b>Title</b></th>
							<th>&nbsp; : &nbsp;</th>
							<td><?=$row['news_title']?></td>
						</tr>
						<tr>
							<th><b>Author</b></th>
							<th>&nbsp; : &nbsp;</th>
							<td><?=$row['author_name']?></td>
						</tr>
						<tr>
							<th><b>Short Description</b></th>
							<th>&nbsp; : &nbsp;</th>
							<td><?=$row['news_short_description']?></td>
						</tr>
						<tr>
							<th><b>Long Description</b></th>
							<th>&nbsp; : &nbsp;</th>
							<td><?=$row['news_long_description']?></td>
						</tr>
					</table>
					
					<br>

					<a href="edit_news.php?id=<?=$row['news_id'];?>" class="btn btn-info">Edit</a>
					<a href="?status=delete&&id=<?=$row['news_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>

				</div>
			</div>
			<br>
		</div>
<?php
	}
			
?>
		<br>

		</div>
	</div>
</div>


<?php
	require_once 'footer.php';
?>