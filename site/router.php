<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @copyright   Copyright (C) 2019 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;

function blankBuildRoute(&$query)
{
	if (isset($query['view'])) {
		unset($query['view']);
	}
	return [];
}

function blankParseRoute($segments)
{
	$vars = [];
	$count = count($segments);
	$menu = Factory::getApplication()->getMenu('site')->getActive();
	$view = isset($menu->query['view']) ? $menu->query['view'] : '';
	if ($view === 'blank' && !$count) {
		$vars['view'] = 'blank';
		return $vars;
	}
	return;
}
