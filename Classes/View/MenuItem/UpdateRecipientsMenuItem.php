<?php
namespace Fab\NewsletterRecipients\View\MenuItem;

/*
 * This file is part of the Fab/NewsletterRecipients project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use Fab\NewsletterRecipients\Module\NewsletterRecipientModule;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Imaging\Icon;
use Fab\Vidi\View\AbstractComponentView;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class UpdateRecipientsMenuItem
 */
class UpdateRecipientsMenuItem extends AbstractComponentView
{

    /**
     * @return string
     * @throws \InvalidArgumentException
     */
    public function render()
    {
        $this->loadRequireJsCode();
        $result = sprintf('<li><a href="%s" class="btn-edit-many-recipients">%s %s</a></li>',
            $this->getUpdateRecipientsUri(),
            $this->getIconFactory()->getIcon('mimetypes-open-document-database', Icon::SIZE_SMALL),
            $this->getLanguageService()->sL('LLL:EXT:newsletter_recipients/Resources/Private/Language/locallang.xlf:action.update.recipients')
        );
        return $result;
    }

    /**
     * @return string
     * @throws \InvalidArgumentException
     */
    protected function getUpdateRecipientsUri(): string
    {
        $urlParameters = [
            NewsletterRecipientModule::getParameterPrefix() => [
                'controller' => 'NewsletterRecipient',
                'action' => 'editMany',
            ],
        ];

        return $this->getModuleUrl(NewsletterRecipientModule::getSignature(), $urlParameters);
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     */
    protected function loadRequireJsCode(): void
    {
        /** @var PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);

        $configuration['paths']['TYPO3/CMS/NewsletterRecipients'] = '../typo3conf/ext/newsletter_recipients/Resources/Public/JavaScript';
        $pageRenderer->addRequireJsConfiguration($configuration);
        $pageRenderer->loadRequireJsModule('TYPO3/CMS/NewsletterRecipients/UpdateRecipientsMenuItem');
    }


    /**
     * Returns the URL to a given module
     *
     * @param string $moduleName Name of the module
     * @param array $urlParameters URL parameters that should be added as key value pairs
     * @return string Calculated URL
     */
    public function getModuleUrl($moduleName, $urlParameters = [])
    {
        $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
        try {
            $uri = $uriBuilder->buildUriFromRoute($moduleName, $urlParameters);
        } catch (\TYPO3\CMS\Backend\Routing\Exception\RouteNotFoundException $e) {
            $uri = $uriBuilder->buildUriFromRoutePath($moduleName, $urlParameters);
        }
        return (string)$uri;
    }
}
