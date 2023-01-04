<?php
$title = '  - Compromissos';
$css = [
    '',
];
$script = [
    '',
];
require APP . 'view/admin/_templates/initFile.php';
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Calendário de compromissos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL_ADMIN ?>/dashboard">Inicio</a>
            </li>
            <li class="active">
                <strong>Editar Compromissos</strong>
            </li>
        </ol>
    </div>
</div><br>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Preencha os dados</h5>
                </div>
                <div class="ibox-content">
                    <form role="form" method="post" action="<?= isset($response['id']) ? URL_ADMIN . '/calendario/salvar' : URL_ADMIN . '/calendario/cadastrar' ?>" autocomplete="off">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="nome" placeholder="" class="form-control" value="<?= isset($response['nome']) ? $response['nome'] : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                <script>
                                    $('select[name=status]').val('<?= isset($response['status']) ? $response['status'] : '' ?>')
                                </script>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Inicio</label>
                                <input type="date" name="data_compromisso" placeholder="" class="form-control" value="<?= isset($response['data_compromisso']) ? $response['data_compromisso'] : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Final</label>
                                <input type="date" name="data_final" placeholder="" class="form-control" value="<?= isset($response['data_final']) ? $response['data_final'] : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Horário</label>
                                <input type="time" name="horario" placeholder="" class="form-control" value="<?= isset($response['horario']) ? $response['horario'] : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Descricao</label>
                                <input type="text" name="descricao" id="descricao" placeholder="" class="form-control" value="<?= isset($response['descricao']) ? $response['descricao'] : '' ?>" required>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                            <input type="hidden" name="id" value="<?= isset($response['id']) ? $response['id'] : '' ?>">
                            <button class="btn btn-success m-t-n-xs" type="submit"><strong>Salvar</strong></button>
                            <a href="<?= URL_ADMIN ?>/calendario" class="btn btn-default m-t-n-xs"><strong>Voltar</strong></a>
                        </div>
                        <div class="col-lg-5"></div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>