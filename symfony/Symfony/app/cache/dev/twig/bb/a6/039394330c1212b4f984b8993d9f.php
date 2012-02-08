<?php

/* AceEditorBundle:Default:editor.html.twig */
class __TwigTemplate_bba6039394330c1212b4f984b8993d9f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "  <style type=\"text/css\" media=\"screen\">
    body {
        overflow: hidden;
    }
    
    #editor { 
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 300;
        right: 0;
        width: 800px;
/*        height: 400px;*/
    }
  </style>
";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        echo "\t<div>
\t<!--- <form action=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save", array("filename" => $this->getContext($context, "filename"))), "html", null, true);
        echo "\" method=\"post\"> --->
    <input type=\"submit\" value=\"Save Document\" id = \"save\" />
\t<form action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save", array("filename" => $this->getContext($context, "filename"))), "html", null, true);
        echo "\" method=\"post\">
\t<input type=\"hidden\" value = \"bla\" name=\"data\"/>
    <input type=\"submit\" value=\"Save Document\"/>
\t</form>
\t</div><br />
\t<pre id=\"editor\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "code"), "html", null, true);
        echo "</pre>\t
\t<!-- <div id=\"editor\"> -->
\t<!-- </div> -->
\t<script src=";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/ace.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/theme-textmate.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/mode-c_cpp.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script>
    var editor = ace.edit(\"editor\");
\twindow.onload = function() {
\t    editor.setTheme(\"ace/theme/textmate\");

\t    var JavaScriptMode = require(\"ace/mode/c_cpp\").Mode;
\t    editor.getSession().setMode(new JavaScriptMode());

\t\teditor.getSession().setUseSoftTabs(false);
\t};
\t\$(document).ready(function()
\t{\t
\t\t\$(\"#save\").click(function() 
\t\t{
\t\t\t\$.post(\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save", array("filename" => $this->getContext($context, "filename"))), "html", null, true);
        echo "\", {data: editor.getSession().getValue()}, function(data)
\t\t\t{
\t\t\t\talert(\"Data received: \" + data);
\t\t\t});
\t\t});
\t});

\t</script>
\t

";
    }

    public function getTemplateName()
    {
        return "AceEditorBundle:Default:editor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
