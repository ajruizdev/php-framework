<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 19:31
 */

namespace Api\Core\Http;

/**
 * Class Response
 * @package Api\Core\Http
 */
class Response
{
    private $headers;
    private $content;
    private $responseCode;

    /**
     * Response constructor.
     * @param string $content
     * @param int $responseCode
     * @param array $contentType
     */
    public function __construct($content = "", $responseCode = 200, $contentType = array())
    {
        $this->headers = new HeaderBag();
        $this->responseCode = $responseCode;
        $this->content = $content;
        $this->headers->addArray($contentType);
    }

    /**
     * @return HeaderBag
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param int $code
     */
    public function setResponseCode($code)
    {
        $this->responseCode = $code;
    }

    /**
     *
     */
    public function send()
    {
        foreach ($this->headers->getAll() as $key => $value) {
            header($key . ":" . $value);
        }

        http_response_code($this->responseCode);

        echo $this->content;
    }
}