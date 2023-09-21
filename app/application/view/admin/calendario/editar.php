<?php
$title = '';
$css = [
    '',
];
$script = [
'',
];
require APP . 'view/admin/_templates/initFile.php';
?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-md-12">
            <h2>Agenda</h2>
        </div>
    </div>

    <div class="col-md-12 m-t-md">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Alterar Evento</h5>
            </div>

            <div class="ibox-content">
                <form action="<?= URL_ADMIN . '/agenda/salvar' ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" value="<?= isset($response['titulo']) ? $response['titulo'] : '' ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data <?= isset($response['data_evento']) ? date("Y-m-d\TH:i", strtotime($response['data_evento'])) : '' ?></label>
                                        <input type="datetime-local" name="data_evento" class="form-control" value="<?= isset($response['data_evento']) ? date("Y-m-d", strtotime($response['data_evento'])) : '' ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea name="descricao" class="form-control"><?= isset($response['descricao']) ? rtrim(trim($response['descricao'])) : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="hr-line-dashed m-t-sm"></div>
                            <div class="form-group m-b-n-sm">
                                <input type="hidden" name="id" value="<?= isset($response['id']) ? $response['id'] : '' ?>">
                                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                                <input type="hidden" name="id_update_user" value="<?= $_SESSION['id_user'] ?>">
                                <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Salvar</strong></button>
                                <a href="javascript:history.back()" class="btn btn-default m-t-n-xs"><strong>Voltar</strong></a>
                            </div>
                        </div>

                    </div>

                </form>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>