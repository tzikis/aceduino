<?php

/* ::base.html.twig */
class __TwigTemplate_2825b069f427fd79f94148a810204e65 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'examples' => array($this, 'block_examples'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t\t<link type=\"text/css\" href=";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css"), "html", null, true);
        echo " rel=\"stylesheet\" />\t
\t\t<!-- GH STUFF! has to be removed!-->
\t\t<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("gh/css-1.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
\t    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("gh/css-2.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
\t\t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
\t\t<!-- <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("santiquiss/css/bootstrap.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" /> -->
\t\t
\t\t<style type=\"text/css\" media=\"screen\">
\t\t\tbody
\t\t\t{
\t\t\t\tpadding-top: 40px;
\t\t\t}
\t\t\t
\t\t</style>
\t    <link href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
\t\t<script src=";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery-ui/js/jquery-1.7.1.min.js"), "html", null, true);
        echo " type=\"text/javascript\"></script>
\t\t<script src=";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery-ui/js/jquery-ui-1.8.17.custom.min.js"), "html", null, true);
        echo " type=\"text/javascript\"></script>
\t    ";
        // line 25
        $this->displayBlock('javascripts', $context, $blocks);
        // line 26
        echo "    </head>
    <body>
\t\t<div class=\"navbar navbar-fixed-top\">
\t\t  <div class=\"navbar-inner\">
\t\t    <div class=\"container-fluid\">
\t\t      <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
\t\t        <span class=\"icon-bar\"></span>
\t\t        <span class=\"icon-bar\"></span>
\t\t        <span class=\"icon-bar\"></span>
\t\t      </a>
\t\t      <a class=\"brand\" href=\"#\">clouduino</a>
\t\t      <div class=\"nav-collapse\">
\t\t        <ul class=\"nav\">
\t\t\t<!--
\t\t\t \t\t\t\t\t";
        // line 40
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 41
            echo "\t\t\t\t\t\t\t\t\t<li><a href=\"https://github.com/tzikis\">
\t\t\t\t\t\t\t\t\t\t<img id=\"avatar\" height=\"20\" src=\"https://secure.gravatar.com/avatar/4db71795ff05d3b53432fe27cd8b00b8?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-140.png\" width=\"20\" />
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
        }
        // line 46
        echo "\t\t\t\t\t\t -->
\t\t          <li class=\"active\"><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_homepage"), "html", null, true);
        echo "\">Home</a></li>

\t\t\t\t\t";
        // line 49
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            echo "\t\t      
\t\t\t          <li><a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_list"), "html", null, true);
            echo "\">My Projects</a></li>
\t\t\t          <li><a href=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_options"), "html", null, true);
            echo "\">Options</a></li>
\t\t\t\t      <!-- <li><a href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_logout"), "html", null, true);
            echo "\" id=\"logout\">Log Out</a></li> -->
\t\t\t\t\t";
        }
        // line 54
        echo "\t\t\t\t\t<li><form class=\"navbar-search pull-left\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_homepage"), "html", null, true);
        echo "\">
\t\t\t\t\t  <input type=\"text\" class=\"search-query\" placeholder=\"Search\">
\t\t\t\t\t</form>
\t\t\t\t\t</li>
\t\t        </ul>
\t\t\t\t";
        // line 59
        $this->displayBlock('examples', $context, $blocks);
        // line 61
        echo "\t\t\t\t
\t\t\t\t";
        // line 62
        if ((!$this->env->getExtension('security')->isGranted("ROLE_USER"))) {
            // line 63
            echo "\t\t        <ul class=\"nav pull-right\">
\t\t\t\t\t<li>
\t\t\t\t      \t<a href=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("login"), "html", null, true);
            echo "\">Log In</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t";
        }
        // line 68
        echo "\t\t
\t\t\t\t";
        // line 69
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 70
            echo "\t\t\t\t<ul class=\"nav pull-right\">
\t\t\t\t    <li><a href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_logout"), "html", null, true);
            echo "\" id=\"logout\">Log Out</a></li>
\t\t\t\t</ul>
\t\t\t\t<p class=\"navbar-text pull-right\">
\t\t\t\t\tLogged in as <a href=\"#\">";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
            echo "</a>
\t\t\t\t</p>
\t\t\t\t";
        }
        // line 77
        echo "\t\t      </div><!--/.nav-collapse -->
\t\t    </div>
\t\t  </div>
\t\t</div>\t\t
\t\t<!-- Le javascript
\t\t================================================== -->
\t\t<!-- Placed at the end of the document so the pages load faster -->
\t\t
\t\t<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
\t\t<!-- <script src=\"../assets/js/bootstrap-transition.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-alert.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-modal.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-dropdown.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-scrollspy.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-tab.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-tooltip.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-popover.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-button.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-collapse.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-carousel.js\"></script>
\t\t<script src=\"../assets/js/bootstrap-typeahead.js\"></script> -->
\t
\t<!-- \t\t      <div id=\"header\" class=\"true clearfix\">
\t\t\t        <div class=\"container clearfix\">
\t\t\t  <div id=\"userbox\">
\t\t\t    <div id=\"user\">
\t\t\t      <a id=\"help\" href=\"http://help\">Help</a>
\t\t\t    </div>
\t\t\t  </div>

\t        </div>
\t      </div> -->
\t
        ";
        // line 110
        $this->displayBlock('body', $context, $blocks);
        // line 111
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 25
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 59
    public function block_examples($context, array $blocks = array())
    {
        // line 60
        echo "\t\t\t\t";
    }

    // line 110
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
