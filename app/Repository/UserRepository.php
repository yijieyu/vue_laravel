<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 23:34
 */

namespace App\Repository;


use App\Model\User;

/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository implements RepositoryInterface {

    protected $userModel;

    public function __construct(User $userModel){
        $this->userModel = $userModel;
    }

    public function all(Array $where,$columns = array('*'))
    {
        return $this->userModel->where($where)->get($columns);
    }

    public function paginate(Array $where,$perPage = 15, $columns = array('*'))
    {
        return $this->userModel->where($where)->paginate($perPage,$columns);
    }

    public function create(array $data)
    {
        return $this->userModel->create($data);
    }

    public function update(array $data, $id,$attribute="id")
    {
        return $this->userModel->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->userModel->destroy($id);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->userModel->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->userModel->where($attribute, '=', $value)->first($columns);
    }
}