<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 22:05
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model{

    protected $table = 'system_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}