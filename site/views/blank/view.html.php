<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Version;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Component\ComponentHelper;

class BlankViewBlank extends HtmlView
{
    public function display($tpl = null)
    {
        $params = ComponentHelper::getParams('com_blank');
        $menuActiveParams = Version::MAJOR_VERSION > 3
            ? Factory::getContainer()
                ->get(Joomla\CMS\Application\SiteApplication::class)
                ->getMenu('site')->getActive()->getParams()
            : Factory::getApplication()->getMenu()->getActive()->params;

        $titleSource = (bool)$params->get('titlesource', 0);
        $descSource = (bool)$params->get('descsource', 0);

        if ($titleSource) {
            $pageTitle = Factory::getConfig()->get('sitename');
        } else {
            $pageTitle = $menuActiveParams->get('page_title', Factory::getConfig()->get('sitename'));
        }

        if ($descSource) {
            $pageDesc = Factory::getDocument()->description;
        } else {
            $pageDesc = $menuActiveParams->get('menu-meta_description', Factory::getDocument()->description);
        }

        Factory::getDocument()->setTitle($pageTitle);
        if ($pageDesc) {
            Factory::getDocument()->setMetaData('description', $pageDesc);
        }

        parent::display($tpl);
    }
}
