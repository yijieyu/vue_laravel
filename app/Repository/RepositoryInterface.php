<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 23:50
 */

namespace App\Repository;


interface RepositoryInterface{

    public function all(Array $where,$columns = array('*'));
    public function paginate(Array $where,$perPage = 15, $columns = array('*'));
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id, $columns = array('*'));
    public function findBy($field, $value, $columns = array('*'));
}