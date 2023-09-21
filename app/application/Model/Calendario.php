<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;
class Calendario extends Model {

    /**
     * @param string $tabela
     * @param string $orderBy
     */
    public function findAll(string $tabela, string $orderBy = 'id ASC') {
        $sql = "SELECT * FROM {$tabela} ORDER BY {$orderBy}";
        $stmt = $this->PDO()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}