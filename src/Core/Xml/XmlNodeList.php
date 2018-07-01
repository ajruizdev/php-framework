<?php
/**
 * Created by PhpStorm.
 * User: ajrui
 * Date: 24/06/2018
 * Time: 12:32
 */

namespace Api\Core\Xml;


interface XmlNodeList
{

    /**
     * @param int $id
     * @return XmlElement
     */
    public function getElement($id);
}