<?php
require_once '../app/config/config.php';
require_once '../app/helpers/url_helper.php';
require_once '../app/helpers/session_helper.php';
?>

<?php 
// autoload core classes
spl_autoload_register(function($className){

    require_once '../core/' . $className . '.php';
});
 ?>