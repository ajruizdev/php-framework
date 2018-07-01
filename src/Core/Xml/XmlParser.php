<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 23/06/2018
 * Time: 17:16
 */

namespace Api\Core\Xml;


interface XmlParser
{
    /**
     * Loads xml from file
     * @param $filename
     * @return mixed
     */
    public function loadXmlFile($filename);

    /**
     * Loads xml from source string
     * @param string $source
     * @return mixed
     */
    public function loadXml($source);

    /**
     * @param $filename
     * @return mixed
     */
    public function schemaValidate($filename);

    /**
     * @param string $tagName
     * @return DOMDocumentXmlNodeList
     */
    public function getElementsByTagName($tagName);

    /**
     * @param XmlElement $element
     * @return mixed
     */
    public function appendChild(XmlElement $element);

    /**
     * @param string $node
     * @param string $value
     * @return mixed
     */
    public function createElement($node, $value = "");

    /**
     *
     * @return mixed
     */
    public function saveXml();
}