<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 23:39
 */

namespace App\Service;


use App\Repository\UserRepository;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserService extends BaseService {

    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function login($credentials){

        $user = $this->userRepository->findBy('name',$credentials['username']);
        if(!\Hash::check($credentials['password'],$user['password'])){
            return $this->returnArray(['error' => 'invalid_credentials']);
        }
        $token = JWTAuth::fromUser($user);
        $name  = $user['name'];

        return $this->returnArray(['data'=>compact('name')],$token);
    }
}