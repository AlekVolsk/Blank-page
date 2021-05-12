<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Component\ComponentHelper;

class BlankViewBlank extends HtmlView
{
	public function display($tpl = null)
	{
        $params = ComponentHelper::getParams('com_blank');
		$titleSource = $params->get('titlesource', 0);
        if ($titleSource) {
            Factory::getDocument()->setTitle(Factory::getConfig()->get('sitename'));
        }
		parent::display($tpl);
	}
}
