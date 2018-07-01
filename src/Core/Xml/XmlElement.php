<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 24/06/2018
 * Time: 12:32
 */

namespace Api\Core\Xml;

/**
 * Interface XmlElement
 * @package Api\Core\Xml
 */
interface XmlElement
{
    /**
     * @param XmlElement $node
     * @return mixed
     */
    public function appendChild(XmlElement $node);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param $val
     */
    public function setValue($val);

    /**
     * @return mixed
     */
    public function getHandler();
}