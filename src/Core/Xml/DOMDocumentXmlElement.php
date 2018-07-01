<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 24/06/2018
 * Time: 12:38
 */

namespace Api\Core\Xml;

/**
 * Class DOMDocumentXmlElement
 * @package Api\Core\Xml
 */
class DOMDocumentXmlElement implements XmlElement
{

    private $element;

    /**
     * DOMDocumentXmlElement constructor.
     * @param \DOMElement $element
     */
    public function __construct(\DOMElement $element)
    {
        $this->element = $element;
    }

    /**
     * @param XmlElement $node
     * @return XmlElement
     */
    public function appendChild(XmlElement $node)
    {
        $this->element->appendChild($node->getHandler());
        return $node;
    }

    /**
     * @return \DOMElement|mixed
     */
    public function getHandler()
    {
        return $this->element;
    }

    /**
     * @return mixed|string
     */
    public function getValue()
    {
        return $this->element->nodeValue;
    }

    /**
     * @param $val
     */
    public function setValue($val)
    {
        $this->element->nodeValue = $val;
    }
}