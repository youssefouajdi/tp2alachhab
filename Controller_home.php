<?php
    require_once 'vendor/autoload.php';

    
    class Controller_home
    {
        private $_ctrl;
        private $_view;

        public function routeReq(){
            $loader = new Twig_Loader_Filesystem('views');
            $twig = new Twig_Environment($loader);
            $lexer= new Twig_Lexer($twig, [
                'tag_block' => ['{','}'],
                'tag_variable' => ['{{ $','}}']
            ]
            );
            $twig->setLexer($lexer);
           
            try{
                spl_autoload_register(function($class){
                    require_once('model/'.$class.'.php');
                });

                $url='';
                if(isset($_GET['url']))
                {
                    $url=explode('/', filter_var($_GET['url'],FILTER_SANITIZE_URL));
                    $controller=ucfirst(strtolower($url[0]));
                    $controllerclass="control".$controller;
                    $controllerFile="controller/".$controllerclass.".php";
                    if(file_exists($controllerFile))
                    {
                        require_once($controllerFile);
                        $this->_ctrl= new $controllerclass($url);
                    }
                    else{
                        echo $twig->render('Erreur.twig', 
                        [
                            'Erreur' => 'Erreur 404: page introuvale'
                        ]);
                    }
                }
                else{
                   
                require_once('controller/controlAcceuil.php');
                    $this->_ctrl =new modelClient($url);
                }
            }catch(Exception $e){
                $errorMsg = $e->getMessage();
                echo $twig->render('Erreur.twig', 
                    [
                        'Erreur' => $errorMsg
                    ]);

            }
        }
    }