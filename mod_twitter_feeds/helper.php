<?php
/**
 * @copyright   (C) 2021 Rishabh Ranjan Jha
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_twitter_feeds
 *
 * @since  1.0.0
 */
class TwitterFeedsHelper
{
	/**
	 * Get response html
	 *
	 * @param   Registry  &$params  Module parameters
	 *
	 * @return  string
	 */
	public static function getResponseHtml(&$params)
	{

		$url = $params->get('url', 'https://twitter.com/joomla');

		if ($params->get('height', '0') === '0')
		{
			$limit = 'maxheight=' . $params->get('maxheight', '600');
		}
		else
		{
			$limit = 'limit=' . $params->get('limit', '6');
		}

		$maxwidth = $params->get('maxwidth', '400');
		$theme = $params->get('theme', 'light');

		$lang = $params->get('lang', 'en');
		$chrome = 'chrome=';

		if ($params->get('header', '1') === '0')
		{
			$chrome .= 'noheader%20';
		}

		if ($params->get('footer', '1') === '0')
		{
			$chrome .= 'nofooter%20';
		}

		if ($params->get('scrollbar', '0') === '0' && $params->get('height', '0') === '0')
		{
			$chrome .= 'noscrollbar%20';
		}

		if ($params->get('borders', '0') === '0')
		{
			$chrome .= 'noborders%20';
		}
		else
		{
			$chrome .= 'border_color=' . $params->get('border_color', '#30638d');
		}

		$dnt = $params->get('dnt', 'true');

		$request = 'https://publish.twitter.com/oembed?url=' . $url . '&' . $limit . '&maxwidth=' .
		$maxwidth . '&theme=' . $theme . '&lang=' . $lang . '&' . $chrome . '&dnt=' . $dnt;

		$response = file_get_contents($request);
		$response = json_decode($response);

		return $response->html;
	}
}
