<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Calendario extends Model
{

    public function color($response)
    {
        foreach ($response as $key => $value) {
            if($value['status'] == 0 || strtotime($value['data_final']) <= strtotime(implode("-",explode("/",date('Y-m-d')))) ) {
                $response[$key]['cor'] = '#ff0000';
            }else{
                $response[$key]['cor'] = '#0000ff';
            }
        }
        return $response;
    }
}