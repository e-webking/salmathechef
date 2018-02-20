<?php
namespace ARM\Recipeblog\ViewHelpers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SingleParaViewHelper
 *
 * @author anisur
 */
class SocialLinkViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * 
     * @param string $social
     * @param int $pageuid
     * @param int $recipe
     * @param string $text
     * @param string $image
     * @return string
     */
    public function render($social, $pageuid, $recipe, $text=NULL, $image=NULL) {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance( \TYPO3\CMS\Extbase\Object\ObjectManager::class );
        $uriBuilder = $objectManager->get( \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class );
        $url = urlencode($uriBuilder->setArgumentPrefix('tx_armrecipeblog_list')
                    ->setCreateAbsoluteUri(TRUE)
                    ->setUseCacheHash(FALSE)
                    ->setTargetPageUid($pageuid)
                    ->uriFor('show', array('recipe' => $recipe),
                        'Recipe',
                        'Recipeblog',
                        'Show'
                    ));
        $return = '';
        switch ($social) {
            case 'facebook':
                $return = 'http://www.facebook.com/sharer.php?u=' . $url; 
                break;
            case 'twitter':
                 $return = 'http://twitter.com/share?url=' . $url . '&amp;text='.$text; 
                break;
            case 'pin':
                 $return = '//www.pinterest.com/pin/create/button/?url=' . $url . '&#038;description='.$text; 
                if(isset($image)) {
                    $return .= '&#038;media='.$image; 
                }
                break;
            case 'gplus':
                $return = 'https://plus.google.com/share?url=' . $url . '&amp;title='.$text; 
                break;
            case 'email':
                $return = 'mailto:?Subject='.$text.'&amp;Body=Check this wonderful recipe "'.$text.'" at '.$url;
                break;
        }
        
        return $return;
    }
}