<?php

session_start();

function flash($name = '', $message = '')
{
   if (!empty($name) && !empty($message) && empty($_SESSION[$name])) {    
            unset($_SESSION[$name]);
         $_SESSION[$name] = $message;
   }
    elseif (empty($message) && !empty($_SESSION[$name])) {
         echo '<div class="alert alert-success">' . $_SESSION[$name] . '</div>';

         unset($_SESSION[$name]);
      }
   
}
 function isLoggedIn()
{
      if (isset($_SESSION['user_id']))
            return true;
      else return false;

} 