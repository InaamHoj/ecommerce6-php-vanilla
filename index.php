<?php include __DIR__."/product.php";
include __DIR__."/SecondProduct.php";

use PhysicalProducts\Books as BooksProduct;
use PhysicalProducts\VideoGames as VideoGameProduct;
use VirtualProduct\Product as RealEstate;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
</head>
<body>
    <div class="bigcontainer">
<div>
<h1>Client form</h1><br>
<form action="index.php" method="post">
    <input name="prix_HT" type="number" step="0.01" placeholder="prix_HT" />
    <br><input name="nom" type="text" placeholder="nom" />
    <br><input name="categorie" type="text" placeholder="categorie" />
    <br><input name="stock" type="number" placeholder="stock" />
    <br><input name="description" type="text" placeholder="description" />
    <br><input name="auteur" type="text" placeholder="auteur" />
    <br><input name="format" type="text" placeholder="format" />
    <br><input name="type" type="text" placeholder="type" />
    <br><input name="age" type="number" placeholder="age" />
    <br><input name="critique" type="number" step="0.01" placeholder="critique" />
    <br><input type="submit" value="submit" />
</form>
</div>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
?>
<div>
<h1> Books Category </h1>
<?php
    $myBook = new BooksProduct (
        $_POST["prix_HT"],
        $_POST["nom"],
        $_POST["categorie"],
        $_POST["stock"],
        $_POST["description"],
        $_POST["auteur"],
        $_POST["format"],
        );
    
    $myBook->showproduct(); 
?> </div>
<br> <div><h1> Video Games Category </h1>
    <?php
        $myvideoGames = new VideoGameProduct (
            $_POST["prix_HT"],
            $_POST["nom"],
            $_POST["categorie"],
            $_POST["stock"],
            $_POST["description"],
            $_POST["type"],
            $_POST["age"],
            $_POST["critique"],
            );
        
    $myvideoGames->showproduct(); 

    echo $myvideoGames->ageverification(18);

    echo $myvideoGames->canIBuy(50);

?> </div>

<br> <div><h1>Real Estate</h1>
    <?php
        $myRealEstate = new RealEstate (
            $_POST["prix_HT"],
            $_POST["nom"],
            $_POST["categorie"],
            $_POST["description"],
            $_POST["type"],
            );
        
    $myRealEstate->showproduct(); 
}

?> </div>
</div>
        
</body>
</html>