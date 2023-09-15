<?php
namespace App\Traits;
trait JoinQueryParams{

public function join($model,$join)
{
    return $model::with($join)->get();
}
    

}









