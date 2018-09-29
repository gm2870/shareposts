<?php
//Router class gets incoming url and decides which controller should get activated.

class Router
{
    //for default controller
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
       
        //look in controllers to find a match for the first parameter of url
        if(file_exists('../app/controllers/'.ucwords($url[0]). '.php' )){
            // if exists set it as current controller  
            $this->currentController = ucwords($url[0]);
          
            // unset 0 index
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->currentController .'.php';

        // instantiating the controller for exp $Pages = new Pages
        $this->currentController = new $this->currentController;
        
        //check for second part of url
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                
                 // if exists set it as current method  
                 $this->currentMethod = $url[1];

                unset($url[1]);        
            }              
        }
        
        // and now get params
        $this->params = $url ? array_values($url) : [];

        //call a callback with array of params
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
    }

    //getting and filtering the url

    public function getUrl()
    {
        if (isset($_GET['url'])) {

           // remove the ending slash
            $url = rtrim($_GET['url'], '/');

            // removing any none url characters
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // get url characters as an array using explode function
            $url = explode('/',$url);

            return $url;
        }
    }
}
