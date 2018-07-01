<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 19:22
 */

namespace Api\Core\Http;


/**
 * Class HeaderBag
 * @package Api\Core\Http
 */
class HeaderBag
{
    private $headers;

    /**
     * HeaderBag constructor.
     * @param array $headers
     */
    public function __construct($headers = array())
    {
        $this->headers = $headers;
        foreach ($headers as $key => $value)
        {
            $this->headers[str_replace("-", "_", strtolower($key))] = $value;
        }
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->headers;
    }

    /**
     * @param $header
     * @param $value
     */
    public function add($header, $value)
    {
        $this->headers[$header] = $value;
    }

    /**
     * @param $array
     */
    public function addArray($array)
    {
        $this->headers = array_merge($this->headers, $array);
    }

    /**
     * @param $header
     * @return mixed|null
     */
    public function __get($header)
    {
        return array_key_exists($header, $this->headers) ? $this->headers[$header] : null;
    }
}