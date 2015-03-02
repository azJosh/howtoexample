<?php
require('AmazonECS.class.php');
require('functions.php');

$public_key = 'AKIAJHYJAI6HHISCWWEQ';
$private_key = 'hZSwX9SGLyPufJctpOwRBIqOcU+XqJvPAhtU4Ya8';
$associate_tag = 'marketplacesy-20';  

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Search</title>
    </head>
    <body>
        <h1>Book Search</h1>
        <div>
            <form action='bookSearch.php' method="POST">
                Search: <input type='text' name='inputSearch' required></input>
                <input type='hidden' name='bookSearch' value='TRUE'></input>
                <input type='submit' value='Search'></input><br>
                (Search Results From Amazon)
            </form><br><br>
        </div>
     <?php  

     if (array_key_exists('bookSearch', $_POST)) {
        
        $mySearch = $_POST['inputSearch'];
        searchBooks($mySearch, $public_key, $private_key, $associate_tag);
    } 
    if ("cli" !== PHP_SAPI)
    {
        echo "</pre>";
    }

?>
    </body>
</html>