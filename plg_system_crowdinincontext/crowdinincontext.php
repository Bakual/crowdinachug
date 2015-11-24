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
 * Plug-in to load the Crowdin JavaScript
 *
 * @since  1.0.0
 */
class PlgSystemCrowdinincontext extends JPlugin
{
	/**
	 * Application object.
	 *
	 * @var    JApplicationCms
	 * @since  3.2
	 */
	protected $app;

	/**
	 * Add the Crowdin JavaScript.
	 *
	 * @return  void
	 *
	 * @since   3.4
	 */
	public function onAfterRoute()
	{
		// Only act on HTML pages
		if ($this->app->input->get('format', 'html') != 'html')
		{
			return;
		}

		// Only act when Crowdin Pseudolanguage is active
		if (JFactory::getLanguage()->getTag() != 'ach-UG')
		{
			return;
		}

		$doc = JFactory::getDocument();
		$doc->addScriptDeclaration("
			var _jipt = [];
			_jipt.push(['project', 'joomla-cms']);
		");
		$doc->addScript('//cdn.crowdin.com/jipt/jipt.js', 'text/javascript', true, true);
	}
}
