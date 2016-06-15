<?php 
  extract($_POST);
  if (isset($langue)){
      if ($langue == 'francais') {
        echo "Bonjour";
      }
      if ($langue == 'anglais') {
        echo "Hello";
      }
      if ($langue == 'espagnol') {
        echo "Hola";
      }
  }