<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\Calendario;
use SmartSolucoes\Libs\Helper;

class CalendarioController
{

	private $table = 'compromisso';
    private $baseView = 'admin/calendario';
    private $urlIndex = 'compromisso';

    public function index()
    {
        $model = New Calendario();
        $response = $model->all('compromisso');
        Helper::view($this->baseView.'/index',$response);
    }    
    public function viewEdit($param)
    {
        $model = New Calendario();
        $response = $model->find($this->table,$param['id']);
        Helper::view($this->baseView.'/edit',$response);
    }
}

