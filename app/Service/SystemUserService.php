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

    public function paginate(){

        $list = $this->systemUserRepository->paginate();

        return $this->returnArray(['data'=>$list]);
    }


}