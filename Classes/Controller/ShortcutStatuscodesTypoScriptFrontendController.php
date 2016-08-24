<?php
namespace Webit\ShortcutStatuscodes\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Frontend\Page\PageRepository;

/**
 * XClass to use different HTTP statuscodes for shortcuts
 *
 */
class ShortcutStatuscodesTypoScriptFrontendController extends TypoScriptFrontendController {

	/**
	 * Builds a typolink to the current page, appends the type paremeter if required
	 * and redirects the user to the generated URL using a Location header.
	 *
	 * @return void
	 */
	protected function redirectToCurrentPage() {
		$this->calculateLinkVars();
		// Instantiate \TYPO3\CMS\Frontend\ContentObject to generate the correct target URL
		/** @var $cObj ContentObjectRenderer */
		$cObj = GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');
		$parameter = $this->page['uid'];
		$type = GeneralUtility::_GET('type');
		if ($type && MathUtility::canBeInterpretedAsInteger($type)) {
			$parameter .= ',' . $type;
		}
		$redirectUrl = $cObj->typoLink_URL(array('parameter' => $parameter));

		// Prevent redirection loop
		if (!empty($redirectUrl)) {
			// HTTP Status code header - dependent on shortcut type
			// 307 for redirects to rather random pages (first subpage, random subpage, parent page)
			// 301 for redirects to a well-defined page
			$redirectStatus = HttpUtility::HTTP_STATUS_307;
			if ($this->originalShortcutPage['shortcut_mode'] == PageRepository::SHORTCUT_MODE_NONE) {
				$redirectStatus = HttpUtility::HTTP_STATUS_301;
			}
			// redirect and exit
			HttpUtility::redirect($redirectUrl, $redirectStatus);
		}
	}

}
?>