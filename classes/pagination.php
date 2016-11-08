<?php
/**
 * @package    Serpong/Pagination
 * @author     Serpong
 */

class Pagination {

    //user inputs
    /*private $config = array(
        'len'  => 
    );*/

    // number of all pages
    private $page_count;

    //html result
    private $result;

    //start number
    private $start;

    //end number
    private $end;

    //the number of page now on
    private $current_page;

    // number of all rows
    private $num_rows;

    // limit of rows
    private $limit;

    // left or right side of length ex) 2 => 5, 3 => 7
    private $len;

    //link. it needs %d to be replaced
    private $link;



    public function __construct($limit, $num_rows, $current_page, $link, $len = 2)
    {
        $this->limit = $limit;
        $this->num_rows = $num_rows;
        $this->current_page = $current_page;
        $this->link = $link;
        $this->len = $len;
        $this->setup();
    }

    public function setup(){
        $this->page_count = ceil($this->num_rows / $this->limit);
        $this->start = $this->current_page - $this->len;
        $this->end = $this->current_page+$this->len;

        if($this->current_page <= $this->len){
            $this->start+= ($this->len+1)-$this->current_page;
            $this->end+= ($this->len+1)-$this->current_page;
        }
        if($this->current_page > $this->page_count-$this->len)
            $this->end = $this->page_count;

        if(($this->current_page+$this->len) - $this->end >= 1 && $this->page_count > 5)
            $this->start-=($this->current_page+$this->len) - $this->end;




        if($this->start != 1){ // left arrow
            $left_arrow_page = $this->current_page - 5;
            if($left_arrow_page < 1)
                $left_arrow_page = 1;
            $this->result .= "<a href='" . sprintf($this->link, $left_arrow_page) . "'>&lt;</a>";
        }
        
        for ($i = $this->start; $i <= $this->end; $i++) {
            $this->result .= "<a " . ($i == $this->current_page?'class="active"':"") . 'href="' . sprintf($this->link, ($i));
            $this->result .= '">' . $i . '</a>';
        }

        if($i-1 != $this->page_count){ // right arrow
            $right_arrow_page = $this->current_page + 5;
            if($right_arrow_page > $this->page_count)
                $right_arrow_page = $this->page_count;
            $this->result .= "<a href='" . sprintf($this->link, $right_arrow_page) . "'>&gt;</a>";
        }
    }

    public function print_html(){
        echo $this->result;
    }
    public function get_html(){
        return $this->result;
    }


    
    
}
?>