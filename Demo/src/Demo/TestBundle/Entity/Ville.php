<?php

namespace Demo\TestBundle\Entity;

 class Ville
{
    protected $name;

     protected $postal;
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }


     public function getPostal() {
         return $this->postal;
     }

     public function setPostal($postal) {
         $this->postal = $postal;
     }
}