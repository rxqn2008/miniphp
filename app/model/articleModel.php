<?php
namespace app\model;

use core\lib\model;

class articleModel extends model
{
    public $table = 'article';

    public function lists()
    {
        $ret = $this->select($this->table, '*');
        return $ret;
    }

    public function getOne($id)
    {
        return $this->get($this->table, '*', array('id' => $id));
    }

    public function setOne($id, $data)
    {
        return $this->update($this->table, $data, array('id' => $id));
    }

    public function deleteOne($id)
    {
        return $this->delete($this->table, array('id' => $id));
    }
}