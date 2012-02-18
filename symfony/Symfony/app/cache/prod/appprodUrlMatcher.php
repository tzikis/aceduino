<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
