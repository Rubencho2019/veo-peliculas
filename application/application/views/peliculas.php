<?php
$CI=& get_instance();
$filas=CI->db->get('peliculas')->result_array();

$CI->db->where('idCartelera',$codigo);
$f=CI->db->get('peliculas')->result_array();

if (count($f)>0) {
  $fi=$f[0];

}else {
  $fi= array(
    'idCartelera'=>'';
    'Titulo'=>'';
    'resumen'=>'';
    'año'=>'';
    'pais'=>'';
    'protagonistas'=>'';
    'directores'=>'';
    'foto'=>'';


  );
}




?>


<form method="post" action="<?php echo base_url('peliculas_controller'); ?>"enctype="multipart/form-data">
  <div class="row">
    <h2 class="text-center"><span class="label label-success">Agregar Pelicula</span></h2>
    <div class="col col-md-6">

      <input type="hidden" name="idCartelera" value="<?php echo $fi['idCartelera']?>">
      <div class="form-group input-group">
        <span class="input-group-addon">Titulo</span>
        <input type="text" class="form-control" placeholder="Ingrese el Titulo" required name="titulo" value="<?php echo $fi['titulo']?>">
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Resumen</span>
        <textarea name="resumen"  placeholder="Ingrese el Resumen" required class="form-control"><?php echo $fi['resumen']?></textarea>
      </div>
      <div class="form-group input-group">
        <span class="input-group-addon">Año</span>
        <input type="text" class="form-control" placeholder="Ingrese el Año" required name="año" value="">
      </div>


</div>

<div class="col col-md-6">
  <div class="form-group input-group">
    <span class="input-group-addon">Pais</span>
    <input type="text" class="form-control" placeholder="Ingrese el pais" required  name="pais" value="">
  </div>
  <div class="form-group input-group">
    <span class="input-group-addon">Protagonistas</span>
    <textarea name="protagonistas"  placeholder="Ingrese los protagonistas" required  class="form-control"></textarea>

  </div>
  <div class="form-group input-group">
    <span class="input-group-addon">Directores</span>
    <textarea name="directores"  placeholder="Ingrese los directores" required  class="form-control"></textarea>

  </div>

  <div class="form-group input-group">
    <span class="input-group-addon">Imagen</span>
    <input type="file"class="form-control"placeholder="Ingrese la imagen" required  name="foto" value="">


  </div>
</div>
<div class="text-center">

   <?php

   if($codig==0){

     echo "
        <button class='btn btn-primary'type='submit'>Agregar Peliculas</button>
     ";

   }else {

     echo "
        <button class='btn btn-primary'type='submit'>Actualizar Peliculas</button>
     ";


   }



     ?>

  <button type="submit">Agregar Peliculas</button>
  <a class="btn btn-info" href="<?php echo base_url('peliculas_controller')?>">Nuevo</a>

</div>


</form>
<h2 class="text-center"><span class="label label-success">Peliculas Agregadas</span></h2>
<table class="table table-hower table-bordered">
  <thead>
    <tr>
      <th class="bg-primary">idCartelera</th>
      <th class="bg-primary">imagen</th>
      <th class="bg-primary">Titulo</th>
      <th class="bg-primary">Resumen</th>
      <th class="bg-primary">Año</th>
      <th class="bg-primary">Pais</th>
      <th class="bg-primary">Protagonistas</th>
      <th class="bg-primary">Directores</th>
      <th class="bg-primary">opciones</th>
    </tr>

  </thead>

  <tbody>

  <?php

  foreach ($filas as $fila) {

    $linkmodificar=base_url('peliculas_controller/index/'.$fila[idCartelera]);
     $linkeliminar=base_url('peliculas_controller/eliminar/'.$fila[idCartelera]);
     $linkimagen=base_url('imagenes');

    echo "
    <tr>
    <td>{$fila['idCartelera']}</td>
    <td>{$fila['Titulo']}</td>
    <td><a href="{$linkimagen}/{$fila['foto']}"><img src='{$linkimagen}/{$fila['foto']}'width='45px' heigth='95'></a></td>
    <td>{$fila['resumen']}</td>
    <td>{$fila['año']}</td>
    <td>{$fila['pais']}</td>
    <td>{$fila['protagonistas']}</td>
    <td>{$fila['directores']}</td>

    <td>
        <a href='$linkmodificar'class='btn btn-warning btn-sm'>Notificar</a>
        <a href='$linkeliminar'class='btn btn-danger btn-sm' onclick='return comfirm'(\"seguro que desea eliminar esta pelicula"\);'>Eliminar</a>

    </td>


    </tr>


  </tbody>



</table>
