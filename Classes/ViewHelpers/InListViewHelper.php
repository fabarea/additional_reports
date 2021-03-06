<?php

namespace Sng\AdditionalReports\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Yohann CERDAN <cerdanyohann@yahoo.fr>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * ViewHelper to check if a variable is in a list
 *
 * Example
 * <AdditionalReports:inList list="{AdditionalReports:session(index:'agenda', identifier:'dates')}" item="{eventDate.filtre}">...</AdditionalReports:inList>
 *
 * @package    TYPO3
 * @subpackage AdditionalReports
 */
class InListViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper
{

    /**
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('list', 'string', 'List');
        $this->registerArgument('item', 'string', 'Item');
    }

    /**
     * Renders else-child or else-argument if variable $item is in $list
     *
     * @return string
     */
    public function render()
    {
        if (\TYPO3\CMS\Core\Utility\GeneralUtility::inList($this->arguments['list'], $this->arguments['item']) === true) {
            return $this->renderThenChild();
        }
        return $this->renderElseChild();
    }

}

?>