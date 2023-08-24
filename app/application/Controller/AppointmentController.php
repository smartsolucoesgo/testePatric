<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\User;
use SmartSolucoes\Libs\Helper;

class AppointmentController
{
    private $baseView = 'admin/appointment';
    private $urlIndex = 'appointments';

    public function index()
    {
        Helper::view($this->baseView . '/index', []);
    }
}
