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
            'examples' => array($this, 'block_examples'),
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

html
{
    height: 100%;
    width: 100%;
    overflow: hidden;
}

body
{
    overflow: hidden;
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
\tbox-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;
}
    
#editor
{ 
\tposition: absolute;
\ttop:  50px;
/*\tleft: 280px;*/
\tbottom:10px;
/*\theight:1000px;*/
\tbackground: white;
\tpadding: 0px;
}
#selection
{
\t\twidth: 250px;
/*\t\theight: 200px;*/
}
#container
{
\t\tmargin-top: 10px;\t\t
}
#container_left
{
/*\t\tfloat:left;
\t\tmargin-right: 10px;
*/}
#container_right
{
}
#compile_output
{
\tposition: absolute;
\tbottom: 0px;
\theight:0px;
\tpadding: 0px;
\toverflow-y: scroll;
\tbackground: white;
\t/*\twidth: 280px;*/
\twhite-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
\twhite-space: -pre-wrap;      /* Opera 4-6 */
\twhite-space: -o-pre-wrap;    /* Opera 7 */
\twhite-space: pre-wrap;       /* css-3 */
\tword-wrap: break-word;       /* Internet Explorer 5.5+ */
}
.btn
{
\twidth:100%;
\tmargin-bottom:10px;
}

.download_link
{
\tmargin-left:14px;
}

.navbar-fixed-bottom {
  position: fixed;
  bottom: 0;
  right: 0;
  left: 0;
  z-index: 1030;
}
.navbar-fixed-bottom .navbar-inner {
  padding-left: 0;
  padding-right: 0;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}


  </style>
";
    }

    // line 93
    public function block_javascripts($context, array $blocks = array())
    {
        // line 94
        echo "<script src=";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/ace.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/theme-textmate.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/mode-c_cpp.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
";
        // line 97
        $this->env->loadTemplate("AceEditorBundle:Default:editor_scripts.html.twig")->display($context);
    }

    // line 99
    public function block_body($context, array $blocks = array())
    {
        // line 100
        echo "<!-- <div class=\"navbar navbar-fixed-bottom\">
\t<div class=\"navbar-inner\">
\t    <div class=\"container-fluid\">
\t\t<ul class=\"nav\">\t\t
          <li id=\"homepage\"><a href=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_homepage"), "html", null, true);
        echo "\">Home</a></li>
        </ul>
\t\t</div>
\t</div>
</div> -->

<div class=\"container\">
<div id=\"container\" class=\"row-fluid\">\t
\t<div class=\"row-fluid\">
\t<div id=\"container_left\" class=\"span2\">
\t\t<button id = \"revert\" class=\"btn disabled\"><i id=\"revert_icon\" class=\"icon-arrow-left\"></i> Revert</span></button>
\t    <button id = \"save\" class=\"btn disabled\" /><i id=\"save_icon\" class=\"icon-download\"></i> Save Changes</button>
\t\t<button id = \"compile\" class=\"btn\"><i id=\"compile_icon\" class=\"icon-check\"></i><span id=\"compile_text\"> Build</span></button>
\t\t<button id = \"upload\" class=\"btn\"><i id=\"upload_icon\" class=\"icon-upload\"></i><span id=\"upload_text\"> Upload</span></button>
\t\t<hr>
\t\t    <div id=\"noscanning\">
\t\t        <button onclick='scan()' class=\"btn\">Search for Arduino...</button>
\t\t    </div>
\t\t    <div id=\"scanning\">
\t\t        <button onclick='connect()' class=\"btn\">Connect</button>
\t\t\t\t<select id=\"ports\" class=\"span12\"></select>
\t\t\t\t";
        // line 126
        echo "\t\t\t\t<select id=\"baudrates\" class=\"span12\"></select>
\t    </div>
\t\t<div id=\"saves\" class=\"well\">
\t\t\t<i class=\"icon-file\"></i>Download:<br />
\t\t\t<a href=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_download", array("project_name" => $this->getContext($context, "project_name"))), "html", null, true);
        echo "\" class=\"download_link link_ino\">Download .ino</a>
