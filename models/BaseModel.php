<?php

class BaseModel extends DB
{
    protected $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    //Lay he data trong table
    public function all($table, $select = ['*'], $orderBys = ["id" => "asc"], $limit = 10)
    {
        $select = implode(',', $select);
        $orderByString = implode(' ', $orderBys);

        if ($orderByString) {
            $sql = "SELECT $select FROM $table ORDER BY $orderByString LIMIT $limit";
        } else {
            $sql = "SELECT $select FROM $table LIMIT $limit";
        }
        $query = $this->_query($sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    //Lay ra ban ghi trong bang
    public function find($table, $id)
    {
        $sql = "SELECT * FROM $table Where id = '$id' LIMIT 1";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    //Add data in table
    public function create($table, $data = [])
    {
        $col = implode(', ', array_keys($data));
        $val = implode(', ', array_values($data));

        $newValues = array_map(function ($val) {
            return "'" . $val . "'";
        }, array_values($data));

        $newValues = implode(', ', $newValues);

        $sql = "INSERT INTO $table($col) VALUES($newValues)";

        return $this->_query($sql);
    }

    //Update data in table
    public function update($table, $id, $data)
    {
        $dataSets = [];

        foreach ($data as $key => $value) {
            array_push($dataSets, $key . " = '" . $value . "'");
        }

        $data = implode(', ', $dataSets);

        $sql = "UPDATE $table SET $data WHERE id = $id";
        return $this->_query($sql);
    }

    //Delete data in table 
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        return $this->_query($sql);
    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
}