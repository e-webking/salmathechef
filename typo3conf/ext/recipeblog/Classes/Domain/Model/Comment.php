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
 * Comment
 */
class Comment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * comment
     *
     * @var string
     */
    protected $comment = '';

    /**
     * upvotes
     *
     * @var int
     */
    protected $upvotes = 0;

    /**
     * downvotes
     *
     * @var int
     */
    protected $downvotes = 0;

    /**
     * recipe
     *
     * @var \ARM\Recipeblog\Domain\Model\Recipe
     */
    protected $recipe = null;

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the comment
     *
     * @return string $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the comment
     *
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Returns the upvotes
     *
     * @return int $upvotes
     */
    public function getUpvotes()
    {
        return $this->upvotes;
    }

    /**
     * Sets the upvotes
     *
     * @param int $upvotes
     * @return void
     */
    public function setUpvotes($upvotes)
    {
        $this->upvotes = $upvotes;
    }

    /**
     * Returns the downvotes
     *
     * @return int $downvotes
     */
    public function getDownvotes()
    {
        return $this->downvotes;
    }

    /**
     * Sets the downvotes
     *
     * @param int $downvotes
     * @return void
     */
    public function setDownvotes($downvotes)
    {
        $this->downvotes = $downvotes;
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
