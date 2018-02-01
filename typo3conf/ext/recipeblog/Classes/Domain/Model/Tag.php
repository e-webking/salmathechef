<?php
namespace ARM\Recipeblog\Domain\Model;

/***
 *
 * This file is part of the "ARM Recipe" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * Tag
 */
class Tag extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * tag
     *
     * @var string
     */
    protected $tag = '';

    /**
     * Returns the tag
     *
     * @return string $tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Sets the tag
     *
     * @param string $tag
     * @return void
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
}
