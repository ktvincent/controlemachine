<!doctype html>
<?php (require 'parametres.php.inc'); ?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Capitale</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>
  <body>
    <?php 
      extract($_POST);
      if (isset($capitale)){
        $resCap = $capitale;   
      }
        
    ?>
    
    
    
    <?php
     $pdo = new PDO ("mysql:host=".$host.";dbname=".$bdd, $user, $password);
      $selectCap = $pdo->query("SELECT nom FROM capitale");
    ?>
    <form method="post" action="capitale.php">
      <fieldset>
        <legend>
          <h2>
            Capitales européennes
          </h2>
        </legend>
        <select name="capitale">
        <?php while($resultat = $selectCap->fetch()){
          echo "<Option value=".$resultat['nom'].">".$resultat['nom'];
        }
        ?> 
      </select>
      <input type="submit" value="Envoyer"> 
        
      </fieldset>
      
      <fieldset>
        <h2>
          <?php 
            echo $capitale."</br>";
            echo "</h2>";
            $selectImg = $pdo->query("SELECT image,id FROM capitale where nom='$capitale'");
            while ($img = $selectImg->fetch()){
              $src = $img['image'];
              $idD = $img['id'];
            }
            
            $distance = $pdo->query("SELECT id1,id2,distance FROM distance where id1='$idD'");
            $distE = 0;
            while ($dist = $distance->fetch()){
              if ($distE < $dist['distance']){
                $distE = $dist['distance'];
                $idDistE = $dist['id2'];
                $idDistP = $dist['id2'];
              }
            }
            $capDistE = $pdo->query("SELECT nom FROM capitale where id='$idDistE'"); 
            while ($capitaleE = $capDistE->fetch()){
              $capE = $capitaleE['nom'];
            }  
          
            $distance = $pdo->query("SELECT id1,id2,distance FROM distance where id1='$idD' AND id1!=id2");
            $distP = $distE;
            while ($dist = $distance->fetch()){
              if ($distP > $dist['distance']){
                $distP = $dist['distance'];
                $idDistP = $dist['id2'];
              }
            }
            $capDistP = $pdo->query("SELECT nom FROM capitale where id='$idDistP'"); 
            while ($capitaleP = $capDistP->fetch()){
              $capP = $capitaleP['nom'];
            }  

          ?>
        <img border="0" alt="cap" src="<?php echo $src ?>" >
          </br>
        <ul>
          <li>Capitale la plus proche : <?php echo $capP.'('.$distP.'km )'; ?></li>  
          <li>Capitale la plus éloignée : <?php echo $capE.'('.$distE.'km )'; ?></li>  
        </ul>
          
       
        
        
      </fieldset>
      
      
    </form>
  </body>
</html>