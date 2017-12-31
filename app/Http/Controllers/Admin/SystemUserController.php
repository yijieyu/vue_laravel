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

class SystemUserController extends Controller {

    protected $systemUserService;

    public function __construct(SystemUserService $systemUserService){
        $this->systemUserService = $systemUserService;
    }

    public function listByPage(){
        $list = $this->systemUserService->paginate();
        return $list;
    }
}