\t\t\t<a href=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_download", array("project_name" => $this->getContext($context, "project_name"), "type" => "hex")), "html", null, true);
        echo "\" class=\"download_link link_hex\">Download .hex</a>
\t\t</div>
\t\t<div>
\t\t\tTotal Number of lines: <span id=\"line_count\">0</span>
\t\t</div>
\t\t<div id=\"progress\" class=\"progress progress-striped active\">
\t\t    <div id=\"progress_val\" class=\"bar\" style=\"width: 40%;\"></div>
\t\t    </div>
\t\t<div id=\"operation_output\">
\t\t</div>
\t\t<applet width=\"1\" height=\"1\"  id=\"myapplet\" style=\"visibility:hidden;\"
\t\t        code=\"eu.amaxilatis.ardoserial.MyApplet.class\"
\t\t        archive=\"http://students.ceid.upatras.gr/~amaxilatis/ardoserial/ardoSerial-0.1-jar-with-dependencies.jar\">
\t\t</applet>
\t</div>
\t<div id=\"container_right\" class=\"span10\">
\t\t<div class=\"row-fluid\">
\t\t<pre id=\"editor\" class=\"span9\">";
        // line 148
        echo $this->env->getExtension('actions')->renderAction("AceEditorBundle:Default:getData", array("project_name" => $this->getContext($context, "project_name")), array());
        echo "</pre>
\t\t</div>
\t\t<div class=\"row-fluid\">
\t\t<div id=\"compile_output\" class=\"span9 well\"></div>
\t\t</div>
\t</div>\t
</div>
</div>
</div>


<script>
var editor = ace.edit(\"editor\");
var dirty = false;
\t
window.onload = function()
{
    editor.setTheme(\"ace/theme/textmate\");

    var JavaScriptMode = require(\"ace/mode/c_cpp\").Mode;
    editor.getSession().setMode(new JavaScriptMode());

\teditor.getSession().setUseSoftTabs(false);
\teditor.getSession().on('change', function()
\t{
\t\tthrowMud();
\t\t\$(\"#line_count\").html(editor.getSession().getValue().split(\"\\n\").length);
\t});
\t
\taddCommands();
\tgetIds();\t
};


\$(document).ready(function()
{\t
\t\$(\"#line_count\").html(editor.getSession().getValue().split(\"\\n\").length);
\t";
        // line 185
        if (($this->getContext($context, "hex_exists") == false)) {
            // line 186
            echo "\t\tdisableLink(\$(\".link_hex\"));
\t";
        }
        // line 188
        echo "\t
\t\$(\"#scanning\").hide();
\t\$(\"#progress\").hide();
\t\$(\"#save\").click(function()
\t{
\t\tsave();
\t});
\t\$(\"#revert\").click(function()
\t{
\t\trevert();
\t});
\t
\t\$(\"#compile\").click(function() 
\t{
\t\tmotherInLaw();
\t});
\t
\t\$(\"#upload\").click(function() 
\t{
\t\tupload();
\t});
});
</script>
\t

";
    }

    // line 215
    public function block_examples($context, array $blocks = array())
    {
        // line 216
        echo "<ul class=\"nav\">
  <li class=\"dropdown\">
    <a href=\"javascript:void(0)\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Examples<b class=\"caret\"></b></a>
    <ul class=\"dropdown-menu\">
\t\t";
        // line 220
        $this->env->loadTemplate("AceEditorBundle:Default:examples_section.html.twig")->display(array("examples" => $this->getContext($context, "examples"), "type" => 1));
        // line 221
        echo "\t\t<li class=\"divider\"></li>
\t\t<li class=\"nav-header\">Libraries</li>
\t\t";
        // line 223
        $this->env->loadTemplate("AceEditorBundle:Default:examples_section.html.twig")->display(array("examples" => $this->getContext($context, "lib_examples"), "type" => 2));
        // line 224
        echo "\t\t<li class=\"divider\"></li>
\t
    </ul>
  </li>
</ul>

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
