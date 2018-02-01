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
 * Recipeingredient
 */
class Recipeingredient extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * qty
     *
     * @var float
     */
    protected $qty = 0.0;

    /**
     * recipe
     *
     * @var \ARM\Recipeblog\Domain\Model\Recipe
     */
    protected $recipe = null;

    /**
     * ingredient
     *
     * @var \ARM\Recipeblog\Domain\Model\Ingredient
     */
    protected $ingredient = null;

    /**
     * Returns the qty
     *
     * @return float $qty
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Sets the qty
     *
     * @param float $qty
     * @return void
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
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

    /**
     * Returns the ingredient
     *
     * @return \ARM\Recipeblog\Domain\Model\Ingredient $ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * Sets the ingredient
     *
     * @param \ARM\Recipeblog\Domain\Model\Ingredient $ingredient
     * @return void
     */
    public function setIngredient(\ARM\Recipeblog\Domain\Model\Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }
}
