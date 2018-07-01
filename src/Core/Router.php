<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 22/06/2018
 * Time: 22:55
 */

namespace Api\Core;


use Api\Core\Http\Response;
use ReflectionClass;
use zpt\anno\Annotations;

/**
 * Class Router
 * @package Api\Core
 */
class Router
{
    private $instanceContainer;
    private $availableRoutes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->instanceContainer = array();
        $this->availableRoutes = array();
    }

    /**
     * @return bool
     * @throws \zpt\anno\ReflectorNotCommentedException
     */
    public function loadRoutes()
    {
        try {
            // it's hardcoded since a dynamic loader is not needed in this case
            $classReflector = new ReflectionClass('Api\Core\Controllers\EntryPointController');
        } catch (\ReflectionException $e) {
            return false;
        }

        $entryPointController = $classReflector->newInstance();
        $this->instanceContainer[$classReflector->getShortName()] = $entryPointController;

        foreach ($classReflector->getMethods() as $methodReflector)
        {
            $methodAnnotations[$methodReflector->getName()] = new Annotations($methodReflector);
            foreach ($methodAnnotations as $annotation)
            {
                if ($annotation['Route'] != "")
                {
                    $this->availableRoutes[] = new Route($methodReflector, $annotation['Route']);
                }
            }
        }

        if (count($this->availableRoutes) == 0) return false;

        return true;
    }

    /**
     * Tries to find the route
     * @param $uri
     * @return bool
     */
    public function route($uri)
    {
        foreach ($this->availableRoutes as $route)
        {
            if ($uri == $route->getRoute())
            {
                $classInstance =
                    $this->instanceContainer[$route->getMethodReflector()->getDeclaringClass()->getShortName()];

                if ($classInstance !== null)
                {
                    $response = $route->getMethodReflector()->invoke($classInstance);
                    if ($response === null)
                    {
                        $response = new Response();
                    }
                    $response->send();
                    return true;
                }
            }
        }
        return false;
    }
}