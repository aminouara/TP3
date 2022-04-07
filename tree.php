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
            echo '<ol>';
            
            echo "+". $entree;
        echo "<br>";
       
            
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
            echo '</ol>';
          //
          $path_source = $path."/".$entree;				
         
          $allow_ext = array("jpg", "png" , 'jpeg');
          $extension=  strtolower(substr($path_source , -3));
          if( in_array($extension , $allow_ext)){
          
            echo$entree ;
            echo "<br>";
    
      
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
  