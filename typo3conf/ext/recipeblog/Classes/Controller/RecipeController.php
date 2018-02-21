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
        $views = $recipe->getViews();
        $recipe->setViews(++$views);
        $this->recipeRepository->update($recipe);
        $category = $recipe->getCategory();
        $relatedrecipes = $this->recipeRepository->findRelated($category->getUid(), $recipe->getUid());
        $this->view->assign('recipe', $recipe);
        $this->view->assign('relatedrecipes', $relatedrecipes);
    }
    
    /**
     * action like
     *
     * @param \ARM\Recipeblog\Domain\Model\Recipe $recipe
     * @return void
     */
    public function likeAction(\ARM\Recipeblog\Domain\Model\Recipe $recipe)
    {
        $likes = $recipe->getLikes();
        $recipe->setLikes(++$likes);
        $this->recipeRepository->update($recipe);
        
        $this->redirect('show',NULL,NULL,array('recipe' => $recipe));
    }
    
    /**
     * @return void
     */
    public function singleAction()
    {
        $recipeUid = $this->settings['recipe'];
        $recipe = $this->recipeRepository->findByUid(intval($recipeUid));
        $category = $recipe->getCategory();
        $relatedrecipes = $this->recipeRepository->findRelated($category->getUid(), $recipe->getUid());
        
        $this->view->assign('recipe', $recipe);
        $this->view->assign('relatedrecipes', $relatedrecipes);
    }
}
