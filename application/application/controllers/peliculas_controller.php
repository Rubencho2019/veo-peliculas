<?php
defined('BASEPATH')OR exit(' No direct script access allowed');


class peliculas_controller extends AnotherClass
{

public function __construct(argument)
  {
  parent::__construct();
  }
  function index($codigo=0){
    if ($_POST) {
      $idCartelera=$_POST[idCartelera];
      $Peliculas['Titulo']=$_post['Titulo'];
      $Peliculas['resumen']=$_post['resumen'];
      $Peliculas['año']=$_post['año'];
      $Peliculas['pais']=$_post['pais'];
      $Peliculas['protagonistas']=$_post['protagonistas'];
      $Peliculas['directores']=$_post['directores'];
      $Peliculas['foto']=$_FILES['foto']['name'];

      if ($idCartelera>0) {
        $this->db->where('idCartelera',$idCartelera);
        $this->db->update('peliculas');

        echo "

        <script>

        alert('Pelicula Actualizada Correctamente');


        </script>

        ";

      }else {
          $this->db->insert('peliculas');

          echo "

          <script>

          alert('Pelicula Agregada Correctamente');


          </script>

          ";

          }

      function eliminar($codigo){

        $this->db->where('idCartelera',$codigo);
        $this->db->delete('peliculas');
        $link=base_url('peliculas_controller');


        echo "

        <script>

        alert('Pelicula Eliminada Correctamente');
        window.location='{link}';

        </script>

        ";

      }
      name=$Peliculas['foto']
      if ($_FILES['foto']['error']==0) {
        move_uploaded_file($_FILES['foto']['tmp_name'],"imagenes{name}");
      }



    }


    $this->load->view('Plantillas/header.php');
    $this->load->view('peliculas.php',  array('codigo'=>$codigo));
    $this->load->view('Plantillas/pie.php');
  }
}




 ?>
