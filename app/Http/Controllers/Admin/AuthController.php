<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 0:03
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use App\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller {

    use Helpers;

    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');
        $res = $this->userService->login($credentials);

        return $res;
    }

    public function logout(){

    }
}