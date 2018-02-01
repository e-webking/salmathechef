<?php
namespace ARM\Recipeblog\Controller;

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
 * RecipeController
 */
class RecipeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * recipeRepository
     *
     * @var \ARM\Recipeblog\Domain\Repository\RecipeRepository
     * @inject
     */
    protected $recipeRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $recipes = $this->recipeRepository->findAll();
        $this->view->assign('recipes', $recipes);
    }

    /**
     * action show
     *
     * @param \ARM\Recipeblog\Domain\Model\Recipe $recipe
     * @return void
     */
    public function showAction(\ARM\Recipeblog\Domain\Model\Recipe $recipe)
    {
        $this->view->assign('recipe', $recipe);
    }
}
