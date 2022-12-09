<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Commitment extends Model
{

    public function showCommitment($table, $order_by)
    {
        $sql = "
          SELECT * FROM {$table} 
          WHERE id_user = {$_SESSION['id_user']} ORDER BY {$order_by}
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}
