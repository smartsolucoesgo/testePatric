<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Libs\Helper;
use SmartSolucoes\Model\Appointment;

class AppointmentController
{
    private $baseView = 'admin/appointment';
    private $urlIndex = 'appointments';

    public function index()
    {
        Helper::view($this->baseView . '/index', []);
    }

    public function getAppointments()
    {
        $appointment = new Appointment();
        echo json_encode($appointment->findAll());
        exit;
    }

    public function store($param)
    {
        //TODO: needs validation
        $data = [
            'start' => $param['start'],
            'end' => $param['end'],
            'is_completed' => 0,
            'title' => $param['title']
        ];

        $appointment = new Appointment();
        $appointment->store($data);

        json_encode(['success' => true]);
        exit;
    }
}
