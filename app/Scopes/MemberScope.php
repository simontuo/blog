<?php
/**
 * Created by PhpStorm.
 * User: SimonTuo
 * Date: 2019/2/20
 * Time: 17:47
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class MemberScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('is_admin', false);
    }
}