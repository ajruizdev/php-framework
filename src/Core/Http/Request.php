<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 18:36
 */

namespace Api\Core\Http;

/**
 * Class Request
 * @package Api\Core\Http
 */
class Request
{
    private $content;
    private $method;
    private $headers;
    private $uri;

    private static $instance;

    /**
     * Gets the request sent by the client
     * Singleton pattern - only one instance required -
     * @return Request
     */
    static public function get()
    {
        if (self::$instance === null)
            self::$instance = new self();

        return self::$instance;
    }

    /**
     * Request constructor.
     */
    private function __construct()
    {
        $this->content = file_get_contents("php://input");
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->headers = new HeaderBag(apache_request_headers());
    }

    /**
     * @return bool|string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * POST, GET ...
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return HeaderBag
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }


}