<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\Calendario;
use SmartSolucoes\Libs\Helper;

class CalendarioController
{

	private $table = 'calendario';
    private $baseView = 'admin/calendario';
    private $urlIndex = 'configuracoes';

    public function index()
    {
        $model = New Calendario();
        Helper::view($this->baseView.'/index');
    }    

}

