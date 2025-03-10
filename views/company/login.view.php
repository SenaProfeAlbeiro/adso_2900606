<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Iniciar Sesión</h1>        
    </div>
</div>

<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-4 m-auto" accion="" method="POST" role="form">            
            <div class="mb-3 text-center">
            <div class="mb-3 ">
                <label for="inputsubject">Email</label>
                <input type="email" class="form-control mt-1" id="subject" name="user_email" placeholder="correo@correo.com">
            </div>
            <div class="mb-3 text-center">
                <label for="inputsubject">Contraseña</label>
                <input type="password" class="form-control mt-1" id="subject" name="user_pass" placeholder="Entre 5 y 8 caracteres">
            </div>
            <div class="row">
                <div class="col text-center mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3">Enviar</button>
                </div>
            </div>
        </form>
        <?php echo $message ?>
    </div>
</div>    