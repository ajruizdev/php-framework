<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 24/06/2018
 * Time: 17:46
 */

namespace Api\Core;

/**
 * Each route must invoke a method
 * Class Route
 * @package Api\Core
 */
class Route
{

    private $methodReflector;
    private $route;

    /**
     * Route constructor.
     * @param \ReflectionMethod $methodReflector
     * @param $route
     */
    public function __construct(\ReflectionMethod $methodReflector, $route)
    {

        $this->methodReflector = $methodReflector;
        $this->route = $route;
    }

    /**
     * @return \ReflectionMethod
     */
    public function getMethodReflector()
    {
        return $this->methodReflector;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }
}