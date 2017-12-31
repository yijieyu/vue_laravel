<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 11:27
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Service\MenuService;

class MenuController extends Controller {

    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function getMenuList(){
        $list = $this->menuService->menuList();
    }
}