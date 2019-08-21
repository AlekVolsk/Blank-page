<?php defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Version;
use Joomla\CMS\Language\Text;

class com_blankInstallerScript
{
    function postflight($type, $parent)
    {
        if (strtolower($type) === 'uninstall') {
            return true;
        }

        $db = Factory::getDbo();
        $query = $db->getQuery(true)
            ->update('`#__extensions`')
            ->set('`params` = ' . $db->quote('{"sef_advanced":"1"}'))
            ->where('`element` = ' . $db->quote('com_blank'))
            ->where('`type` = ' . $db->quote('component'));
        $db->setQuery($query)->execute();
    }
}
