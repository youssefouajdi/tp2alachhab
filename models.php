<?php       
    require_once('model/models.php');
    require_once('vendor/autoload.php');
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);
    $lexer= new Twig_Lexer($twig, [
        'tag_block' => ['{','}'],
        'tag_variable' => ['{{ $','}}']
    ]
    );
    $twig->setLexer($lexer);
    abstract class models{
        private static $_bdd;
        private static function setbdd(){
            self::$_bdd = new PDO('mysql:host=localhost;dbname=facturElect;charset=utf8','root','');
                self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        }
        protected function getbdd(){
            if(self::$_bdd==null){
                self::setbdd();
            }
            return self::$_bdd;
        }
        protected function query($table , $obj){
            $var= [];
            $req= $this->getbdd()->prepare('SELECT *FROM '.$table);
            $req->execute();
            while($data= $req->fetch(PDO::FETCH_ASSOC))
            {
                $var= new $obj($data);
            }
            return $var;
            $req->closeCursor();
        }
      }