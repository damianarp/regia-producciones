<?php
/*------------------------------------------------------------------------
# plg_addcustomcss - Add Custom CSS
# ------------------------------------------------------------------------
# version 1.2.1
# author Impression eStudio
# copyright Copyright (C) 2017 Impression eStudio. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://joomla.impression-estudio.gr
# Technical Support: info@impression-estudio.gr
-------------------------------------------------------------------------*/

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgSystemAddCustomCSS extends JPlugin
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
		// Custom CSS 1.
		// **********************************************************************
		if (!empty($this->params->get('custom_css_file_path_1')))
		{
			$custom_css_file_mode_1 = $this->params->get('custom_css_file_mode_1');
			if (($app->isSite() && strcmp($custom_css_file_mode_1, 'front-end')==0) || ($app->isAdmin() && strcmp($custom_css_file_mode_1, 'back-end')==0) || strcmp($custom_css_file_mode_1, 'both')==0)
			{
				$custom_css_file_path_1 = JPATH_ROOT.'/'.$this->params->get('custom_css_file_path_1');
				ob_start();
				include($custom_css_file_path_1);
				$styles = ob_get_contents();
				
				// Remove comments.
				if ($this->params->get('remove_comments'))
				{
					$styles = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles);
				}
				
				// Minimize.
				if ($this->params->get('minimize'))
				{
					$styles = str_replace(array("\r\n", "\r", "\n", "\t"), '', $styles);
					$styles = preg_replace('/ +/', ' ', $styles);	// Replace multiple spaces with single space.
					$styles = trim($styles);		// Trim the string of leading and trailing space.
				}
				
				// Convert short absolute paths to full absolute paths.
				$styles = str_replace("url('", "url(", $styles);
				$styles = str_replace("')", ")", $styles);
				$styles = str_replace('url("', 'url(', $styles);
				$styles = str_replace('")', ')', $styles);
				$styles = str_replace('url(', 'url('.JURI::base(), $styles);
				
				ob_clean();
				//$document->addStyleDeclaration($styles);
				$document->addCustomTag('<style type="text/css">'.$styles.'</style>');
			}
		}
		
		// **********************************************************************
		// Custom CSS 2.
		// **********************************************************************
		if (!empty($this->params->get('custom_css_file_path_2')))
		{
			$custom_css_file_mode_2 = $this->params->get('custom_css_file_mode_2');
			if (($app->isSite() && strcmp($custom_css_file_mode_2, 'front-end')==0) || ($app->isAdmin() && strcmp($custom_css_file_mode_2, 'back-end')==0) || strcmp($custom_css_file_mode_2, 'both')==0)
			{
				$custom_css_file_path_2 = JPATH_ROOT.'/'.$this->params->get('custom_css_file_path_2');
				ob_start();
				include($custom_css_file_path_2);
				$styles = ob_get_contents();
				
				// Remove comments.
				if ($this->params->get('remove_comments'))
				{
					$styles = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles);
				}
				
				// Minimize.
				if ($this->params->get('minimize'))
				{
					$styles = str_replace(array("\r\n", "\r", "\n", "\t"), '', $styles);
					$styles = preg_replace('/ +/', ' ', $styles);	// Replace multiple spaces with single space.
					$styles = trim($styles);		// Trim the string of leading and trailing space.
				}
				
				// Convert short absolute paths to full absolute paths.
				$styles = str_replace("url('", "url(", $styles);
				$styles = str_replace("')", ")", $styles);
				$styles = str_replace('url("', 'url(', $styles);
				$styles = str_replace('")', ')', $styles);
				$styles = str_replace('url(', 'url('.JURI::base(), $styles);
				
				ob_clean();
				//$document->addStyleDeclaration($styles);
				$document->addCustomTag('<style type="text/css">'.$styles.'</style>');
			}
		}
		
		// **********************************************************************
		// Custom CSS 3.
		// **********************************************************************
		if (!empty($this->params->get('custom_css_file_path_3')))
		{
			$custom_css_file_mode_3 = $this->params->get('custom_css_file_mode_3');
			if (($app->isSite() && strcmp($custom_css_file_mode_3, 'front-end')==0) || ($app->isAdmin() && strcmp($custom_css_file_mode_3, 'back-end')==0) || strcmp($custom_css_file_mode_3, 'both')==0)
			{
				$custom_css_file_path_3 = JPATH_ROOT.'/'.$this->params->get('custom_css_file_path_3');
				ob_start();
				include($custom_css_file_path_3);
				$styles = ob_get_contents();
				
				// Remove comments.
				if ($this->params->get('remove_comments'))
				{
					$styles = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles);
				}
				
				// Minimize.
				if ($this->params->get('minimize'))
				{
					$styles = str_replace(array("\r\n", "\r", "\n", "\t"), '', $styles);
					$styles = preg_replace('/ +/', ' ', $styles);	// Replace multiple spaces with single space.
					$styles = trim($styles);		// Trim the string of leading and trailing space.
				}
				
				// Convert short absolute paths to full absolute paths.
				$styles = str_replace("url('", "url(", $styles);
				$styles = str_replace("')", ")", $styles);
				$styles = str_replace('url("', 'url(', $styles);
				$styles = str_replace('")', ')', $styles);
				$styles = str_replace('url(', 'url('.JURI::base(), $styles);
				
				ob_clean();
				//$document->addStyleDeclaration($styles);
				$document->addCustomTag('<style type="text/css">'.$styles.'</style>');
			}
		}
	}
}
