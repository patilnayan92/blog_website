<?php
function get_first_num_of_words($string, $num_of_words)
{
    $string = preg_replace('/\s+/', ' ', trim($string));
    $words = explode(" ", $string); // an array
    // if number of words you want to get is greater than number of words in the string
    if ($num_of_words > count($words)) {
        // then use number of words in the string
        $num_of_words = count($words);
    }
    $new_string = "";
    for ($i = 0; $i < $num_of_words; $i++) {
        $new_string .= $words[$i] . " ";
    }
    return trim($new_string);
}

function getCatName($catid){
     global $connection;
     $sql = "SELECT cat_title FROM categories WHERE cat_id='".$catid."'";
     $getcat = mysqli_query($connection,$sql);
     $cattitle = mysqli_fetch_array($getcat);
     return $cattitle['cat_title'];
 }
 
function getCatList(){
    global $connection;
    $cathtml ='<ul type="list-style-type:none">';
    $sql = "SELECT * FROM categories";
    $getcat = mysqli_query($connection,$sql);
    
    while($cattitle = mysqli_fetch_array($getcat)){
        $sqlproject="SELECT post_category_id FROM posts WHERE post_category_id='".$cattitle['cat_id']."' AND post_status='Publish' order by post_date DESC ";
        $prorow = mysqli_query($connection,$sqlproject);
        $catcount = mysqli_num_rows($prorow);
        
        $cathtml.='<li>
            <a href="http://localhost/naracinew/blogcategory/'.$cattitle['cat_name'].' ">
                <span class="name"> '.$cattitle['cat_title'].' </span>
                <span class="number"> ( '.$catcount.' ) </span>
            </a>
        </li>';
    }
    $cathtml.='</ul>';
    return $cathtml;
}

function getArchiveCount() {
    global $connection;
    $archivehtml ='<ul type="list-style-type:none">';
    $archivesql = "SELECT post_date,COUNT(post_id) FROM posts WHERE post_status='Publish' GROUP BY DATE_FORMAT(post_date, '%Y-%m') ORDER By post_date ASC";
    
    $countarchive = mysqli_query($connection, $archivesql);
    
    while($countrow=mysqli_fetch_array($countarchive)){
        $datetime = strtotime($countrow['post_date']);
        $tday = date("Y-m", $datetime);
        $moredetail = strtotime($tday);
        $month = date('M',$moredetail);
        $year  = date('Y',$moredetail);

        $archivehtml.='<li>
            <a href="http://localhost/naracinew/blogarchive/'.$tday.' ">
                <span class="name"> '.$month.' '.$year.'  </span>
                <span class="number"> ( '.$countrow['COUNT(post_id)'].' ) </span>
            </a>
        </li>';
    }
    $archivehtml.='</ul>';
    return $archivehtml;
}

?>