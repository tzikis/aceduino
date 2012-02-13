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
\t\t<link href=\"https://a248.e.akamai.net/assets.github.com/stylesheets/bundles/github-92243db0daab07aa944d353c1ba062b9581bd321.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
\t    <link href=\"https://a248.e.akamai.net/assets.github.com/stylesheets/bundles/github2-87ee95a5f2db56a1f4a7182cbe29182e4b9eeccd.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
\t    
\t\t
\t\t<script src=";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery-ui/js/jquery-1.7.1.min.js"), "html", null, true);
        echo " type=\"text/javascript\"></script>
\t\t<script src=";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery-ui/js/jquery-ui-1.8.17.custom.min.js"), "html", null, true);
        echo " type=\"text/javascript\"></script>
\t    ";
        // line 16
        $this->displayBlock('javascripts', $context, $blocks);
        // line 17
        echo "    </head>
    <body>
\t\t      <div id=\"header\" class=\"true clearfix\">
\t\t        <div class=\"container clearfix\">
\t\t          <!-- <a class=\"site-logo\" href=\"https://github.com/\">
\t\t            <img alt=\"GitHub\" class=\"github-logo-4x\" height=\"30\" src=\"https://a248.e.akamai.net/assets.github.com/images/modules/header/logov7@4x.png?1323882799\" />
\t\t            <img alt=\"GitHub\" class=\"github-logo-4x-hover\" height=\"30\" src=\"https://a248.e.akamai.net/assets.github.com/images/modules/header/logov7@4x-hover.png?1324325436\" />
\t\t          </a> -->


\t\t    <div class=\"topsearch \">
\t\t<!-- <form action=\"/search\" id=\"top_search_form\" method=\"get\">        <a href=\"/search\" class=\"advanced-search tooltipped downwards\" title=\"Advanced Search\">Advanced Search</a>
\t\t        <div class=\"search placeholder-field js-placeholder-field\">
\t\t          <label class=\"placeholder\" for=\"global-search-field\">Search…</label>
\t\t          <input type=\"text\" class=\"search my_repos_autocompleter\" id=\"global-search-field\" name=\"q\" results=\"5\" spellcheck=\"false\" autocomplete=\"off\" data-autocomplete=\"my-repos-autocomplete\">
\t\t          <div id=\"my-repos-autocomplete\" class=\"autocomplete-results\">
\t\t            <ul class=\"js-navigation-container\"></ul>
\t\t          </div>
\t\t          <input type=\"submit\" value=\"Search\" class=\"button\">
\t\t        </div>
\t\t        <input type=\"hidden\" name=\"type\" value=\"Everything\" />
\t\t        <input type=\"hidden\" name=\"repo\" value=\"\" />
\t\t        <input type=\"hidden\" name=\"langOverride\" value=\"\" />
\t\t        <input type=\"hidden\" name=\"start_value\" value=\"1\" />
\t\t</form>-->
\t\t      <ul class=\"top-nav\"> 
\t\t          <li class=\"homepage\"><a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_homepage"), "html", null, true);
        echo "\">Homepage</a></li>
\t\t          <li><a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_list"), "html", null, true);
        echo "\">My Projects</a></li>
\t\t          <li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_options"), "html", null, true);
        echo "\">Options</a></li>
\t\t        <li><a href=\"http://help\">Help</a></li>
\t\t      \t<li><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("login"), "html", null, true);
        echo "\" id=\"login\">Log In</a></li>
\t\t
\t\t      </ul>
\t\t    </div>
\t\t";
        // line 51
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 52
            echo "\t\t  <div id=\"userbox\">
\t\t    <div id=\"user\">
\t\t      <a href=\"https://github.com/tzikis\"><img height=\"20\" src=\"https://secure.gravatar.com/avatar/4db71795ff05d3b53432fe27cd8b00b8?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-140.png\" width=\"20\" /></a>
\t\t      <a href=\"https://github.com/tzikis\" class=\"name\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
            echo "</a>
\t\t    </div>
\t\t    <ul id=\"user-links\">
\t\t      <a href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_logout"), "html", null, true);
            echo "\" id=\"logout\"><span class=\"icon\">Log Out</span></a>
\t\t    </ul>
\t\t  </div>
\t\t";
        }
        // line 62
        echo "



\t\t        </div>
\t\t      </div>
\t
        ";
        // line 69
        $this->displayBlock('body', $context, $blocks);
        // line 70
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

    // line 16
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 69
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
