<?php

class Patient
{
  private $id;
  private $nom;
  private $prenom;
  private $genre;
  private $addresse;
  private $telephone;
  private $age;
  private $g_sanguin;
  private $antecedant;
  private $m_actuelle;

  public function __construct(array $donnee){

    foreach ($donnee as $key => $value) {

        $methode='set'.ucfirst($key);
        
        if((method_exists($this,$methode))){
          $this->$methode($value);
        }
    }
  }

  // les getters

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getAddresse()
    {
        return $this->addresse;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getG_sanguin()
    {
        return $this->g_sanguin;
    }

    public function getAntecedant()
    {
        return $this->antecedant;
    }

    public function getM_actuelle()
    {
        return $this->m_actuelle;
    }

    // les setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setG_sanguin($g_sanguin)
    {
        $this->g_sanguin = $g_sanguin;
    }

    public function setAntecedant($antecedant)
    {
        $this->antecedant = $antecedant;
    }

    public function setM_actuelle($m_actuelle)
    {
        $this->m_actuelle = $m_actuelle;
    }
}


