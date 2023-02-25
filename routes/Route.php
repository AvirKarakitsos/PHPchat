<?php

namespace Router;

//use App\Controllers\SiteController; ne marche pas ligne 48

class Route{

    public $path;
    public $action;
    public $matches;

    public function __construct($path,$action)
    {
        $this->path = trim($path,'/');
        $this->action = $action;
    }

    public function matches(string $url)
    {   
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

        // users/:id => users/([^/]+)  si :id existe, 
        //sinon preg_replace ne fait rien

        $pathToMatch = "#^$path$#";

        if (preg_match($pathToMatch, $url, $matches)){
            $this->matches = $matches;

            //preg_match(  "#^users/([^/]+)$#"  , users/12  , $matches  )
            //$matches[0] contient $url
            //$matches[1] contient ce qui match entre () ie l'id

            return true;
        }else{
            return false;
        }
    }

    public function execute(){
        
        $params = explode('@', $this->action);

        $controller = new $params[0]();  // = new SiteController()
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }

}