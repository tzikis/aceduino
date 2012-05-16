<?php
// src/Ace/FileBundle/Document/File.php
namespace Ace\FileBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class File
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $code;

    /**
     * @MongoDB\Date
     */
    protected $codeTimestamp;

    /**
     * @MongoDB\String
     */
    protected $hex;

    /**
     * @MongoDB\Date
     */
    protected $hexTimestamp;

    /**
     * @MongoDB\Int
     */
    protected $owner;

    /**
     * @MongoDB\Boolean
     */
    protected $is_public;

    /**
     * @MongoDB\String
     */
    protected $schematic;

    /**
     * @MongoDB\String
     */
    protected $image;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set owner
     *
     * @param int $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * Get owner
     *
     * @return int $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set is_public
     *
     * @param boolean $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->is_public = $isPublic;
    }

    /**
     * Get is_public
     *
     * @return boolean $isPublic
     */
    public function getIsPublic()
    {
        return $this->is_public;
    }

    /**
     * Set schematic
     *
     * @param string $schematic
     */
    public function setSchematic($schematic)
    {
        $this->schematic = $schematic;
    }

    /**
     * Get schematic
     *
     * @return string $schematic
     */
    public function getSchematic()
    {
        return $this->schematic;
    }

    /**
     * Set image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return string $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set codeTimestamp
     *
     * @param date $codeTimestamp
     */
    public function setCodeTimestamp($codeTimestamp)
    {
        $this->codeTimestamp = $codeTimestamp;
    }

    /**
     * Get codeTimestamp
     *
     * @return date $codeTimestamp
     */
    public function getCodeTimestamp()
    {
        return $this->codeTimestamp;
    }

    /**
     * Set hexTimestamp
     *
     * @param date $hexTimestamp
     */
    public function setHexTimestamp($hexTimestamp)
    {
        $this->hexTimestamp = $hexTimestamp;
    }

    /**
     * Get hexTimestamp
     *
     * @return date $hexTimestamp
     */
    public function getHexTimestamp()
    {
        return $this->hexTimestamp;
    }


    /**
     * Set hex
     *
     * @param string $hex
     */
    public function setHex($hex)
    {
        $this->hex = $hex;
    }

    /**
     * Get hex
     *
     * @return string $hex
     */
    public function getHex()
    {
        return $this->hex;
    }
}
