<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 24/06/2018
 * Time: 13:16
 */

namespace Api\Core\Xml;

/**
 * Class DOMDocumentXmlNodeList
 * @package Api\Core\Xml
 */
class DOMDocumentXmlNodeList implements XmlNodeList
{
    private $nodeList;

    /**
     * DOMDocumentXmlNodeList constructor.
     * @param \DOMNodeList $nodeList
     */
    public function __construct(\DOMNodeList $nodeList)
    {
        $this->nodeList = $nodeList;
    }

    /**
     * @param int $id
     * @return XmlElement
     */
    public function getElement($id)
    {
        $element = $this->nodeList->item($id);
        if ($element === null)
            return null;
        return new DOMDocumentXmlElement($element);
    }
}