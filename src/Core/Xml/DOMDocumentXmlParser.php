<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 17:22
 */

namespace Api\Core\Xml;

/**
 * Class DOMDocumentXmlParser
 * @package Api\Core\Xml
 */
class DOMDocumentXmlParser implements XmlParser
{
    private $handler;

    /**
     * DOMDocumentXmlParser constructor.
     * @param string $version
     * @param string $format
     * @param bool $formatOutput
     */
    public function __construct($version = "1.0", $format = "UTF-8", $formatOutput = true)
    {
        libxml_use_internal_errors(true);
        $this->handler = new \DOMDocument($version, $format);
        $this->handler->formatOutput = $formatOutput;
    }

    /**
     * Loads XML from file
     * @param string $filename
     * @throws \Exception
     */
    public function loadXmlFile($filename)
    {
        if (!$this->handler->load($filename))
            throw new \Exception(libxml_get_last_error()->message, 500);
    }

    /**
     * Loads XML from source
     * @param string $source
     * @throws \Exception
     */
    public function loadXml($source)
    {
        if (!$this->handler->loadXML($source))
            throw new \Exception(libxml_get_last_error()->message, 400);
    }

    /**
     * @param $filename
     * @throws \Exception
     */
    public function schemaValidate($filename)
    {
        if (!$this->handler->schemaValidate($filename))
            throw new \Exception(libxml_get_last_error()->message, 200);
    }


    /**
     * @param string $tagName
     * @return XmlNodeList|mixed
     */
    public function getElementsByTagName($tagName)
    {
        return new DOMDocumentXmlNodeList($this->handler->getElementsByTagName($tagName));
    }

    /**
     * @return mixed|string
     * @throws \Exception
     */
    public function saveXml()
    {
        $xml = $this->handler->saveXML();
        if ($xml === false)
            throw new \Exception(libxml_get_last_error()->message, 100);

        return $xml;
    }

    /**
     * @param $element
     * @return XmlElement
     */
    public function appendChild(XmlElement $element)
    {
        $this->handler->appendChild($element->getHandler());
        return $element;
    }

    /**
     * @param string $node
     * @param string $value
     * @return XmlElement
     * @throws \Exception
     */
    public function createElement($node, $value = "")
    {
        $element = $this->handler->createElement($node, $value);
        if ($element === false)
            throw new \Exception(libxml_get_last_error()->message, 300);

        return new DOMDocumentXmlElement($element);
    }
}