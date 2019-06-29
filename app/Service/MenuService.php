<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 11:31
 */

namespace App\Service;


use App\Repository\MenuRepository;

class MenuService extends BaseService {

    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository){
        $this->menuRepository = $menuRepository;
    }

    public function menuList(){
        $res = $this->menuRepository->all([]);
        return $this->returnArray(['data'=>$res]);
    }
}