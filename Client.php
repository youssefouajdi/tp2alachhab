<?php
    class Client{
        private $id;
        private $nom;
        private $prenom;
        private $age;
        private $num;
        private $email;

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
        
        
        public function setid($id){
            $this->id = $id;
          }
      public function setnom($nom){
        $this->nom = $nom;
      }
      public function setprenom($prenom){
      $this->prenom = $prenom;
      }       
      public function setage($age){
        $this->age = (int)$age;
      }
      public function setnum($num){
        $this->num = (int)$num;
      }
      public function setemail($email){
      $this->email=$email;
      }
      public function getid(){
        return $this->id;
      }
      public function getnom(){
        return $this->nom;
      }
      public function getprenom(){
        return $this->prenom;
      }        
      public function getage(){
        return $this->age;
      }
      public function getnum(){
        return $this->num;
      }
      public function getemail(){
        return $this->email;
      }
        
    }
    
  ?>