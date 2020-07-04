<?php

namespace ObisConcept\NeosAjaxForm\Controller;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Security\Context;
use Neos\Flow\I18n\Locale;

/**
 * Class AjaxFormController
 *
 * @package ObisConcept\NeosAjaxForm
 * @subpackage Controller
 */
class AjaxFormController extends ActionController
{

    /**
     * @Flow\Inject
     * @var \Neos\Flow\I18n\Service
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
    public function injectSecurityContext(Context $securityContext)
    {
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
    public function indexAction($language, $formIdentifier, $presetName)
    {
        $this->localeService->getConfiguration()->setCurrentLocale(
            new Locale($language)
        );

        $this->view->assign('formIdentifier', $formIdentifier);
        $this->view->assign('presetName', $presetName);
    }
}
