<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 11:50
 */

namespace App\Service;


use App\Repository\SystemUserRepository;

class SystemUserService extends BaseService {

    protected $systemUserRepository;

    public function __construct(SystemUserRepository $systemUserRepository){
        $this->systemUserRepository = $systemUserRepository;
    }

    public function getSearchCondition($param){
        $where[] = ['username','like','%' . $param . '%','or'];
        $where[] = ['mail','like','%' . $param . '%','or'];
        return $where;
    }

    public function paginate($where = []){

        $list = $this->systemUserRepository->paginate($where);

        return $this->returnArray(['data'=>$list]);
    }

    public function getOneUserByID($userID){
        $user = $this->systemUserRepository->findBy('id',$userID);

        return $this->returnArray(['data'=>$user]);
    }

    public function create($data){
        $data['password'] = bcrypt($data['password']);
        $res = $this->systemUserRepository->create($data);

        if(!$res){
            return $this->returnArray(['error'=>'操作失败，请重试']);
        }
        return $this->returnArray(['data'=>'操作成功']);
    }

    public function updateUser($data){
        $updateData = [
            'mail' => $data['mail'],
            'phone' => $data['phone'],
            'desc' => $data['desc']
        ];
        $res = $this->systemUserRepository->update($updateData,['id'=>$data['id']]);
        if(!$res){
            return $this->returnArray(['error'=>'操作失败，请重试']);
        }
        return $this->returnArray(['data'=>'操作成功']);
    }

}