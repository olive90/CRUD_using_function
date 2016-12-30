<?php

require_once 'db_connect.php';


function AddNews()
{
	global $conn;
	$news_title = $_POST['news_title'];
	$author_name = $_POST['author_name'];
	$news_short_description = $_POST['news_short_description'];
	$news_long_description = $_POST['news_long_description'];

	if($news_title != NULL || $author_name != NULL || $news_short_description != NULL || $news_long_description != NULL){

	$sql = "INSERT INTO
			tbl_news(news_title, author_name, news_short_description, news_long_description) 
			VALUES('$news_title', '$author_name', '$news_short_description', '$news_long_description')";

	$result = mysqli_query($conn, $sql);
		if($result){
			return '<div class="alert alert-dismissable alert-success">
				 
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
					</button>
						<h4>
							Alert!
						</h4> <strong>Success!</strong> Successfully Added.
					</div>';
		}
		else
		{
			return '<div class="alert alert-dismissable alert-danger">
				 
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
					</button>
						<h4>
							Alert!
						</h4> <strong>Error!</strong> Not Added. Please try again.
					</div>';
						
		}
	}
	else
	{
		return '<div class="alert alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
				</button>
					<h4>
						Alert!
					</h4> <strong>Error!</strong> Fields should not be empty.
				</div>';
	}
}

function Select_all_news()
{
	global $conn;

	$sql = "SELECT * 
			FROM tbl_news 
			ORDER BY created_at 
			DESC";

	if (mysqli_query($conn, $sql)) 
	{
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	else
	{
		die('Query Problem'.mysqli_error($conn));
	}
}

function Select_news_by_id($news_id)
{
	global $conn;
	$sql = "SELECT *
			FROM tbl_news
			WHERE news_id = '$news_id'";

	if(mysqli_query($conn, $sql))
	{

		$result = mysqli_query($conn, $sql);
		return $result;
	}
	else
	{
		die('Query Problem'.mysqli_error($conn));
	}
}

function Update_news($data, $news_id)
{
	global $conn;
	$news_title = $data['news_title'];
	$author_name = $data['author_name'];
	$news_short_description = $data['news_short_description'];
	$news_long_description = $data['news_long_description'];

	$sql = "UPDATE `tbl_news` 
			SET `news_title` = '$news_title', `author_name` = '$author_name', `news_short_description` = '$news_short_description', `news_long_description` = '$news_long_description' 
			WHERE `tbl_news`.`news_id` = '$news_id'";

	if(mysqli_query($conn, $sql))
	{
		header('Location: index.php');
	}
	else
	{
		die('Query Problem'.mysqli_error($conn));
	}
}

function Delete_news($news_id)
{
	global $conn;
	$sql = "DELETE
			FROM tbl_news
			WHERE news_id = '$news_id'";

	if(mysqli_query($conn, $sql))
	{

		return '<div class="alert alert-dismissable alert-success">
				 
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
					</button>
						<h4>
							Success!
						</h4> <strong>Success!</strong> Successfully Deleted.
					</div>';
	}
	else
	{
		return '<div class="alert alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
				</button>
					<h4>
						Alert!
					</h4> <strong>Error!</strong> Try again.
				</div>';
	}
}
?>