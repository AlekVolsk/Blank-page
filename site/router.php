<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;
use Joomla\CMS\Component\Router\Rules\StandardRules;

class BlankRouter extends RouterView
{
    public function __construct($app = null, $menu = null)
    {
        $this->registerView(new RouterViewConfiguration('blank'));

        parent::__construct($app, $menu);

        $this->attachRule(new MenuRules($this));
        $this->attachRule(new StandardRules($this));
        $this->attachRule(new NomenuRules($this));
    }

    public function getPageSegment($id, $query)
    {
        return (!empty($id)) ? array($id => $id) : false;
    }

    public function getPageId($segment, $query)
    {
        return (!empty($segment)) ? $segment : false;
    }
}

function blankBuildRoute(&$query)
{
    $app    = Factory::getApplication();
    $router = new BlankRouter($app, $app->getMenu());

    return $router->build($query);
}

function blankParseRoute($segments)
{
    $app    = Factory::getApplication();
    $router = new BlankRouter($app, $app->getMenu());

    return $router->parse($segments);
}
