<?php 
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Crowdinincontext
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

/**
 * Script to enable the plugin after installation/update
 *
 * @since  1.0
 */
class PlgSystemCrowdinincontextInstallerScript
{
	/**
	 * Method to update the plugin
	 *
	 * @param   object  $parent  JInstallerAdapterPlugin class calling this method
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function update($parent)
	{
		$this->install($parent);
	}

	/**
	 * Method to install the plugin
	 *
	 * @param   object  $parent  JInstallerAdapterPlugin class calling this method
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function install($parent)
	{
		// Enable plugin
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->update('#__extensions');
		$query->set($db->quoteName('enabled') . ' = 1');
		$query->where($db->quoteName('element') . ' = ' . $db->quote('crowdinincontext'));
		$query->where($db->quoteName('folder') . ' = ' . $db->quote('system'));
		$query->where($db->quoteName('type') . ' = ' . $db->quote('plugin'));

		$db->setQuery($query);
		$db->execute();
	}
}
