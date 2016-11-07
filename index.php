<?
include("./classes/pagination.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Example</title>
	<style>
		.pagination{
			margin-top:10px;
		}
			.pagination a{
				display: inline-block;
				width: 35px;
				text-align: center;
				color: #084b77;
				border:1px solid #ddd;
				border-right:0;
				padding: 10px 0;
				text-decoration: none;
			}
				.pagination a:hover{
					background-color: #eee;
				}
				.pagination a.active{
					background-color: #3498db;
					color: white;
				}

				.pagination a:first-child{
					border-top-left-radius: 5px;
					border-bottom-left-radius: 5px;
				}
				.pagination a:last-child{
					border-right:1px solid #ddd;
					border-top-right-radius: 5px;
					border-bottom-right-radius: 5px;
				}
	</style>
</head>
<body>
	<?
	//number of limited rows per page
	$limit = 10; 

	//number of rows of all rows
	$num_rows = 150; 

	//number of current page
	$current_page = 1; 

	//link. it needs %d to be replaced
	$link = "./index.php?n=%d"; 

	//length of either side. default=2. ex) len=2 < (1 2) 3 (4 5) >
	$len = 2; 

	if(isset($_GET['n']))
		$current_page = $_GET['n'];

	$pagination = new Pagination($limit, $num_rows, $current_page, $link, $len);
	$pagination_html = $pagination->get_html();
	?>

	<div class="pagination">
		<?=$pagination_html?>
	</div>
</body>
</html>