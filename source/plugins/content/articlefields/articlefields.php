<?php
/**
 * Content Plugin for Joomla! - Article Fields
 *
 * @author     Jisse Reitsma <jisse@yireo.com>
 * @copyright  Copyright 2015 Jisse Reitsma
 * @license    GNU Public License version 3 or later
 * @link       https://github.com/yireo/plg_content_articlefields
 */

defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * Class PlgContentArticlefields
 *
 * @since  February 2015
 */
class PlgContentArticlefields extends JPlugin
{
    protected $autoloadLanguage = true;

	/**
	 * Event method that runs on content preparation
	 *
	 * @param   JForm    $form  The form object
	 * @param   integer  $data  The form data
	 *
	 * @return bool
	 */
	public function onContentPrepareForm($form, $data)
	{
		if (!($form instanceof JForm))
		{
			$this->_subject->setError('JERROR_NOT_A_FORM');

			return false;
		}

		$name = $form->getName();

		if (!in_array($name, array('com_content.article')))
		{
			return true;
		}

		JForm::addFormPath(__DIR__ . '/form');
		$form->loadFile('form');

		return true;
	}

	/**
	 * Event method run before content is displayed
	 *
	 * @param   string  $context  The context for the content passed to the plugin.
	 * @param   object  &$item    The content to be displayed
	 * @param   mixed   &$params  The item params
	 * @param   int     $page     Current page
	 *
	 * @return	null
	 */
	public function onContentBeforeDisplay($context, &$item, &$params, $page = 0)
	{
        $attributes = new JRegistry($item->attribs);
        $quote = $attributes->get('quote');
        $quote_cite = $attributes->get('quote_cite');
        $quote_class = $this->params->get('quote_class');

		if (!empty($quote))
		{
            $html = null;
            $html .= '<blockquote class="' . $quote_class . '">';
            $html .= $quote;

            if (!empty($quote_cite)) {
                $html .= '<footer><cite>';
                $html .= $quote_cite;
                $html .= '</cite></footer>';
            }

            $html .= '</blockquote>';

			$item->text = $html . $item->text;
		}
	}
}
