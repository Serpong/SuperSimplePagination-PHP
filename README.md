# PAGINATION

usage
------- 

```php
<?php
	$pagination = new Pagination($limit, $num_rows, $current_page, $link, $len);
	$pagination_html = $pagination->get_html();
?>
<div class="pagination">
	<?=$pagination_html?>
</div>
```

[블로그](http://blog.serpongs.net)