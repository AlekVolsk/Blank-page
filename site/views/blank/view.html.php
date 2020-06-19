<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;

class BlankViewBlank extends HtmlView
{
    public function display($tpl = null)
    {
        $document = Factory::getDocument();
        $params = Factory::getApplication()->getMenu('site')->getActive()->params;
        
        $pageDesc = $params->get('menu-meta_description', '');
        if ($pageDesc) {
            $document->setDescription($pageDesc);
        }
        
        $pageKeywords = $params->get('menu-meta_keywords', '');
        if ($pageDesc) {
            $document->setMetadata('keywords', $pageKeywords);
        }
        
        $pageRobots = $params->get('robots', '');
        if ($pageDesc) {
            $document->setMetadata('robots', $pageRobots);
        }
    }
}
