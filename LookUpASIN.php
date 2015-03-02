<?php
require('AmazonECS.class.php');
require('functions.php');

$public_key = 'AKIAJHYJAI6HHISCWWEQ';
//$public_key = 'AKIAJHYJAI6HHISCWWE9'; //wrong
$private_key = 'hZSwX9SGLyPufJctpOwRBIqOcU+XqJvPAhtU4Ya8';
$associate_tag = 'marketplacesy-20';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lookup Book</title>
</head>
<body>
    <h1>Look Up Book</h1>
    <p>
        Put an Amazon ASIN in the text box and this program will bring back Title, Author, and a link to the Amazon
         page. <br><br>

        Here are some example ASINs you can try: <br>
        B00KAOCZ7C<br>
        B00T1WMG14<br>
        B00U02VLB0<br>
        0071849874<br><br>

    <div>
          
        <form action='SearchASIN.php' method="POST">
            ASIN: <input type='text' name='inputASIN' required></input>
            <input type='hidden' name='ASINLookUp' value='TRUE'></input>
            <input type='submit' value='Find'></input><br>
            (Search Results From Amazon)
        </form><br><br>
    </div>
 <?php  
 
 if (array_key_exists('ASINLookUp', $_POST)) {
    
    echo "Showing informatioin for ASIN " . $_POST['inputASIN'] . ":<br><br>";
    $myASIN = $_POST['inputASIN'];
    LookUpBook($myASIN, $public_key, $private_key, $associate_tag);
} 
if ("cli" !== PHP_SAPI)
    {
        echo "</pre>";
    }
 
?>
 </body>
</html>