<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // AceUserBundle_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ace\\UserBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'AceUserBundle_homepage'));
        }

        // AceEditorBundle_homepage
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::indexAction',  '_route' => 'AceEditorBundle_homepage',);
        }

        // AceEditorBundle_list
        if ($pathinfo === '/list') {
            return array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::listAction',  '_route' => 'AceEditorBundle_list',);
        }

        // AceEditorBundle_create
        if ($pathinfo === '/create') {
            return array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::createAction',  '_route' => 'AceEditorBundle_create',);
        }

        // AceEditorBundle_editor
        if (0 === strpos($pathinfo, '/edit') && preg_match('#^/edit/(?P<project_name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::editAction',)), array('_route' => 'AceEditorBundle_editor'));
        }

        // AceEditorBundle_getdata
        if (0 === strpos($pathinfo, '/get_data') && preg_match('#^/get_data/(?P<project_name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::getDataAction',)), array('_route' => 'AceEditorBundle_getdata'));
        }

        // AceEditorBundle_save
        if ($pathinfo === '/save') {
            return array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::saveAction',  '_route' => 'AceEditorBundle_save',);
        }

        // AceEditorBundle_compile
        if ($pathinfo === '/compile') {
            return array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::compileAction',  '_route' => 'AceEditorBundle_compile',);
        }

        // AceEditorBundle_download
        if (0 === strpos($pathinfo, '/download') && preg_match('#^/download/(?P<project_name>[^/]+?)(?:/(?P<type>[^/]+?))?$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::downloadAction',  'type' => 'file',)), array('_route' => 'AceEditorBundle_download'));
        }

        // AceEditorBundle_options
        if ($pathinfo === '/options') {
            return array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::optionsAction',  '_route' => 'AceEditorBundle_options',);
        }

        // AceEditorBundle_setoptions
        if ($pathinfo === '/setoptions') {
            return array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::setoptionsAction',  '_route' => 'AceEditorBundle_setoptions',);
        }

        // login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Ace\\SecurityBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
        }

        // login_check
        if ($pathinfo === '/login_check') {
            return array('_route' => 'login_check');
        }

        // _security_logout
        if ($pathinfo === '/logout') {
            return array('_route' => '_security_logout');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
