<?php
class controlClient
{
    private $_modelsClient;
    private $_view;
    public function __construct($url){
        if(isset($url)&& count($url)>1){
            echo $twig->render('Erreur.twig', 
                    [
                        'Erreur' => 'Erreur 404: page introuvale'
                    ]);
        }else{
            $this->client();
        }
    }
    private function client(){
        $this->_modelsClient= new modelClient;
        $client=$this->_modelsClient->getClient();
        require_once('views/Client.twig');
    }
}