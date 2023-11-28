<?php

namespace App\Http\Helpers;

use App\Exceptions\ValidationFailedException;
use Illuminate\Database\Eloquent\Model;
use ReflectionProperty;
use Symfony\Component\HttpFoundation\Request;

class Validator
{
    public static function validate(Model $model, Request $request, $skipable = ["id", "created_at", "updated_at"])
    {
        $rp = new ReflectionProperty($model::class, 'fillable');
        $rp->setAccessible(true);
        $fillable = $rp->getValue($model);


        $missing = [];
        foreach ($fillable as $item) {

            if (in_array($item, $skipable)) {
                continue;
            }

            if (!$request->get($item)) {
                $missing[] = $item;
            }
        }

        if (!empty($missing)) {
            throw new ValidationFailedException($missing);
        }
    }


}
