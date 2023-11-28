<?php

namespace App\Exceptions;

use App\Http\Helpers\ResponseHelper;
use JetBrains\PhpStorm\NoReturn;

class ValidationFailedException extends \Exception
{

    #[NoReturn] public function __construct($missingFields)
    {
        $jsonResponse = ResponseHelper::renderResponse(400,"Missing required fields: ".implode(",",$missingFields));
        echo($jsonResponse->content());die;
    }

}
