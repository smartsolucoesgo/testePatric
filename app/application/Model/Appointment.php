<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;

class Appointment extends Model
{
    private $table = 'appointments';

    public function findAll()
    {
        $sql = sprintf("SELECT title,start,end,is_completed from %s", $this->table);

        $query = $this->PDO()->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function findOne($appointmentId)
    {
        $sql = "SELECT title,start,end,is_completed from" . $this->table;
        $sql .= "where id = :id";

        $query = $this->PDO()->prepare($sql);
        $query->execute([':id' => $appointmentId]);

        return $query->fetch();
    }

    public function store($params)
    {
        $sql = sprintf("INSERT INTO %s (title,start,end,is_completed) VALUES (:title,:start,:end,:is_completed)", $this->table);

        $query = $this->PDO()->prepare($sql);
        $query->bindParam(":title", $params['title']);
        $query->bindParam(":start", $params['start']);
        $query->bindParam(":end", $params['end']);
        $query->bindParam(":is_completed", $params['is_completed']);

        return $query->execute();
    }

    public function update($appointmentId, ...$params)
    {
        $query = sprintf("UPDATE %s SET title = :title, start = :start, end = :end, is_completed = :is_completed WHERE id = :id", $this->table);
        $query = $this->PDO()->prepare($query);

        $query->bindParam(':title', $params['title']);
        $query->bindParam(':start', $params['start']);
        $query->bindParam(':end', $params['end']);
        $query->bindParam(':is_completed', $params['is_completed']);
        $query->bindParam(':id', $appointmentId);

        return $query->execute();
    }

    public function destroy($appointmentId)
    {
        $query = sprintf("DELETE FROM %s WHERE id = :id", $this->table);
        $query = $this->PDO()->prepare($query);

        $query->bindParam(':id', $appointmentId,);
        return $query->execute();
    }
}
