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

// No direct access.
defined('_JEXEC') or die('Direct access to this location is not allowed.');

jimport('joomla.form.formfield');

class JFormFieldSpacerinfo extends JFormField 
{
	protected $type = 'Spacerinfo';

	public function getInput()
	{
		$output = "";
		$output .= '<style type="text/css">
		.control-label label {
			font-weight:bold;
		}
		
		hr + .control-group .control-label {
			display:none;
		}
		
		hr + .control-group .controls {
			margin-left:0;
		}
		
		hr + .control-group .controls :last-child {
			margin-bottom:0;
		}

		.acc-info td {
			vertical-align:middle;
		}
		.acc-info td:first-child {
			width:110px;
		}
		.acc-info td:first-child img {
			border: solid 1px #e3e3e3;
		}
		
		#jform_params_custom_css_file_path_1, 
		#jform_params_custom_css_file_path_2, 
		#jform_params_custom_css_file_path_3 {
			width:100%;
			box-sizing: border-box;
			min-height: 28px;
		}
		</style>';
		
		$output .= '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="acc-info">
			<tr>
				<td><img src="../plugins/system/addcustomcss/addcustomcss/images/logo.jpg" width="100" height="100" /></td>
				<td><strong>Name</strong>: Add Custom CSS <br />
					<strong>Version</strong>: 1.2.1 <br />
					<strong>Author</strong>: Impression eStudio <br />
					<strong>Website</strong>: <a href="http://joomla.impression-estudio.gr" target="_blank">http://joomla.impression-estudio.gr</a> <br />
					<strong>Contact</strong>: <a href="mailto:info@impression-estudio.gr">info@impression-estudio.gr</a> <br />
					<strong>Demo</strong>: <a href="../plugins/system/addcustomcss/addcustomcss/images/demo.png" target="_blank">Click here</a> <br />
					<strong>Help</strong>: <a href="http://joomla.impression-estudio.gr/add-custom-css/index.php" target="_blank">Click here</a>
				</td>
			</tr>
		</table>
		<hr>
		<p class="alert alert-danger"><strong>Caution: Put this plugin at the end of the plugin order in the Plug-in Manager.</strong></p>
		<h3>How it works</h3>
		<p><strong>This plugin is ideal for small to medium length of CSS code in order to do small corrections.</strong> It adds your custom CSS file as inline code at the end of the &lt;head&gt; element. This method allows to a) remove comments, b) to minimize the code, c) to convert the image paths to full absolute paths and d) increases the chances to load last after other CSS code.</p>
		<h3>Instructions</h3>
		<p><strong>Caution</strong>: When using CSS properties in your custom CSS file that define the path to an image (e.g. "background", "background-image", "border-image", "list-style-image") then use the relative path to the image, <strong>starting from the Joomla installation folder</strong>, to your image file. <br>Example: background-image:url("images/backgrounds/header.jpg") or background-image:url("templates/my-template/images/bg.jpg")</p>
		<hr>
		<h3>Parameters</h3>
		';
		
		return $output;
	}
}
?>