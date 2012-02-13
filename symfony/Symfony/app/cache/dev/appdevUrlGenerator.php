<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'AceUserBundle_homepage' => true,
       'AceEditorBundle_homepage' => true,
       'AceEditorBundle_list' => true,
       'AceEditorBundle_create' => true,
       'AceEditorBundle_editor' => true,
       'AceEditorBundle_save' => true,
       'AceEditorBundle_compile' => true,
       'AceEditorBundle_download' => true,
       'AceEditorBundle_options' => true,
       'AceEditorBundle_setoptions' => true,
       'login' => true,
       'login_check' => true,
       '_security_logout' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getAceUserBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Ace\\UserBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getAceEditorBundle_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/home',  ),));
    }

    private function getAceEditorBundle_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::listAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/list',  ),));
    }

    private function getAceEditorBundle_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::createAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/create',  ),));
    }

    private function getAceEditorBundle_editorRouteInfo()
    {
        return array(array (  0 => 'project_name',), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::editAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'project_name',  ),  1 =>   array (    0 => 'text',    1 => '/edit',  ),));
    }

    private function getAceEditorBundle_saveRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::saveAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/save',  ),));
    }

    private function getAceEditorBundle_compileRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::compileAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/compile',  ),));
    }

    private function getAceEditorBundle_downloadRouteInfo()
    {
        return array(array (  0 => 'project_name',  1 => 'type',), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::downloadAction',  'type' => 'file',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'type',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'project_name',  ),  2 =>   array (    0 => 'text',    1 => '/download',  ),));
    }

    private function getAceEditorBundle_optionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::optionsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/options',  ),));
    }

    private function getAceEditorBundle_setoptionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\EditorBundle\\Controller\\DefaultController::setoptionsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/setoptions',  ),));
    }

    private function getloginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ace\\SecurityBundle\\Controller\\SecurityController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getlogin_checkRouteInfo()
    {
        return array(array (), array (), array (), array (  0 =>   array (    0 => 'text',    1 => '/login_check',  ),));
    }

    private function get_security_logoutRouteInfo()
    {
        return array(array (), array (), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }
}
