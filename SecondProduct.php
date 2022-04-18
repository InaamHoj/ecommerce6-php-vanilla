<?php 
namespace VirtualProduct;

interface IProduct {
    public function getpriceHT();
    public function getpriceTTC();
    public function showproduct();
}

class Product implements IProduct
{
    protected float $prix_HT;
    public float $TVA;
    protected float $prix_TTC;
    public string $nom;
    public string $categorie;
    public string $description;


    public function __construct($prix_HT, $nom, $categorie ,$description) 
    {
        $this->prix_HT = $prix_HT;
        $this->TVA = $this->prix_HT*0.2;
        $this->prix_TTC = $this->prix_HT+$this->TVA;
        $this->nom = $nom;
        $this->categorie= $categorie;
        $this->description = $description;
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
    echo "<br> description:". $this->description; 
}
}