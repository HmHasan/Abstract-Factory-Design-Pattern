<?php

include("main.php");

class profile extends Main
{
    protected $table = 'demo';
    private $name;
    private $department;
    private $roll;

    public function setname($name)
    {
        $this->name=$name;
    }

    public function setdepartment($department)
    {
        $this->department=$department;
    }

    public function setroll($roll)
    {
        $this->roll=$roll;
    }

    public function insert ()
    {
        $sql = "INSERT INTO $this->table(name,department,roll)
        VALUES(:name,:department,:roll)";

        $stmt = db::myprepare($sql);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':department',$this->department);
        $stmt->bindParam(':roll',$this->roll);
        return $stmt->execute();
    }

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


    public function update($id)
    {
        
        $sql =  "UPDATE $this->table SET name=:name,department=:department,roll=:roll where id=:id";

        $stmt = db::myprepare($sql);

        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':department',$this->department);
        $stmt->bindParam(':roll',$this->roll);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();

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