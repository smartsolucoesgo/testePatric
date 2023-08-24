<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;

class Appointment extends Model
{
    private $table = 'appointments';

    public function findAll()
    {
        $sql = "SELECT title,start_at,ends_at,is_completed from" . $this->table;

        $query = $this->PDO()->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function findOne($appointmentId)
    {
        $sql = "SELECT title,start_at,ends_at,is_completed from" . $this->table;
        $sql .= "where id = :id";

        $query = $this->PDO()->prepare($sql);
        $query->execute([':id' => $appointmentId]);

        return $query->fetch();
    }

    public function store(...$params)
    {
        $sql = "INSERT INTO {$this->table} title, start_at,ends_at,is_completed VALUES";
        $sql .= "(:title,:start_at,:ends_at,:is_completed)";

        $query = $this->PDO()->prepare($sql);
        $query->bindParam(":title", $params['title']);
        $query->bindParam(":starts_at", $params['starts_at']);
        $query->bindParam(":ends_at", $params['ends_at']);
        $query->bindParam(":is_completed", $params['is_completed']);

        return $query->execute();
    }

    public function update($appointmentId, ...$params)
    {
        $query = "UPDATE {$this->table} SET title = :title, start_at = :start_at, ends_at = :ends_at, is_completed = :is_completed WHERE id = :id";
        $query = $this->PDO()->prepare($query);

        $query->bindParam(':title', $params['title']);
        $query->bindParam(':start_at', $params['start_at']);
        $query->bindParam(':ends_at', $params['ends_at']);
        $query->bindParam(':is_completed', $params['is_completed']);
        $query->bindParam(':id', $appointmentId);

        return $query->execute();
    }

    public function destroy($appointmentId)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $query = $this->PDO()->prepare($query);

        $query->bindParam(':id', $appointmentId,);
        return $query->execute();
    }
}
