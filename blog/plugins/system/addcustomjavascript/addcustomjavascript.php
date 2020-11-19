<?php
/*------------------------------------------------------------------------
# plg_addcustomjavascript - Add Custom Javascript
# ------------------------------------------------------------------------
# version 1.1.2
# author Impression eStudio
# copyright Copyright (C) 2018 Impression eStudio. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://joomla.impression-estudio.gr
# Technical Support: info@impression-estudio.gr
-------------------------------------------------------------------------*/

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgSystemAddCustomJavascript extends JPlugin
{	
	function __construct( $subject, $params )
	{
		parent::__construct($subject, $params);

	}
	
	function onBeforeCompileHead()
	{
		$app = JFactory::getApplication();
		$document = JFactory::getDocument();
		
		// **********************************************************************
		// Custom Javascript 1.
		// **********************************************************************
		if (!empty($this->params->get('custom_javascript_file_mode_1')))
		{
			$custom_javascript_file_mode_1 = $this->params->get('custom_javascript_file_mode_1');
			if (($app->isSite() && strcmp($custom_javascript_file_mode_1, 'front-end')==0) || ($app->isAdmin() && strcmp($custom_javascript_file_mode_1, 'back-end')==0) || strcmp($custom_javascript_file_mode_1, 'both')==0)
			{				
				$custom_javascript_file_path_1 = JPATH_ROOT.'/'.$this->params->get('custom_javascript_file_path_1');
				ob_start();
				include($custom_javascript_file_path_1);
				$js = ob_get_contents();
				
				// Remove comments.
				if ($this->params->get('remove_comments'))
				{
					$pattern = '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/';
					$js = preg_replace($pattern, '', $js);	// Remove comments.
				}
				
				// Minimize.
				if ($this->params->get('minimize'))
				{
					$js = str_replace(array("\r\n", "\r", "\n", "\t"), '', $js);
					$js = preg_replace('/ +/', ' ', $js);	// Replace multiple spaces with single space.
					$js = trim($js);		// Trim the string of leading and trailing space.
				}
				
				$document->addScriptDeclaration($js);
				ob_end_clean();
			}
		}
		
		// **********************************************************************
		// Custom Javascript 2.
		// **********************************************************************
		if (!empty($this->params->get('custom_javascript_file_mode_2')))
		{
			$custom_javascript_file_mode_2 = $this->params->get('custom_javascript_file_mode_2');
			if (($app->isSite() && strcmp($custom_javascript_file_mode_2, 'front-end')==0) || ($app->isAdmin() && strcmp($custom_javascript_file_mode_2, 'back-end')==0) || strcmp($custom_javascript_file_mode_2, 'both')==0)
			{				
				$custom_javascript_file_path_2 = JPATH_ROOT.'/'.$this->params->get('custom_javascript_file_path_2');
				ob_start();
				include($custom_javascript_file_path_2);
				$js = ob_get_contents();
				
				// Remove comments.
				if ($this->params->get('remove_comments'))
				{
					$pattern = '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/';
					$js = preg_replace($pattern, '', $js);	// Remove comments.
				}
				
				// Minimize.
				if ($this->params->get('minimize'))
				{
					$js = str_replace(array("\r\n", "\r", "\n", "\t"), '', $js);
					$js = preg_replace('/ +/', ' ', $js);	// Replace multiple spaces with single space.
					$js = trim($js);		// Trim the string of leading and trailing space.
				}
				
				$document->addScriptDeclaration($js);
				ob_end_clean();
			}
		}
			
		// **********************************************************************
		// Custom Javascript 3.
		// **********************************************************************
		if (!empty($this->params->get('custom_javascript_file_mode_3')))
		{
			$custom_javascript_file_mode_3 = $this->params->get('custom_javascript_file_mode_3');
			if (($app->isSite() && strcmp($custom_javascript_file_mode_3, 'front-end')==0) || ($app->isAdmin() && strcmp($custom_javascript_file_mode_3, 'back-end')==0) || strcmp($custom_javascript_file_mode_3, 'both')==0)
			{				
				$custom_javascript_file_path_3 = JPATH_ROOT.'/'.$this->params->get('custom_javascript_file_path_3');
				ob_start();
				include($custom_javascript_file_path_3);
				$js = ob_get_contents();
				
				// Remove comments.
				if ($this->params->get('remove_comments'))
				{
					$pattern = '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/';
					$js = preg_replace($pattern, '', $js);	// Remove comments.
				}
				
				// Minimize.
				if ($this->params->get('minimize'))
				{
					$js = str_replace(array("\r\n", "\r", "\n", "\t"), '', $js);
					$js = preg_replace('/ +/', ' ', $js);	// Replace multiple spaces with single space.
					$js = trim($js);		// Trim the string of leading and trailing space.
				}
				
				$document->addScriptDeclaration($js);
				ob_end_clean();
			}
		}
	}
}
