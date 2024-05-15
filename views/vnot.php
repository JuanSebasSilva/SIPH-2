<div class="fondo">
    <div class="noti">
        <h2 class="l">Envio de notificacion</h2>
        <form method="POST">
            <label class="espacios" for="apartamento">Numero de apartamento</label>
            <select class="op" id="apartamento" name="apartamento">
                <option class="des" value="Luis Dueñas">Luis Dueñas</option>
                <option class="des" value="Daniela Perez">Daniela Perez</option>
                <option class="des" value="Katerine Rodriguez">Katerine Rodriguez</option>
                <option class="des" value="Juan Dueñas">Juan Dueñas</option>
                <option class="des" value="Erika Rodriguez">Erika Rodriguez</option>
                <option class="des" value="Daniel Escobar">Daniel Escobar</option>
            </select>
            <label class="espacios" for="correo">Correo</label>
            <input class="barra" type="email" id="correo">
            <label for="asunto" class="espacios"> Asunto
                <select class="op" name="asunto" id="asunto">
                    <option value="Visitas">Visitas</option>
                    <option value="Recibos">Recibos</option>
                    <option value="Correspondencia">Correspondencia</option>
                    <option value="Domicilios">Domicilios</option>
                    <option value="Vencimiento de administración">Vencimiento de administración</option>
                </select>
            </label>
            <label class="espacios" for="comen">Comentario</label>
            <textarea id="comen" cols="62" rows="5" name="comen"></textarea>
            <center>
                <br> <br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>
            </center>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Notificación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>