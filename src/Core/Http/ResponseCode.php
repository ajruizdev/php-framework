<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 20:31
 */

namespace Api\Core\Http;


abstract class ResponseCode
{
    const OK = 200;
    const NO_CONTENT = 204;
    const BAD_REQUEST = 400;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const PRECONDITION_FAILED = 412;
    const INTERNAL_ERROR = 500;
}