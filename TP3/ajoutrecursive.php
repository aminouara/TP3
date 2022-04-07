 <P>
  <B>DEBUTTTTTT DU PROCESSUS :</B>
  <BR>
  <?php echo " ", date ("h:i:s"); ?>
  </P>



  
  <?php
  
  function before ($a, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $a));
    };


    

  
  set_time_limit (500);
  $path= "docs";
  
  
  
  function explorerDir($path)
  {
     
  
    $folder = opendir($path);
    
   
    while($entree = readdir($folder))
    {		
      
      if($entree != "." && $entree != "..")
      {
        //
        if(is_dir($path."/".$entree))
        {
            
          $sav_path = $path;
          //
          $path .= "/".$entree;
          //			
          explorerDir($path);
          //
          $path = $sav_path;
        }
        else
        {
          //
          $path_source = $path."/".$entree;				
         
          $allow_ext = array("jpg", "png" , 'jpeg');
          $extension=  strtolower(substr($path_source , -3));
          if( in_array($extension , $allow_ext)){
          $conn = mysqli_connect('127.0.0.1', 'root', '');  
  
      if (! $conn) {  
  
          die("Connection failed" . mysqli_connect_error());  
  
      }
      // on selectionne la base de données
      mysqli_select_db($conn, 'pagination'); 
      
      //on insere les données  dans la table 
     
      $size =filesize($path_source);
      $nom= basename ( $path_source,'.');
      $nomp =before ( '-',$nom);
      
      echo"</br>";
      $extension=  strtolower(substr( $nom, -3));
      $chemin = $path_source;
      $sql=" INSERT IGNORE INTO `galerie` (`id`, `nom`, `chemin`,`taille`, `extension`)
      VALUES('','$nomp','$chemin','$size','$extension')";
  
      if (!mysqli_query($conn,$sql))
      {
      die('impossible d’ajouter cet enregistrement : ' .  mysqli_connect_error());
      }
      //echo "L’enregistrement est ajouté ";
      mysqli_close($conn);
      
        }
      }
    }
  }
    closedir($folder);
    
  }
  explorerDir($path);
  
  ?>
  <P>
  <B>FINNNNNN DU PROCESSUS :</B>
  <BR>

  <?php echo " ", date ("h:i:s"); ?>
  </P>
  