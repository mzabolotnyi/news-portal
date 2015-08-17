<?php

abstract class Model
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

        $res = $db->query($sql, [':id' => $id]);

        if (!empty($res)) {
            return $res[0];
        } else {
            return false;
        }
    }

    public static function selectByField($field, $val)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $field . "=" . ':value';
        $db = new DB(get_called_class());

        $res = $db->query($sql, [':value' => $val]);

        if (!empty($res)) {
            return $res[0];
        } else {
            return false;
        }
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

    public function __isset($k)
    {
        return isset($this->data[$k]);
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

        if ($res) {
            $this->id = $db->lastInsertId();
            $this->date = self::selectById($this->id)->date;
            return true;
        } else {
            return false;
        }
    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $this->data[$k];

            if ($k == 'id') {
                continue;
            }

            $cols[] = $k . '=:' . $k;
        }

        $sql = "
            UPDATE " . static::$table .
            " SET " . implode(', ', $cols) .
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
        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

}