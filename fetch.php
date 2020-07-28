<?php 
  include("includes/database.php");
  
  $output = '';
  if(isset($_POST["query"]))
  {
    $search = mysqli_real_escape_string($connection, $_POST["query"]);
    $query = "
      SELECT * FROM faqs WHERE faq_question LIKE '%".$search."%'
    ";
  }
  else
  {
    $query = "
      SELECT * FROM faqs ORDER BY faq_id DESC
    ";
  }
  $result = mysqli_query($connection, $query);
  if(mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_array($result))
    {
      $output .= '
        <div class="card">
          <div class="card-header" id="headingOne_'.$row['faq_id'].'">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne__'.$row['faq_id'].'" aria-expanded="true" aria-controls="collapseOne__'.$row['faq_id'].'">
                '.$row['faq_question'].'
              </button>
            </h2>
          </div>
      
          <div id="collapseOne__'.$row['faq_id'].'" class="collapse hide" aria-labelledby="headingOne_'.$row['faq_id'].'" data-parent="#accordionExample">
            <div class="card-body">
              '.$row['faq_answer'].'
            </div>
          </div>
        </div>
      ';
    }
    echo $output;
  } else {
    $output .='
      Data Not Found, Search with the Question
    ';
    // echo 'Data Not Found';
    echo $output;
  }

?>
