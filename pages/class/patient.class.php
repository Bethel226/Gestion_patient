<?php

class Patient
{
  private $id;
  private $nom;
  private $prenom;
  private $genre;
  private $telephone;
  private $adresse;
  private $age;
  private $g_sanguin;
  private $m_actuelle;
  private $antecedant;

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

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getG_sanguin()
    {
        return $this->g_sanguin;
    }
    public function getM_actuelle()
    {
        return $this->m_actuelle;
    }

    public function getAntecedant()
    {
        return $this->antecedant;
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

    public function setSexe($genre)
    {
        $this->genre = $genre;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setG_sanguin($g_sanguin)
    {
        $this->g_sanguin = $g_sanguin;
    }

    public function setM_actuelle($m_actuelle)
    {
        $this->m_actuelle = $m_actuelle;
    }

    public function setAntecedant($antecedant)
    {
        $this->antecedant = $antecedant;
    }
}


