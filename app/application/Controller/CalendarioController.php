<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Libs\Helper;
use SmartSolucoes\Model\Calendario;

class CalendarioController {

    public function index() {
        Helper::view('admin/calendario/index');
    }

    public function listar() {
        $eventos = (new Calendario())->findAll('calendario');

        if ($eventos) {
            foreach ($eventos as $evento) {
                $data[] = [
                    'id' => $evento['id'],
                    'title' => $evento['titulo'],
                    'start' => $evento['data_evento'],
                    'url' => '/calendario/edit/' . $evento['id']
                ];
            }
        } else {
            $data = [];
        }


        echo json_encode($data);
    }

    public function create() {
        $_POST['id_update_user'] = $_SESSION['id_user'];

        (new Calendario())->create('calendario', $_POST, ['id', 'id_update_user']);

        Helper::response()->json();
    }

    public function edit() {
        $evento = (new Calendario())->find('calendario', $_POST['id']);

        Helper::view('admin/calendario/edit', $evento);
    }

    public function update() {
        (new Calendario())->save('calendario', [
            "id" => $_POST['id'], 
            "titulo" => $_POST["titulo"], 
            "descricao" => $_POST['descricao'], 
            "data_evento" => $_POST['data_evento']
        ]);

        header('location: ' . URL_ADMIN . '/calendario');
    }

    public function delete(array $request) {
        (new Calendario())->delete('calendario', 'id', $request['id']);

        header('location: ' . URL_ADMIN . '/calendario');
    }
}
