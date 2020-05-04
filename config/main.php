<?php
include "connect.php";
abstract class Main
{   protected $table ;
    abstract public function insert ();
    abstract public function update($id);
    public function Show()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = db::myprepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function GetById($id)
    {
        $sql = "SELECT * FROM $this->table where id=:id";
        $stmt = db::myprepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table where id=:id";
        $stmt = db::myprepare($sql);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }
}


?>