<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Administrator
 * @subpackage  com_blank
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Language\Text;

class BlankViewBlank extends HtmlView
{
    public function display($tpl = null)
    {
        Factory::getDocument()->addStyleDeclaration('#isisJsData{height:0!important;overflow:hidden!important;}');
        ToolBarHelper::title(Text::_('COM_BLANK'));
        parent::display($tpl);
    }
}
