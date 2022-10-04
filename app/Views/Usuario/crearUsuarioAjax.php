
<div class="container-fluid">
<?php // print_r($listaUsuarios); ?>
    <div class="row justify-content-md-center">
        <div class="col-7">
            <h4>Crear Usuario Ajax</h4>
            <br>
            <form action="<?php echo base_url('Usuario/insertaNuevoUsuarioAjax'); ?>" id="newUser" class="needs-validation" novalidate method="post" accept-charset="utf-8">
                <div class="form-floating mb-3" id="DivRut">
                    <input type="text" class="form-control" id="rut" name="rut" placeholder="123456789" required>
                    <label for="rut">Rut</label>
                    <div class="invalid-feedback" id="DivAlertaRut">
                        Por favor ingrese un rut.
                    </div>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="tipoUsuario" name="tipoUsuario" required aria-label="Floating label select example">
                        <option selected>Seleccione un tipo de usuario</option>
                        <?php foreach ($listaTipoUsuario as $item):?>
                            <option value="<?php echo $item['id_tipoUsuarios'];?>"> <?php echo $item['nombre'];?> </option>
                        <?php endforeach;?>
                    </select>
                    <label for="floatingSelect">Tipo de Usuario</label>
                    <div class="invalid-feedback" id="DivAlertatipoUsuario">
                    </div>
                </div>
                <br>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
                            <label for="floatingInput">Fecha Nacimiento</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" required>
                            <label for="floatingInputGrid">Email</label>
                            <div class="invalid-feedback" id="DivAlertaEmail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                    <label for="floatingInput">Nombres</label>
                    <div class="invalid-feedback" id="DivAlertaNombres">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aPaterno" name="aPaterno" required>
                            <label for="floatingInput">Apellido Paterno</label>
                            <div class="invalid-feedback" id="DivAlertaaPaterno">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aMaterno" name="aMaterno" required>
                            <label for="floatingInput">Apellido Materno</label>
                            <div class="invalid-feedback" id="DivAlertaaMaterno">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="contrasenia1" name="contrasenia1" required>
                            <label for="floatingInput">Contrasenia</label>
                            <div class="invalid-feedback" id="DivAlertacontrasenia1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="contrasenia2" name="contrasenia2" required>
                            <label for="floatingInput">Repita Contrasenia</label>
                            <div class="invalid-feedback" id="DivAlertacontrasenia2">
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="ModalOK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
            </div>
            <div class="modal-body">
                Usuario ingresado con exito
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="<?php echo base_url(); ?>">Entendido!</a>
            </div>
            </div>
        </div>
        </div>

    </div>
</div>