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

class UserService {

    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function login($credentials){
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return ['error' => 'invalid_credentials','code'=>401];
            }
        }catch (JWTException $e){
            return ['error' => 'could_not_create_token','code'=>500];
        }

        $name = $this->userRepository->findBy('email',$credentials['email'],['name'])['name'];
        return compact('token', 'name');
    }
}