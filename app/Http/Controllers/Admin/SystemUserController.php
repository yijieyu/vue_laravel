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

    public function listByPage(){
        $list = $this->systemUserService->paginate();
        return $list;
    }

    public function getOneUser(Request $request){
        $userID = $request->only('id');
        $user = $this->systemUserService->getOneUserByID($userID);

        return $user;
    }

    public function saveUser(Request $request){
        $data = $request->only('mail','phone','desc','id');
        return $this->systemUserService->updateUser($data);
    }
}