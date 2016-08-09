<?php

namespace ObisConcept\NeosAjaxForm\Controller;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use TYPO3\Flow\Security\Context;
use TYPO3\Flow\I18n\Locale;

/**
 * Class AjaxFormController
 *
 * @package ObisConcept\NeosAjaxForm
 * @subpackage Controller
 */
class AjaxFormController extends ActionController {

    /**
     * @Flow\Inject
     * @var \TYPO3\Flow\I18n\Service
     */
    protected $localeService;

    /**
     * Security context
     *
     * @var Context
     */
    protected $securityContext;

    /**
     * Injects the Security Context
     *
     * @param Context $securityContext
     * @return void
     */
    public function injectSecurityContext(Context $securityContext) {

        $this->securityContext = $securityContext;

    }


    /**
     * AJAX form index action
     *
     * @param string $language
     * @param string $formIdentifier
     * @param string $presetName
     * @return void
     */
    public function indexAction($language, $formIdentifier, $presetName) {

        $this->localeService->getConfiguration()->setCurrentLocale(
            new Locale($language)
        );

        $this->view->assign('formIdentifier', $formIdentifier);
        $this->view->assign('presetName', $presetName);

    }

}
