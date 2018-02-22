<?php
namespace ARM\Recipeblog\Domain\Repository;

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
 * The repository for Recipes
 */
class RecipeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * defaultOrderings
     *
     * @var array
     */
    protected $defaultOrderings = array("uploadedon"=> \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING);
    
    /**
     * 
     * @param array $uids
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByUids($uids) {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->getQuerySettings()->setRespectSysLanguage(FALSE);
        
        $constraints = array();
        $constraints[] = $query->in('uid', $uids);
        $constraints[] = $query->equals('hidden', 0);
        $query->matching($query->logicalAnd($constraints));
        
        $query->setOrderings(
            array('uploadedon' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
        );
        
        return $query->execute();
    }
    
    /**
     * 
     * @param int $category
     * @param int $recipe
     */
    public function findRelated($category,$recipe) {
        
        $query = $this->createQuery();
        $query->setLimit(5);
        $constraints = array();
        $constraints[] = $query->equals('category', $category);
        $constraints[] = $query->equals('hidden', 0);
        $constraints[] = $query->logicalNot($query->equals('uid', $recipe));
        $query->matching($query->logicalAnd($constraints));
        
        $query->setOrderings(
            array('uploadedon' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
        );
        
        return $query->execute();
    }
    
    /**
     * 
     * @param int $limit
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function getPopular($limit=3) {
        
        $query = $this->createQuery();
        $query->setLimit($limit);
        $query->setOrderings(
            array('views' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
        );
        
        return $query->execute();
    }
    
    /**
     * 
     * @param int $category
     * @param int $tag
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function search($category=NULL, $tag = NULL) {
        
        $query = $this->createQuery();
        $constraints = array();
        $constraints[] = $query->equals('hidden', 0);
        
        if ($category > 0 && isset($category)) {
            $constraints[] = $query->equals('category', $category);
        }
        if ($tag > 0 && isset($tag)) {
            $constraints[] = $query->contains('tags', $tag);
        }
        $query->matching($query->logicalAnd($constraints));
        $query->setOrderings(
            array('uploadedon' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
        );
        
        return $query->execute();
    }
    
}
