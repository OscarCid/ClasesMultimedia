<?php
$estadoLog = false;
if (isset($session)) 
{
    if($session->has('isLoggedIn'))
    {
        if($session->isLoggedIn)
        {
            $estadoLog = true;
        }
    }
}
?>

<div class="container">
<?php // print_r($listaUsuarios); ?>
    <div class="alert alert-success" role="alert">
    A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
    </div>
    <div class="row">
        <div class="col">
            <table id="TablaTipoUsuarios" class="table table-striped display">
                <thead>
                    <tr>
                        <th>Id Usuario</th>
                        <th>Rut Usuario</th>
                        <th>Nombre y Apellidos</th>
                        <th>Fecha Nacimiento</th>
                        <th>Correo Electronico</th>
                        <th>Perfil Usuario</th>
                        <th>Fecha Creacion Usuario</th>
                        <?php
                            if($estadoLog) { echo "<th>Acciones</th>"; }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaUsuarios as $item):?>
                        <tr>
                            <td><?php echo $item['id_usuario'];?></td>
                            <td><?php echo $item['rut'];?></td>
                            <td><?php echo $item['nombres'];?> <?php echo $item['aPaterno'];?> <?php echo $item['aMaterno'];?></td>
                            <td>
                                <?php 
                                if($item['fechaNac'] != "0000-00-00")
                                {
                                    $fechaformat = new DateTime($item['fechaNac']);
                                    echo date_format($fechaformat ,"d/m/Y");
                                }
                                else
                                {
                                    echo "No Informado";
                                }
                                    
                                ?>
                            </td>
                            <td><?php echo $item['email'];?></td>
                            <td><?php echo $item['nombre'];?></td>
                            <td><?php echo $item['created_at'];?></td>
                            <?php
                                if($estadoLog) 
                                { 
                                    ?>
                                    <td>
                                    <a type='button' data-bs-toggle='tooltip' data-bs-title='Editar' href='<?php echo base_url('Usuario/editarUsuario/'.$item['id_usuario']); ?>' class='btn btn-info btn-sm'><i class='bi bi-pencil-square'></i></a>
                                    <a type='button' data-bs-toggle='tooltip' data-bs-title='Eliminar' href='<?php echo base_url('Usuario/eliminarUsuario/'.$item['id_usuario']); ?>' class='btn btn-danger btn-sm'><i class='bi bi-trash3-fill'></i></a>
                                    </td>
                                    <?php
                                }
                            ?>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <img src="<?php base_url() ?>images/Cat.jpg" alt="Michi">

        Felicidades estamos en github
        Sí. Funcionó.

        <div class="qrcode" value="https://acceso.upla.cl/sinte" display-label="true" label-position="top" label-font-size="20">
            <br>
            <br>
    </div>
</div>

