<?php
    class controlFacture {

    private $_modelsFacture;
    private $_view;
    public function __construct($url){
        if(isset($url)&& count($url)>1){
            echo $twig->render('Erreur.twig', 
                    [
                        'Erreur' => 'Erreur 404: page introuvale'
                    ]);
        }else{
            $this->facture();
        }
    }
    private function facture(){
        $this->_modelsFacture= new modelFacture;
        $facture=$this->_modelsFacture->getFacture();
        require_once('views/Facture.twig');
    }

}