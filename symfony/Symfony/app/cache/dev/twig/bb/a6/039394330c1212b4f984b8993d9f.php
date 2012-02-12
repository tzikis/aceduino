<?php

/* AceEditorBundle:Default:editor.html.twig */
class __TwigTemplate_bba6039394330c1212b4f984b8993d9f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
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
    body
\t{
        overflow: hidden;
    }
    
    #editor
\t{ 
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 300;
        right: 0;
        width: 800px;
/*        height: 400px;*/
    }
\t#selection
\t{
\t\twidth: 400px;
/*\t\theight: 200px;*/
\t}
  </style>
";
    }

    // line 27
    public function block_javascripts($context, array $blocks = array())
    {
        // line 28
        echo "<script src=";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/ace.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/theme-textmate.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/mode-c_cpp.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script type=\"text/javascript\">
// function editFile()
// {
// \talert('editting file');
// \t// \$.get('/examples/1.Basics/Blink/Blink.ino', function(data)
// \t// {
// \t// \t\$('.result').html(data);
// \t// \teditor.getSession().setValue(data);
// \t// \talert('Load was performed.');
// \t// });
// }
\t
\t// editFile('/examples/1.Basics/Blink/Blink.ino');
</script>
<script type=\"text/javascript\">
function alertMe(filename){
\t// alert('editting file');
\t\$.get(filename, function(data)
\t{
\t\t\$('.result').html(data);
\t\teditor.getSession().setValue(data);
\t\t// alert('Load was performed.');
\t});
}
function editFile(){
alert('WTF!');
}
</script>
";
    }

    // line 60
    public function block_body($context, array $blocks = array())
    {
        // line 61
        echo "\t<div id=\"selection\">
\t\t<div id=\"accordion\">
\t\t\t";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "examples"));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 64
            echo "\t\t    <h3><a href=\"#\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "section"), 0, array(), "array"), "html", null, true);
            echo "</a></h3>
\t\t\t<div>
\t\t\t<ul>
\t\t    \t";
            // line 67
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "section"), 1, array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 68
                echo "\t\t    \t    <li onclick=\"alertMe('/examples/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "section"), 0, array(), "array"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "file"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "file"), "html", null, true);
                echo ".ino')\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "file"), "html", null, true);
                echo "</li>
\t\t    \t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 70
            echo "\t\t\t</ul>
\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 73
        echo "\t\t</div>
\t</div>
\t<script>
\t\$(function() {
\t\t\$( \"#accordion\" ).accordion({ header: \"h3\", autoHeight: false, navigation: true });
\t});
\t</script>

\t<!--- <form action=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save", array("filename" => $this->getContext($context, "filename"))), "html", null, true);
        echo "\" method=\"post\"> -->
    <input type=\"submit\" value=\"Save Document\" id = \"save\" />
\t<!-- <form action=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save", array("filename" => $this->getContext($context, "filename"))), "html", null, true);
        echo "\" method=\"post\">
\t<input type=\"hidden\" value = \"bla\" name=\"data\"/>
    <input type=\"submit\" value=\"Save Document\"/>
\t</form> -->
\t</div><br />
\t<pre id=\"editor\">";
        // line 88
        echo twig_escape_filter($this->env, $this->getContext($context, "code"), "html", null, true);
        echo "</pre>\t
\t<!-- <div id=\"editor\"> -->
\t<!-- </div> -->
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
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save", array("filename" => $this->getContext($context, "filename"))), "html", null, true);
        echo "\", {data: editor.getSession().getValue()}, function(data)
\t\t\t{
\t\t\t\talert(\"Data received: \" + data);
\t\t\t});
\t\t});
\t});
\t
\tfunction editFile(filename)
\t{
\t\t\$.get('ajax/test.html', function(data)
\t\t{
\t\t\t// \$('.result').html(data);
\t\t\teditor.getSession().setValue(data);
\t\t\t// alert('Load was performed.');
\t\t});
\t\t
\t}
\t
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
