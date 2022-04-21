<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Administrator
 * @subpackage  com_blank
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\MVC\Controller\BaseController;

class BlankController extends BaseController
{
    function display($cachable = false, $urlparams = [])
    {
        $this->default_view = 'blank';
        parent::display($cachable, $urlparams);
    }
}
