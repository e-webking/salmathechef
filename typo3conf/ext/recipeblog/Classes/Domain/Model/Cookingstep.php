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
 * Cookingstep
 */
class Cookingstep extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * detail
     *
     * @var string
     */
    protected $detail = '';

    /**
     * duration
     *
     * @var string
     */
    protected $duration = '';

    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $images = null;

    /**
     * recipe
     *
     * @var \ARM\Recipeblog\Domain\Model\Recipe
     */
    protected $recipe = null;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the detail
     *
     * @return string $detail
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Sets the detail
     *
     * @param string $detail
     * @return void
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    /**
     * Returns the duration
     *
     * @return string $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the duration
     *
     * @param string $duration
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the recipe
     *
     * @return \ARM\Recipeblog\Domain\Model\Recipe $recipe
     */
    public function getRecipe()
    {
        return $this->recipe;
    }

    /**
     * Sets the recipe
     *
     * @param \ARM\Recipeblog\Domain\Model\Recipe $recipe
     * @return void
     */
    public function setRecipe(\ARM\Recipeblog\Domain\Model\Recipe $recipe)
    {
        $this->recipe = $recipe;
    }
}
