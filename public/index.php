<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 18:24
 */

require_once "../vendor/autoload.php";

use Api\Core\Http\Response;
use Api\Core\Http\Request;
use Api\Core\Http\ResponseCode;
use Api\Core\Router;

$router = new Router();

if (!$router->loadRoutes())
{
    $response = new Response("<h1>500 Internal Server Error</h1>", ResponseCode::INTERNAL_ERROR);
    $response->send();
    exit;
}

if (!$router->route(Request::get()->getUri()))
{
    $response = new Response("<h1>404 Not Found</h1>", ResponseCode::NOT_FOUND);
    $response->send();
}