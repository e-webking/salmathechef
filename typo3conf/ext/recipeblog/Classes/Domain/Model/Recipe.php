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
 * Recipe
 */
class Recipe extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     *
     * @var int
     */
    protected $pageuid = 0;
    
    /**
     *
     * @var int
     */
    protected $menupage = 0;

    /**
     * brief
     *
     * @var string
     */
    protected $brief = '';
    
    /**
     *
     * @var string
     */
    protected $tips = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * yturl
     *
     * @var string
     */
    protected $yturl = '';

    /**
     * serves
     *
     * @var int
     */
    protected $serves = 0;

    /**
     * uploadedon
     *
     * @var \DateTime
     */
    protected $uploadedon = null;

    /**
     * views
     *
     * @var int
     */
    protected $views = 0;

    /**
     * likes
     *
     * @var int
     */
    protected $likes = 0;
    
    /**
     * duration
     *
     * @var string
     */
    protected $duration = '';

    /**
     * category
     *
     * @var \ARM\Recipeblog\Domain\Model\Category
     */
    protected $category = null;

    /**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Tag>
     */
    protected $tags = null;

    /**
     * amazonads
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Amazonad>
     */
    protected $amazonads = null;
    
    /**
     * steps
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Cookingstep>
     */
    protected $steps = null;
    
    /**
     * ingredients
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Recipeingredient>
     */
    protected $ingredients = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->amazonads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->steps = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->ingredients = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

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
     * Returns the pageuid
     *
     * @return int $pageuid
     */
    public function getPageuid()
    {
        return $this->pageuid;
    }

    /**
     * Sets the pageuid
     *
     * @param int $pageuid
     * @return void
     */
    public function setPageuid($pageuid)
    {
        $this->pageuid = $pageuid;
    }
    
    /**
     * Returns the menupage
     *
     * @return int $menupage
     */
    public function getMenupage()
    {
        return $this->menupage;
    }

    /**
     * Sets the menupage
     *
     * @param int $menupage
     * @return void
     */
    public function setMenupage($menupage)
    {
        $this->menupage = $menupage;
    }

    /**
     * Returns the brief
     *
     * @return string $brief
     */
    public function getBrief()
    {
        return $this->brief;
    }

    /**
     * Sets the brief
     *
     * @param string $brief
     * @return void
     */
    public function setBrief($brief)
    {
        $this->brief = $brief;
    }
    
    /**
     * Returns the tips
     *
     * @return string $tips
     */
    public function getTips()
    {
        return $this->tips;
    }

    /**
     * Sets the tips
     *
     * @param string $tips
     * @return void
     */
    public function setTips($tips)
    {
        $this->tips = $tips;
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
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the yturl
     *
     * @return string $yturl
     */
    public function getYturl()
    {
        return $this->yturl;
    }

    /**
     * Sets the yturl
     *
     * @param string $yturl
     * @return void
     */
    public function setYturl($yturl)
    {
        $this->yturl = $yturl;
    }

    /**
     * Returns the serves
     *
     * @return int $serves
     */
    public function getServes()
    {
        return $this->serves;
    }

    /**
     * Sets the serves
     *
     * @param int $serves
     * @return void
     */
    public function setServes($serves)
    {
        $this->serves = $serves;
    }

    /**
     * Returns the uploadedon
     *
     * @return \DateTime $uploadedon
     */
    public function getUploadedon()
    {
        return $this->uploadedon;
    }

    /**
     * Sets the uploadedon
     *
     * @param \DateTime $uploadedon
     * @return void
     */
    public function setUploadedon(\DateTime $uploadedon)
    {
        $this->uploadedon = $uploadedon;
    }

    /**
     * Returns the views
     *
     * @return int $views
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Sets the views
     *
     * @param int $views
     * @return void
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * Returns the likes
     *
     * @return int $likes
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Sets the likes
     *
     * @param int $likes
     * @return void
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * Returns the category
     *
     * @return \ARM\Recipeblog\Domain\Model\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param \ARM\Recipeblog\Domain\Model\Category $category
     * @return void
     */
    public function setCategory(\ARM\Recipeblog\Domain\Model\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Adds a Tag
     *
     * @param \ARM\Recipeblog\Domain\Model\Tag $tag
     * @return void
     */
    public function addTag(\ARM\Recipeblog\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }

    /**
     * Removes a Tag
     *
     * @param \ARM\Recipeblog\Domain\Model\Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(\ARM\Recipeblog\Domain\Model\Tag $tagToRemove)
    {
        $this->tags->detach($tagToRemove);
    }

    /**
     * Returns the tags
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Tag> $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets the tags
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Adds a Amazonad
     *
     * @param \ARM\Recipeblog\Domain\Model\Amazonad $amazonad
     * @return void
     */
    public function addAmazonad(\ARM\Recipeblog\Domain\Model\Amazonad $amazonad)
    {
        $this->amazonads->attach($amazonad);
    }

    /**
     * Removes a Amazonad
     *
     * @param \ARM\Recipeblog\Domain\Model\Amazonad $amazonadToRemove The Amazonad to be removed
     * @return void
     */
    public function removeAmazonad(\ARM\Recipeblog\Domain\Model\Amazonad $amazonadToRemove)
    {
        $this->amazonads->detach($amazonadToRemove);
    }

    /**
     * Returns the amazonads
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Amazonad> $amazonads
     */
    public function getAmazonads()
    {
        return $this->amazonads;
    }

    /**
     * Sets the amazonads
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Amazonad> $amazonads
     * @return void
     */
    public function setAmazonads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $amazonads)
    {
        $this->amazonads = $amazonads;
    }
    
    /**
     * Adds a Cookingstep
     *
     * @param \ARM\Recipeblog\Domain\Model\Cookingstep $step
     * @return void
     */
    public function addStep(\ARM\Recipeblog\Domain\Model\Cookingstep $step)
    {
        $this->steps->attach($step);
    }

    /**
     * Removes a Cookingstep
     *
     * @param \ARM\Recipeblog\Domain\Model\Cookingstep $stepToRemove The Cookingstep to be removed
     * @return void
     */
    public function removeStep(\ARM\Recipeblog\Domain\Model\Cookingstep $stepToRemove)
    {
        $this->steps->detach($stepToRemove);
    }

    /**
     * Returns the steps
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Cookingstep> $steps
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Sets the steps
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Cookingstep> $steps
     * @return void
     */
    public function setSteps(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $steps)
    {
        $this->steps = $steps;
    }
    
    /**
     * Adds a Recipeingredient
     *
     * @param \ARM\Recipeblog\Domain\Model\Recipeingredient $ingredient
     * @return void
     */
    public function addIngredient(\ARM\Recipeblog\Domain\Model\Recipeingredient $ingredient)
    {
        $this->ingredients->attach($ingredient);
    }

    /**
     * Removes a Recipeingredient
     *
     * @param \ARM\Recipeblog\Domain\Model\Recipeingredient $ingredientToRemove The Recipeingredient to be removed
     * @return void
     */
    public function removeIngredient(\ARM\Recipeblog\Domain\Model\Recipeingredient $ingredientToRemove)
    {
        $this->ingredients->detach($ingredientToRemove);
    }

    /**
     * Returns the steps
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Recipeingredient> ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Sets the steps
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Recipeblog\Domain\Model\Recipeingredient> $ingredients
     * @return void
     */
    public function setIngredients(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ingredients)
    {
        $this->ingredients = $ingredients;
    }
}
