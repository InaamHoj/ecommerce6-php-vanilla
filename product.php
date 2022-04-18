<?php 
namespace PhysicalProducts;


interface IProduct {
    public function stockupdate ();
    public function getpriceHT();
    public function getpriceTTC();
    public function showproduct();
}

abstract class Product implements IProduct
{
    protected float $prix_HT;
    public float $TVA;
    protected float $prix_TTC;
    public string $nom;
    public string $categorie;
    public int $stock;
    public string $description;
   


    public function __construct($prix_HT, $nom, $categorie, $stock ,$description) 
    {
        $this->prix_HT = $prix_HT;
        $this->TVA = $this->prix_HT*0.2;
        $this->prix_TTC = $this->prix_HT+$this->TVA;
        $this->nom = $nom;
        $this->categorie= $categorie;
        $this->stock = $stock;
        $this->description = $description;
    }

    public function stockupdate () {
        return $this->prix_HT*$this->stock;
    }
    /* Methode getter pour accéder à la pripriété price HT */
    public function getpriceHT() {
      return $this->prix_HT."€";
    }

    public function getpriceTTC() {
        return $this->prix_TTC."€";
    }

   
    public function showproduct() {
    
    echo "Prix_HT:". $this->getpriceHT(); 
    echo "<br> TVA:". $this->TVA; 
    echo "<br> Prix_TTC:". $this->getpriceTTC(); 
    echo "<br> Nom:". $this->nom; 
    echo "<br> Categorie:". $this->categorie; 
    echo "<br> Stock:". $this->stock; 
    echo "<br> description:". $this->description; 
    echo "<br> valorisation de stock:". $this->stockupdate();
}
    
}


class Books extends Product {
    protected string $auteur;
    protected string $format;

    public function __construct($prix_HT, $nom, $categorie, $stock ,$description, $auteur, $format) 
    {
        $this->prix_HT = $prix_HT;
        $this->TVA = $this->prix_HT*0.055;
        $this->prix_TTC = $this->prix_HT+$this->TVA;
        $this->nom = $nom;
        $this->categorie= $categorie;
        $this->stock = $stock;
        $this->description = $description;
        $this->auteur= $auteur;
        $this->format = $format;
    }

    public function showproduct()  {
      
        echo "Prix_HT:". $this->getpriceHT(); 
        echo "<br> TVA:". $this->TVA; 
        echo "<br> Prix_TTC:". $this->getpriceTTC(); 
        echo "<br> Nom:". $this->nom; 
        echo "<br> Categorie:". $this->categorie; 
        echo "<br> Stock:". $this->stock; 
        echo "<br> description:". $this->description; 
        echo "<br> valorisation de stock:". $this->stockupdate();
        echo "<br> Auteur:". $this->auteur; 
        echo "<br> Format:". $this->format; 
    }
    
}


class VideoGames extends Product {
    protected string $type;
    protected int $age;
    protected float $critique;


    public function __construct($prix_HT, $nom, $categorie, $stock ,$description, $type, $age, $critique) 
    {
        $this->prix_HT = $prix_HT;
        $this->TVA = $this->prix_HT*0.2;
        $this->prix_TTC = $this->prix_HT+$this->TVA;
        $this->nom = $nom;
        $this->categorie= $categorie;
        $this->stock = $stock;
        $this->description = $description;
        $this->categorie= $categorie;
        $this->type = $type;
        $this->age = $age;
        $this->critique = $critique;
    }

    public function ageverification($age) { 
// $age= 18, c'est le paramètre que j'ai saisi pour vérifer l'age mais $this->age c'est l'age saisi dans l'input //
        if ($this->age >= $age) {
            return "ok, tu as plus de<br>".$age."ans, tu peux jouer";
        } else{
            return "pas ok, tu es mineur";
        }
    } 

    public function canIBuy($prix_TTC) {  
// $prix_TTC= 50 est passé en paramètre dans l'appel pour vérifier le montant, $this.prix_TTC c'est le prix calculé dans l'input //
        if ($this->prix_TTC <= $prix_TTC) {
            return "ok, tu as plus <br>".$prix_TTC."€, tu peux acheter";
        } else{
            return "pas ok, tu es pauvre";
        }
    }


    public function showproduct() {
      
        echo "Prix_HT:". $this->getpriceHT(); 
        echo "<br> TVA:". $this->TVA; 
        echo "<br> Prix_TTC:". $this->getpriceTTC(); 
        echo "<br> Nom:". $this->nom; 
        echo "<br> Categorie:". $this->categorie; 
        echo "<br> Stock:". $this->stock; 
        echo "<br> description:". $this->description; 
        echo "<br> valorisation de stock:". $this->stockupdate();
        echo "<br> Type:". $this->type; 
        echo "<br> Age:". $this->age;
        echo "<br> Moyenne des critiques:". $this->critique; 
    }
}