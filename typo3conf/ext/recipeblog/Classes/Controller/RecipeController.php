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

use \TYPO3\CMS\Core\Utility\GeneralUtility;

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
     *
     * @var \ARM\Recipeblog\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = null;
    
    /**
     *
     * @var \ARM\Recipeblog\Domain\Repository\TagRepository
     * @inject
     */
    protected $tagRepository = null;


    /**
     * @return void
     */
    public function bannerAction()
    {
        $recipeUids = $this->settings['recipes'];
        $recipeUidArr = GeneralUtility::trimExplode(',', $recipeUids);
        
        $recipes = $this->recipeRepository->findByUids($recipeUidArr);
        
        $this->view->assign('recipes', $recipes);
    }
    
    /**
     * 
     */
    public function categoryAction() {
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('categories', $categories);
    }
    
    
    /**
     * 
     */
    public function popularAction() {
        $recipes = $this->recipeRepository->getPopular();
        $this->view->assign('recipes', $recipes);
    }

    /**
     * 
     */
    public function tagsAction() {
        
        $tags = $this->tagRepository->findAll();
        $this->view->assign('tags', $tags);
    }
    
    /**
     * 
     */
    public function searchAction() {
        
    }
    
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
