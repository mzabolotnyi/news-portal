<?php

class Model
{
    protected static $table;

    public static function select($order = '')
    {
        $db = new DB(get_called_class());
        $sql = "SELECT * FROM " . static::$table . (($order == '') ? "" : " ORDER BY " . $order);
        return $db->query($sql);
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        $db = new DB(get_called_class());

        return $db->query($sql, [':id' => $id])[0];
    }

    public static function selectByField($field, $val)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $field . "=" . ':' . $field;
        $db = new DB(get_called_class());

        return $db->query($sql, [':' . $field => $val])[0];
    }

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = "
            INSERT INTO " . static::$table .
            "(" . implode(', ', $cols) . ")
            VALUES
            (" . implode(', ', array_keys($data)) . ")";

        $db = new DB();
        $res = $db->execute($sql, $data);

        if ($res != false) {
            $this->id = $res->lastInsertId();
            $this->date = self::selectById($this->id)->date;
            return true;
        } else {
            return false;
        }
    }

    protected function update()
    {
        $cols = array_keys($this->data);
        $data = [];
        $setStr = '';
        foreach ($cols as $col) {

            $data[':' . $col] = $this->data[$col];

            if ($col == 'id') {
                continue;
            }

            if ($setStr == '') {
                $setStr = $setStr . $col . '=:' . $col;
            } else {
                $setStr = $setStr . ',' . $col . '=:' . $col;
            }
        }

        $sql = "
            UPDATE " . static::$table .
            " SET " . $setStr .
            " WHERE id=:id";

        $db = new DB();

        return $db->execute($sql, $data);
    }

    public function delete()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";

        $db = new DB();
        return $db->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        if (empty($this->data['id'])) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }

}