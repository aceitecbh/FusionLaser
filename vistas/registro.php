<div class="section">
    <?php 
        require_once "./php/main.php";
    ?>

    <div class="form-rest px-6"></div>
    <?php include "./include/btn_back.php";?>

    <form action="./php/usuario_nuevo.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
        <div class="card">
            <div class="card-header">
                <div class="card-header-title is-centered">
                    <h1 class="title">Registrate</h1>
                </div>
            </div>
            <div class="card-content">
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Nombres</label>
                            <input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required >
                        </div>
                    </div>
                    <div class="column">
                        <div class="control">
                            <label>Apellidos</label>
                            <input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30" required >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Rut</label>
                            <input class="input" type="text" name="usuario_rut" pattern="[0-9]{1,10}" maxlength="10" required >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Usuario</label>
                            <input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,30}" maxlength="30" required >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Correo</label>
                            <input class="input" type="email" name="usuario_email" maxlength="70" >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Contraseña</label>
                            <input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
                        </div>
                    </div>
                    <div class="column">
                        <div class="control">
                            <label>Repetir contraseña</label>
                            <input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Dirección</label>
                            <input class="input" type="text" name="usuario_direccion" maxlength="100" required >
                        </div>
                    </div>
                </div>
                <p class="has-text-centered">
                    <button type="submit" class="button is-info is-rounded">Registrarse</button>
                </p>
            </div>
        </div>
    </form>
</div>