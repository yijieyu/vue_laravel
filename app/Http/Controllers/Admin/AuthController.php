<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 0:03
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller {

    use Helpers;

    public function __construct(){

    }

    public function login(Request $request){
        $credentials = $request->only('email','password');
        try{
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }catch (JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $where['email'] = $credentials['email'];

        $name = User::where($where)->value('name');
        return response()->json(compact('token', 'name'));
    }

    public function logout(){

    }
}