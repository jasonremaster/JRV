<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="jrv_id" name="jrv_id">

                    <div class="form-group">
                        <label class="form-label" for="jrv_nom">Nombre junta</label>
                        <input type="text" class="form-control" id="jrv_nom" name="jrv_nom" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="jrv_cant">Cantidad de Votantes</label>
                        <input type="text" class="form-control" id="jrv_cant" name="jrv_cant" placeholder="Ingrese Apellido" required>
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label" for="jrv_usu">USUARIO</label>
                        <select class="select2" id="jrv_usu" name="jrv_usu">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="sex_id">TIPO</label>
                        <select class="select2" id="sex_id" name="sex_id">
                            <option value="0">Masculino</option>
                            <option value="1">Femenino</option>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>