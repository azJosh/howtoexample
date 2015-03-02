<?php  

function searchBooks($mySearch, $public_key, $private_key, $associate_tag){
    try
    {
        $amazonEcs = new AmazonECS($public_key, $private_key, 'com', $associate_tag);

        $amazonEcs->responseGroup('Small');
        $amazonEcs->category('Books');

        $response = $amazonEcs->search($mySearch);
        
        //For Testing:
        //var_dump($response);
        //echo "<br><br>";
        //echo json_encode($response, 128);
          
        for ($y = 0; $y < 10; $y++) {
        $result = $y + 1;
        echo "Title: " . $response->Items->Item[$y]->ItemAttributes->Title . "<br>";
        echo "Author: " . $response->Items->Item[$y]->ItemAttributes->Author . "<br>";
        echo "ASIN: " . $response->Items->Item[$y]->ASIN . "<br>";
        echo '<a href="' . $response->Items->Item[$y]->DetailPageURL . '"">More Details</a><br><br>';
        }
        echo '<a href="' . $response->Items->MoreSearchResultsUrl . '"">More Search Results</a><br><br>';     
    }
    catch(Exception $e)
    {
      echo $e->getMessage();
    }
}

function LookUpBook($myASIN, $public_key, $private_key, $associate_tag){
    try
    {
        $amazonEcs = new AmazonECS($public_key, $private_key, 'com', $associate_tag);

        $amazonEcs->responseGroup('Small');
        $amazonEcs->category('Books');

        $response = $amazonEcs->lookup($myASIN);
        re
        //For Testing:
        //var_dump($response);
        // echo json_encode($response, 128);
          
        echo "Title: " . $response->Items->Item->ItemAttributes->Title . "<br>";
        echo "Author: " . $response->Items->Item->ItemAttributes->Author[1] . "<br>";
        echo "ASIN: " . $response->Items->Item->ASIN . "<br>";
        echo '<a href="' . $response->Items->Item->DetailPageURL . '"">More Details</a><br><br>';
          
    }
    catch(Exception $e)
    {
      echo $e->getMessage();
    }
}
?>