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
        echo "\t<div id=\"menu\">
\t\t<a href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_list"), "html", null, true);
        echo "\">My Projects</a>
\t</div>
\t<div id=\"selection\">
\t\t<div id=\"accordion\">
\t\t\t";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "examples"));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 67
            echo "\t\t    <h3><a href=\"#\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "section"), 0, array(), "array"), "html", null, true);
            echo "</a></h3>
\t\t\t<div>
\t\t\t<ul>
\t\t    \t";
            // line 70
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "section"), 1, array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 71
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
            // line 73
            echo "\t\t\t</ul>
\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 76
        echo "\t\t</div>
\t</div>
\t<script>
\t\$(function() {
\t\t\$( \"#accordion\" ).accordion({ header: \"h3\", autoHeight: false, navigation: true });
\t});
\t</script>

    <input type=\"submit\" value=\"Save Changes\" id = \"save\" /><span id='save_done'></span>
\t<input type=\"submit\" value=\"Compile\" id = \"compile\" /><span id='compile_done'></span>
\t<div id=\"saves\">
\t\t<a href=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_download", array("project_name" => $this->getContext($context, "project_name"))), "html", null, true);
        echo "\">Download File</a>
\t\t<a href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_download", array("project_name" => $this->getContext($context, "project_name"), "type" => "hex")), "html", null, true);
        echo "\">Download Hex</a>
\t</div>
\t<div id=\"compile_output\">
\t\t
\t</div>
\t<!-- <form action=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save"), "html", null, true);
        echo "\" method=\"post\">
\t<input type=\"hidden\" value = \"bla\" name=\"data\"/>
\t<input type=\"hidden\" value = \"";
        // line 95
        echo twig_escape_filter($this->env, $this->getContext($context, "project_name"), "html", null, true);
        echo "\" name=\"project_name\">
    <input type=\"submit\" value=\"Save Document\"/>
\t</form> -->
\t<form action=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_compile"), "html", null, true);
        echo "\" method=\"post\">
\t<input type=\"hidden\" value = \"";
        // line 99
        echo twig_escape_filter($this->env, $this->getContext($context, "project_name"), "html", null, true);
        echo "\" name=\"project_name\">
    <input type=\"submit\" value=\"Compile\"/>
\t</form>
\t</div><br />
\t<pre id=\"editor\">";
        // line 103
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
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save"), "html", null, true);
        echo "\", {data: editor.getSession().getValue(), project_name:\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "project_name"), "html", null, true);
        echo "\"}, function(data)
\t\t\t{
\t\t\t\t\$(\"#save_done\").html(\"√\");
\t\t\t\twindow.setTimeout(function () {
\t\t\t\t    \$(\"#save_done\").html(\"\");
\t\t\t\t}, 5000);
\t\t\t\t// alert(\"Data received: \" + data);
\t\t\t});
\t\t});
\t\t\$(\"#compile\").click(function() 
\t\t{
\t\t\t\$.post(\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_compile"), "html", null, true);
        echo "\", { project_name:\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "project_name"), "html", null, true);
        echo "\"}, function(data)
\t\t\t{
\t\t\t\t\$(\"#compile_done\").html(\"√\");
\t\t\t\tvar obj = jQuery.parseJSON(data);
\t\t\t\tif(obj.success == 0)
\t\t\t\t{
\t\t\t\t\t\$(\"#compile_output\").css('color', 'red');
\t\t\t\t\tfor (var i=0; i<obj.lines.length; i++)
\t\t\t\t\t{
\t\t\t\t\t\t\$(\".ace_gutter-cell\").filter(function(index) {
\t\t\t\t\t\t  return \$(this).html() == obj.lines[i];
\t\t\t\t\t\t}).css(\"text-decoration\",\"underline\").css(\"color\",\"red\");
\t\t\t\t\t}
\t\t\t\t\t 
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\t\$(\"#compile_output\").css('color', '');
\t\t\t\t\t\$(\".ace_gutter-cell\").css(\"text-decoration\", \"\").css(\"color\",\"\");
\t\t\t\t}
\t\t\t\t
\t\t\t\t
\t\t\t\t\$(\"#compile_output\").html(obj.text);
\t\t\t\twindow.setTimeout(function () {
\t\t\t\t    \$(\"#compile_done\").html(\"\");
\t\t\t\t}, 5000);
\t\t\t\t// alert(\"Data received: \" + data);
\t\t\t});
\t\t});
\t\t
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
