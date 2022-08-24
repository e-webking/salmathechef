<?php
namespace ARM\Armtyposcript\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package armtyposcript
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Service\FlexFormService;

class TyposcriptController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
    /**
     *
     * @return void
     */
    public function defaultAction() {

        $cobj = $this->configurationManager->getContentObject();
        $flexParser = GeneralUtility::makeInstance(FlexFormService::class);
        $flexArr = $flexParser->convertFlexFormContentToArray($cobj->data['pi_flexform']);
        $path = $flexArr['path'];
        $this->view->assign('ts', $path);
    }
}
