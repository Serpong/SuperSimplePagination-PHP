<?
function paging($limit, $numRows, $n, $link, $len = 2){
    $page_count       = ceil($numRows / $limit);
    $result = '';

    $start = $n - $len;
	$end = $n+$len;

    if($n <= $len){
    	$start+= ($len+1)-$n;
    	$end+= ($len+1)-$n;
    }

    if($n > $page_count-$len)
    	$end = $page_count;

    if(($n+$len) - $end >= 1 && $page_count > 5)
    	$start-=($n+$len) - $end;

	if($start != 1)
    	$result .= "<a href='#'>&lt;</a>";
    for ($i = $start; $i <= $end; $i++) {
        $result .= "<a " . ($i == $n?'class="active"':"") . 'href="' . sprintf($link, ($i));
        $result .= '">' . $i . '</a>';
    }
    if($i-1 != $page_count)
    	$result .= "<a href='#'>&gt;</a>";

    return $result;
}
?>