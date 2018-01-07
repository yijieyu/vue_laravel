<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 11:51
 */

namespace App\Repository;


use App\Model\SystemUser;

class SystemUserRepository implements RepositoryInterface {

    protected $model;

    public function __construct(SystemUser $systemUserModel){
        $this->model = $systemUserModel;
    }

    public function all(Array $where, $columns = array('*')){
        return $this->model->where($where)->all($columns);
    }

    public function paginate(Array $where = [], $perPage = 15, $columns = array('*')){
        return $this->model->where($where)->paginate($perPage,$columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $where)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete($id)
    {

    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id,$columns);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
}