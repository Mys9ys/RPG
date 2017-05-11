<?php


require_once __DIR__ . "/DB.php";
/**
 * Created by PhpStorm.
 * User: Мусяус
 * Date: 09.02.2017
 * Time: 12:52
 */
abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public  function  __isset($k)
    {
        return isset($this->data[$k]);

    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public function findOneByPK($id)
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findOneByColumn($column, $value)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . "=:value";
        $res = $db->query($sql, [':value' => $value]);
        if (empty($res)){
//            $e = new ModelExeption('Ничего не найдено');
//            throw $e;
            echo 'ни чего не найдено';
        }

//        if (!empty($res)) {
//            return $res[0];
//        }
//        return false;
        return $res;
    }

    public static function findManyByColumn()
    {
        $db = new DB();
        $db->setClassName(get_called_class());

        $arg_list = func_get_args();
        $sqlMany = '';
        $sqlQuery = [];
        for ($col=0; $col< func_num_args(); $col+=2){
            $index = $col+1;
            $item = ':value' . $col;
            if (empty($sqlMany )){
                $sqlMany = $sqlMany . $arg_list[$col] . "=" . $item ;
            } else {
                $sqlMany = $sqlMany . ' AND '. $arg_list[$col] . "=" . $item ;
            }
            $sqlQuery[$item] = $arg_list[$index];
        }

        $sql = "SELECT * FROM " . static::$table . " WHERE " . $sqlMany;
        $res = $db->query($sql, $sqlQuery);

        if (empty($res)){
////            $e = new ModelExeption('Ничего не найдено');
////            throw $e;
            echo 'ни чего не найдено many';
        }
//
////        if (!empty($res)) {
////            return $res[0];
////        }
////        return false;
        return $res;
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col){
            $data[':' . $col]= $this->data[$col];
        }

        $sql = '
        INSERT INTO ' . static::$table . '
        (' . implode(', ', $cols). ')
        VALUES
        (' . implode(', ', array_keys($data)). ')
        ';

        $db = new DB();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v){
            $data[':' . $k] = $v;
            if ('id' == $k){
                continue;
            }
            $cols[] =  $k . '=:' . $k;
        }
        $sql = '
        UPDATE ' . static::$table . '
        SET ' . implode(', ', $cols) . '
        WHERE id=:id
        ';
        $db = new DB();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (!isset($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql="DELETE FROM " . static::$table;
        $db = new DB();
        $db->execute($sql);
    }

    public function deleteID($id)
    {
        $sql="DELETE FROM " . static::$table . " WHERE id=:id";
        $db = new DB();
        $db->query($sql, [':id' => $id])[0];
    }

    public function keys()
    {
        return array_keys($this->data);
    }
}


