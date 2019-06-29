<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 11:44
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Service\SystemUserService;
use Illuminate\Http\Request;

class SystemUserController extends Controller {

    protected $systemUserService;

    public function __construct(SystemUserService $systemUserService){
        $this->systemUserService = $systemUserService;
    }

    public function listByPage(Request $request){

        $param = $request->only('keywords');

        $condition = $this->systemUserService->getSearchCondition($param['keywords']);

        $list = $this->systemUserService->paginate($condition);
        return $list;
    }

    public function getOneUser(Request $request){
        $userID = $request->only('id');
        $user = $this->systemUserService->getOneUserByID($userID);

        return $user;
    }

    public function create(Request $request){
        $data = $request->only('username','password','mail','desc','phone');
        return $this->systemUserService->create($data);
    }

    public function saveUser(Request $request){
        $data = $request->only('mail','phone','desc','id');
        return $this->systemUserService->updateUser($data);
    }
}