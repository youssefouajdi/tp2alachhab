<?php
    class Facture{
        private $id_fac;
        private $prix;
        private $date_debut;
        private $date_fin;
        private $payee;
       

        function __construct(array $data){
          $this->hydrate($data);
         
        }
        public function hydrate( array $data){
            foreach( $data as $key=>$value){
                $method ='set'.$key;
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }
        /**
         * les getters et setters
         */
        
        
        public function setid_fac($id_fac){
            $this->id_fac = $id_fac;
          }
      public function setdate_debut($date_debut){
        $this->date_debut = $date_debut;
      }
      public function setdate_fin($date_fin){
      $this->date_fin = $date_fin;
      }       
      public function setprix($prix){
        $this->prix = (int)$prix;
      }
      public function setpayee($payee){
        $this->payee = (int)$payee;
      }
      
      public function getpayee(){
        return $this->payee;
      }
      public function getid_fac(){
        return $this->id_fac;
      }
      public function getdate_debut(){
        return $this->date_debut;
      }
      public function getdate_fin(){
        return $this->predate_debut;
      }        
      public function getprix(){
        return $this->prix;
      }
    }
    
  ?>