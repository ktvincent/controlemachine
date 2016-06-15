<!doctype html>
<?php (require 'parametres.php.inc'); ?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Tableau distances</title>
  </head>
  <body>
   
    <table border="1">

       <?php $pdo = new PDO ("mysql:host=".$host.";dbname=".$bdd, $user, $password);
         $selectCap = $pdo->query("SELECT nom FROM capitale");
         echo "<th>";
         while ($Cap = $selectCap->fetch()){
          echo "<td>".$Cap['nom']."</td>"; 
         }
         echo "</th>"
       ?>  
      <?php $pdo = new PDO ("mysql:host=".$host.";dbname=".$bdd, $user, $password);
         $selectCap = $pdo->query("SELECT nom,id FROM capitale");
         $selectDist = $pdo->prepare("SELECT distance FROM distance WHERE id1 = ?");
         while ($Cap = $selectCap->fetch()){
          $id1 = $Cap['id'];
          echo "<tr><td>".$Cap['nom']."</td>";
            $selectDist->bindParam(1,$id1);
            $selectDist->execute();
            while ($Capi = $selectDist->fetch()){
              echo "<td>".$Capi['distance']."</td>";
            }
           echo "<tr>";
         }
    
       ?>  
      
   
    
     
      
      
    </table>
  </body>
</html>