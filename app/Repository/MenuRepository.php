<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 11:32
 */

namespace App\Repository;


class MenuRepository implements RepositoryInterface {

    public function all(Array $where, $columns = array('*'))
    {
        return config('menu');
    }

    public function paginate(Array $where, $perPage = 15, $columns = array('*'))
    {
    }

    public function create(array $data)
    {
    }

    public function update(array $data, $id)
    {
    }

    public function delete($id)
    {
    }

    public function find($id, $columns = array('*'))
    {
    }

    public function findBy($field, $value, $columns = array('*'))
    {
    }
}