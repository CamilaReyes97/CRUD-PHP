<?php

/* Configuracion de las url en caso de Mac o Windos */
function getFolderProject(){
    if (strpos(__DIR__, '/') !== false) {
        $root = str_replace('/opt/lampp/htdocs/', '/', __DIR__);
      } else {
        $root = str_replace('C:\\xampp\\htdocs\\', '/', __DIR__);
      }
      $root = str_replace('config', '', $root);
      return $root;
}

function saveImage($files){
/* LE QUITAMOS LOS ESPACIOS Y ACORTAMOS EL NOMBRE A LA IMG */
$file_name = str_replace(' ', '', $files['imagen']['name']);
  $file_tmp = $files['imagen']['tmp_name'];
 /* GUARDAMOS LA IMG TEMPORALMENTE */

move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . getFolderProject() . '/images/' . $file_name); /* INDICAMOS LA RUTA DONDE SE VA ALMACENAR ESA IMAGEN */

return $file_name; /* ACTIVA LA FUNCION */
}

?>
