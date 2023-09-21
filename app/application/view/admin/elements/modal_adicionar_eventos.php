<!-- Modal -->
<div class="modal fade" id="modalCriarCompromisso" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold" id="myModalLabel">Adicionar Evento</h4>
            </div>
            <form action="<?= URL_ADMIN . '/calendario/salvar' ?>" method="post" id="formEventos" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="titulo">Evento: *</label>
                                <input type="text" name="titulo" class="form-control input-sm" id="titulo" placeholder="Evento:" />
                            </div>
                        </div>
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="data_evento">Data Evento:</label>
                                <input type="date" name="data_evento" class="form-control input-sm" id="data_evento" />
                            </div>
                        </div>
                    </div><!-- end row -->

                    <div class=" row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descricao" class="control-label">Descrição:</label>
                                <textarea name="descricao" class="form-control" id="descricao"></textarea>
                            </div>
                        </div>
                    </div><!-- end row -->

                </div><!-- end modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success btn-sm saveBtn">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- end modal -->

<script>
    $(document).ready(function() {
        $("#formEventos").submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if (response.code == 200) {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: response.message,
                            type: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                $('#modalCriarCompromisso').modal('hide');
                                $('#formEventos')[0].reset();

                                location.reload();
                            }
                        });
                    }
                },
                error: function(data) {
                    alert('Ocorreu um erro inesperado!');
                }
            });
        });
    });
</script>