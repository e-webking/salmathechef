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
        
        $category = NULL;
        $tag = NULL;
        
        if ($this->request->hasArgument('category')) {
            $category = $this->request->getArgument('category');
        }
        if ($this->request->hasArgument('tag')) {
            $tag = $this->request->getArgument('tag');
        }
        
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        $recipes = $this->recipeRepository->search($category, $tag);
        
        $this->view->assign('category', $category);
        $this->view->assign('tag', $tag);
        $this->view->assign('categories', $categories);
        $this->view->assign('tags', $tags);
        $this->view->assign('recipes', $recipes);
    }
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $recipes = $this->recipeRepository->findByPid($this->settings['recipePid']);
        $this->view->assign('recipes', $recipes);
    }
    
    /**
     * action list
     *
     * @return void
     */
    public function catlistAction()
    {
        $menupage = $GLOBALS['TSFE']->id; // $this->settings['menupage'];
        $recipes = $this->recipeRepository->findByMenupage(intval($menupage));
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
        $pageUid = $recipe->getPageuid();
        $tagStr = $recipe->getCategory()->getTitle();
        $tags = $recipe->getTags();
        if (count($tags) > 0) {
           foreach($tags as $tag) {
               $tagStr .= ','.$tag->getTag();
           }
        }
        
        /**
         * @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
         */
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addHeaderData('<meta name="abstract" content="Recipe of '. $recipe->getTitle() .'">');
        $pageRenderer->addHeaderData('<meta name=”description” content=”'. $recipe->getTitle() .': ' .$recipe->getBrief() .'" />');
        $pageRenderer->addHeaderData('<meta name=”keywords” content=”'. $tagStr .'" />');
        
        if ($pageUid > 0) {
            $link = $this->uriBuilder->setCreateAbsoluteUri(TRUE)
                    ->setUseCacheHash(FALSE)
                    ->setTargetPageUid($pageUid)
                    ->build();
           
            $pageRenderer->addHeaderData('<link rel="canonical" href="'.$link.'" />');
            
        }
        $pageRenderer->addHeaderData('<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-1286748015534916",
          enable_page_level_ads: true
     });
</script>');
        $pageRenderer->addHeaderData('<meta property="og:title" content="'.$recipe->getTitle().'">');
        $pageRenderer->addHeaderData('<meta property="og:type" content="article">');
        $pageRenderer->addHeaderData('<meta property="og:url" content="'.$link.'">');
        $pageRenderer->addHeaderData('<meta property="og:site_name" content="salmathechef">');
        $pageRenderer->addHeaderData('<meta property="og:description" content="' . str_replace(array("/", '"', "'", "@") , '', strip_tags($recipe->getTitle().'. '.$recipe->getBrief())) .'">');
        $pageRenderer->addHeaderData('<meta property="twitter:title" content="'.$recipe->getTitle().'">');
        $pageRenderer->addHeaderData('<meta property="twitter:card" content="'.$recipe->getTitle().'">');
        $pageRenderer->addHeaderData('<meta property="twitter:site" content="@salmathechef">');
        $pageRenderer->addHeaderData('<meta property="twitter:description" content="'. str_replace(array("/", '"', "'", "@") , '', strip_tags($recipe->getTitle().'. '.$recipe->getBrief())) .'">');
        $file = $recipe->getImage();
        if ($file instanceof \TYPO3\CMS\Extbase\Domain\Model\FileReference) {
            $fileResourceReference = $file->getOriginalResource();
            if (!$fileResourceReference instanceof \TYPO3\CMS\Core\Resource\FileReference) {
                $fileResourceReference = new \TYPO3\CMS\Core\Resource\FileReference(array('uid_local' => $file->getUid()));
            }
            $pageRenderer->addHeaderData('<meta property="og:image" content="' . $fileResourceReference->getPublicUrl() .'">');
            $pageRenderer->addHeaderData('<meta property="twitter:image" content="'. $fileResourceReference->getPublicUrl() .'">'); 
        }
        
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
        $views = $recipe->getViews();
        $recipe->setViews(++$views);
        $this->recipeRepository->update($recipe);
        
        $tagStr = $recipe->getCategory()->getTitle();
        $tags = $recipe->getTags();
        if (count($tags) > 0) {
           foreach($tags as $tag) {
               $tagStr .= ','.$tag->getTag();
           }
        }
        /**
         * @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
         */
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addHeaderData('<meta name="abstract" content="Recipe of '. $recipe->getTitle() .'">');
        $pageRenderer->addHeaderData('<meta name=”description” content=”'. $recipe->getTitle() .': ' .$recipe->getBrief() .'" />');
        $pageRenderer->addHeaderData('<meta name=”keywords” content=”'. $tagStr .'" />');
        $pageRenderer->addHeaderData('<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-1286748015534916",
          enable_page_level_ads: true
     });
</script>');
         
       
        $link =  $this->uriBuilder->setTargetPageUid($GLOBALS['TSFE']->id)->build();
        $pageRenderer->addHeaderData('<meta property="og:title" content="'.$recipe->getTitle().'">');
        $pageRenderer->addHeaderData('<meta property="og:type" content="article">');
        $pageRenderer->addHeaderData('<meta property="og:url" content="'.$link.'">');
        $pageRenderer->addHeaderData('<meta property="og:site_name" content="salmathechef">');
        $pageRenderer->addHeaderData('<meta property="og:description" content="' . str_replace(array("/", '"', "'", "@") , '', strip_tags($recipe->getTitle().'. '.$recipe->getBrief())) .'">');
        $pageRenderer->addHeaderData('<meta property="twitter:title" content="'.$recipe->getTitle().'">');
        $pageRenderer->addHeaderData('<meta property="twitter:card" content="'.$recipe->getTitle().'">');
        $pageRenderer->addHeaderData('<meta property="twitter:site" content="@salmathechef">');
        $pageRenderer->addHeaderData('<meta property="twitter:description" content="'. str_replace(array("/", '"', "'", "@") , '', strip_tags($recipe->getTitle().'. '.$recipe->getBrief())) .'">');
        $file = $recipe->getImage();
        if ($file instanceof \TYPO3\CMS\Extbase\Domain\Model\FileReference) {
            $fileResourceReference = $file->getOriginalResource();
            if (!$fileResourceReference instanceof \TYPO3\CMS\Core\Resource\FileReference) {
                $fileResourceReference = new \TYPO3\CMS\Core\Resource\FileReference(array('uid_local' => $file->getUid()));
            }
            $pageRenderer->addHeaderData('<meta property="og:image" content="' . $fileResourceReference->getPublicUrl() .'">');
            $pageRenderer->addHeaderData('<meta property="twitter:image" content="'. $fileResourceReference->getPublicUrl() .'">'); 
        }
        
        $this->view->assign('recipe', $recipe);
        $this->view->assign('relatedrecipes', $relatedrecipes);
    }
}
