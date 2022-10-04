
<div class="container-fluid">
<?php // print_r($listaUsuarios); ?>
    <div class="alert alert-success" role="alert">
    A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
    </div>
    <div class="row justify-content-md-center">
        <div class="col-7">
            <h4>Crear Usuario</h4>
            <br>
            <?php $attributes = ['id' => 'newUser']; echo form_open('Usuario/insertaNuevoUsuario', $attributes); ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="rut" name="rut" placeholder="123456789">
                    <label for="rut">Rut</label>
                </div>
                <div class="form-floating">
                <select class="form-select" id="tipoUsuario" name="tipoUsuario" aria-label="Floating label select example">
                    <option selected>Seleccione un tipo de usuario</option>
                        <?php foreach ($listaTipoUsuario as $item):?>
                            <tr>
                                <option value="<?php echo $item['id_tipoUsuarios'];?>"> <?php echo $item['nombre'];?> </option>
                            </tr>
                        <?php endforeach;?>
                    </select>
                    <label for="floatingSelect">Tipo de Usuario</label>
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
                            <input type="email" class="form-control" id="email" name="email">
                            <label for="floatingInputGrid">Email</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombres" name="nombres">
                    <label for="floatingInput">Nombres</label>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aPaterno" name="aPaterno">
                            <label for="floatingInput">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aMaterno" name="aMaterno">
                            <label for="floatingInput">Apellido Materno</label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>
        </div>
    </div>
</div>