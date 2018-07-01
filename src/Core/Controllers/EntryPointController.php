<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 17:04
 */

namespace Api\Core\Controllers;

use Api\Core\Http\Request;
use Api\Core\Http\Response;
use Api\Core\Http\ResponseCode;
use Api\Core\Xml\DOMDocumentXmlParser;

/**
 *
 * Class EntryPointController
 * @package Api\Core\Controllers
 */
class EntryPointController
{
    /**
     * @Route /
     */
    public function index()
    {
        return new Response(
          "<h1>PHP Backend</h1><p>Example index</p>",
          ResponseCode::FORBIDDEN
        );
    }

    /**
     * @Route /entrypoint/
     * @throws \Exception
     */
    public function entryPoint()
    {

    }

    /**
     * Just a test entrypoint
     * @Route /entrypointtest/
     */
    public function entryPointTest()
    {
        return new Response("Test entrypoint");
    }

}