<?php
/**
 * @copyright   (C) 2021 Rishabh Ranjan Jha
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

\JLoader::register('TwitterFeedsHelper', __DIR__ . '/helper.php');

$html = TwitterFeedsHelper::getResponseHtml($params);

echo $html;
