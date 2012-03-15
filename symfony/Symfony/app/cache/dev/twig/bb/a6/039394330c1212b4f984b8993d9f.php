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
.mybutton
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

    // line 92
    public function block_javascripts($context, array $blocks = array())
    {
        // line 93
        echo "<script src=";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/ace.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/theme-textmate.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("src/mode-c_cpp.js"), "html", null, true);
        echo " type=\"text/javascript\" charset=\"utf-8\"></script>
<script type=\"text/javascript\">
function getExample(filename){
\t// alert('editting file');
\t\$.get(filename, function(data)
\t{
\t\t// \$('.result').html(data);
\t\teditor.getSession().setValue(data);
\t\t// alert('Load was performed.');
\t});
}
</script>
<script type=\"text/javascript\">


function throwMud()
{
\tdirty=true;
\t\$(\"#compile_text\").html(\" Save & Build\");
\t\$(\"#revert\").removeClass(\"disabled\").off('click').click(function()
\t{
\t    revert();
\t});
\t\$(\"#save\").removeClass(\"disabled\").off('click').click(function()
\t{
\t\tsave();
\t})
\tdisableLink(\$(\".download_link\"));
}
function cleanUp()
{
\tdirty= false;
\t\$(\"#compile_text\").html(\" Build\");
\tenableLink(\$(\".link_ino\"));
\tdisableLink(\$(\".link_hex\"));
\t\$(\"#revert\").addClass(\"disabled\").off('click');
\t\$(\"#save\").addClass(\"disabled\").off('click');
}

function motherInLaw()
{
\tif(dirty)
\t{
\t\tsave_and_build();
\t}
\telse
\t{
\t\tbuild();
\t}\t
}

function setProgress(newprogress)
{
\t\$(\"#progress\").show('fast');
\t\$(\"#progress_val\").width(newprogress+'%');
\t\$(\"#operation_output\").hide('fast');
}

function clearProgress(output)
{
\t\$(\"#progress\").hide('fast');
\t\$(\"#progress_val\").width('0%');\t
\t\$(\"#operation_output\").html(output).show('fast');
}

function save()
{
\tsetProgress(90);
\t\$.post(\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_save"), "html", null, true);
        echo "\", {data: editor.getSession().getValue(), project_name:\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "project_name"), "html", null, true);
        echo "\"}, function(data)
\t{
\t\t\$(\"#save\").addClass(\"btn-success\");
\t\t\$(\"#save_icon\").addClass(\"icon-white\");
\t\tclearProgress(\"Saved successfuly.\");
\t\tcleanUp();
\t\twindow.setTimeout(function () {
\t\t    \$(\"#save\").removeClass(\"btn-success\");
\t\t\t\$(\"#save_icon\").removeClass(\"icon-white\");
\t\t}, 500);
\t\t// alert(\"Data received: \" + data);
\t});\t
}

function revert()
{
\tsetProgress(90);
\t\$.get(\"";
        // line 180
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_getdata", array("project_name" => $this->getContext($context, "project_name"))), "html", null, true);
        echo "\", function(data)
\t{
\t\teditor.getSession().setValue(data);
\t\t\$(\"#revert\").addClass(\"btn-success\");
\t\t\$(\"#revert_icon\").addClass(\"icon-white\");
\t\tclearProgress(\"Reverted successfuly.\");
\t\tcleanUp();
\t\twindow.setTimeout(function () {
\t\t    \$(\"#revert\").removeClass(\"btn-success\");
\t\t\t\$(\"#revert_icon\").removeClass(\"icon-white\");
\t\t}, 500);
\t\t// alert(\"Data received: \" + data);
\t});\t
}

function build()
{
\tsetProgress(90);
\t\$.post(\"";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_compile"), "html", null, true);
        echo "\", { project_name:\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "project_name"), "html", null, true);
        echo "\"}, function(data)
\t{
\t\tvar obj = jQuery.parseJSON(data);
\t\tif(obj.success == 0)
\t\t{
\t\t\t\$(\"#compile_output\").css('color', 'red');
\t\t\tfor (var i=0; i<obj.lines.length; i++)
\t\t\t{
\t\t\t\t\$(\".ace_gutter-cell\").filter(function(index) {
\t\t\t\t  return \$(this).html() == obj.lines[i];
\t\t\t\t}).css(\"text-decoration\",\"underline\").css(\"color\",\"red\");
\t\t\t}
\t\t\t 
\t\t\t\$(\"#editor\").css(\"bottom\",\"150px\");
\t\t\t\$(\"#compile_output\").css(\"bottom\",\"0px\");
\t\t\t\$(\"#compile_output\").css(\"height\",\"120px\");
\t\t\t\$(\"#compile_output\").addClass(\"well\");
\t\t\t\$(\"#compile\").addClass(\"btn-warning\");
\t\t\t\$(\"#compile_icon\").addClass(\"icon-remove\");
\t\t\t
\t\t\t
\t\t\t\$(\"#compile_output\").html(obj.text);
\t\t\tclearProgress(\"Compilation failed.\")
\t\t}
\t\telse
\t\t{
\t\t\t\$(\"#compile_output\").css('color', '');
\t\t\t\$(\".ace_gutter-cell\").css(\"text-decoration\", \"\").css(\"color\",\"\");
\t\t\t\$(\"#editor\").css(\"bottom\",\"\");
\t\t\t\$(\"#compile_output\").css(\"bottom\",\"\");
\t\t\t\$(\"#compile_output\").css(\"height\",\"\");
\t\t\t\$(\"#compile_output\").removeClass(\"well\");
\t\t\t\$(\"#compile\").addClass(\"btn-success\");
\t\t\t\$(\"#compile_icon\").addClass(\"icon-ok\");

\t\t\tclearProgress(obj.text)
\t\t\t\$(\"#compile_output\").html(\"\");
\t\t\tenableLink(\$(\".link_hex\"));
\t\t}
\t\t\$(\"#compile_icon\").removeClass(\"icon-check\").addClass(\"icon-white\");

\t\twindow.setTimeout(function () {
\t\t    \$(\"#compile\").removeClass(\"btn-success\").removeClass(\"btn-warning\");
\t\t\t\t\$(\"#compile_icon\").removeClass(\"icon-white\").removeClass(\"icon-remove\").removeClass(\"icon-ok\").addClass(\"icon-check\");
\t\t}, 500);
\t\t// alert(\"Data received: \" + data);
\t});\t
}

function save_and_build()
{
\tsave();
\t\$(document).ajaxStop(function()
\t{
\t\tbuild();
\t\t\$(this).unbind('ajaxStop');
\t});
}

function disableLink(link)
{
\tlink.css(\"text-decoration\",\"line-through\").click(function(e)
\t{
\t    e.preventDefault();
\t});
}
function enableLink(link)
{
\tlink.css(\"text-decoration\",\"\").off('click');
}
</script>

<script type=\"text/javascript\">
    function scan(){
    \$('#scanning').show('slow');
   \t\$('#noscanning').hide('slow');
    getFire();
    }
    function connect(){
    //alert('called connect ');
    var applet = document.getElementById('myapplet');
    var portslist= document.getElementById('ports');
    var rateslist= document.getElementById('baudrates');
    var port= portslist.options[portslist.selectedIndex].value;
    var rate= rateslist.options[rateslist.selectedIndex].value;
    //alert(\"overrideConnect('\"+portslist.selectedIndex+\"','\"+rateslist.selectedIndex+\"')\");

    applet.overrideConnect(portslist.selectedIndex,rateslist.selectedIndex);
    }
    function getFire(){
    var applet = document.getElementById('myapplet');
    var portslist= document.getElementById('ports');
    var rateslist= document.getElementById('baudrates');
    portsAvail=applet.getFire2().split(\",\");
    for (var i =0 ;i< portsAvail.length ; i++){
    portslist.options[i]=new Option(portsAvail[i],portsAvail[i],true,true);
    }
    ratesAvail=applet.getFireRates().split(\",\");
    for (var i =0 ;i< ratesAvail.length ; i++){
    //rateslist.options[i]=new Option(ratesAvail[i],ratesAvail[i],true,true);
    }
    }
</script>
";
    }

    // line 302
    public function block_body($context, array $blocks = array())
    {
        // line 303
        echo "<!-- <div class=\"navbar navbar-fixed-bottom\">
\t<div class=\"navbar-inner\">
\t    <div class=\"container-fluid\">
\t\t<ul class=\"nav\">\t\t
          <li id=\"homepage\"><a href=\"";
        // line 307
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
\t\t<button id = \"revert\" class=\"btn mybutton disabled\"><i id=\"revert_icon\" class=\"icon-arrow-left\"></i> Revert</span></button>
\t    <button id = \"save\" class=\"btn mybutton disabled\" /><i id=\"save_icon\" class=\"icon-download\"></i> Save Changes</button>
\t\t<button id = \"compile\" class=\"btn mybutton\"><i id=\"compile_icon\" class=\"icon-check\"></i><span id=\"compile_text\"> Build</span></button>
\t\t    <div id=\"noscanning\">
\t\t        <button onclick='scan()' class=\"btn mybutton\">Search for Arduino...</button>
\t\t    </div>
\t\t    <div id=\"scanning\">
\t\t        <button onclick='connect()' class=\"btn mybutton\">Connect</button>
\t\t\t\t<select id=\"ports\" class=\"span12\">
\t\t\t\t\t<option>dev</option>
\t\t\t\t\t<option>tty</option>
\t\t\t\t\t<option>36800</option>
\t\t\t\t\t<option>57600</option>
\t\t\t\t\t<option>115200</option>
\t\t\t\t</select><button id = \"reload\" class=\"btn mybutton\" onclick=\"getFire()\"><i id=\"reload_icon\" class=\"icon-repeat\"></i></button>
\t\t\t\t<select id=\"baudrates\" class=\"span12\">
\t\t            <option>110</option>
\t\t            <option>300</option>
\t\t            <option>600</option>
\t\t            <option>1200</option>
\t\t            <option>4800</option>
\t\t            <option selected=\"true\">9600</option>
\t\t            <option>14400</option>
\t\t            <option>19200</option>
\t\t            <option>38400</option>
\t\t            <option>115200</option>
\t\t            <option>128000</option>
\t\t            <option>256000</option>
\t\t\t\t</select>
\t    </div>
\t\t<div id=\"saves\" class=\"well\">
\t\t\t<i class=\"icon-file\"></i>Download:<br />
\t\t\t<a href=\"";
        // line 349
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_download", array("project_name" => $this->getContext($context, "project_name"))), "html", null, true);
        echo "\" class=\"download_link link_ino\">Download .ino</a>
\t\t\t<a href=\"";
        // line 350
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
        // line 367
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
\teditor.commands.addCommand({
\t    name: 'saveFile',
\t    bindKey: {
\t        win: 'Ctrl-S',
\t        mac: 'Command-S',
\t        sender: 'editor|cli'
\t    },
\t    exec: function(env, args, request) {
\t        save();
\t    }
\t});
\t\t
\teditor.commands.addCommand({
\t    name: 'buildFile',
\t    bindKey: {
\t        win: 'Ctrl-R',
\t        mac: 'Command-R',
\t        sender: 'editor|cli'
\t    },
\t    exec: function(env, args, request) {
\t        motherInLaw();
\t    }
\t});
\t
\teditor.commands.addCommand({
\t    name: 'uploadFile',
\t    bindKey: {
\t        win: 'Ctrl-U',
\t        mac: 'Command-U',
\t        sender: 'editor|cli'
\t    },
\t    exec: function(env, args, request) {
\t        alert(\"Y U NO Upload?\");
\t    }
\t});
\t
\teditor.commands.addCommand({
\t    name: 'CheckWord',
\t    bindKey: {
\t        win: 'Ctrl-Space',
\t        mac: 'Ctrl-Space',
\t        sender: 'editor|cli'
\t    },
\t    exec: function(env, args, request) {
\t\t\tvar selection = editor.getSession().doc.getTextRange(editor.getSelectionRange());
\t\t\tif (selection == \"\")
\t\t\t{
\t\t\t\tvar row = editor.getSession().getSelection().getCursor().row;
\t\t\t\tvar column = editor.getSession().getSelection().getCursor().column
\t\t\t\tvar string = editor.getSession().getLine(editor.getSession().getSelection().getCursor().row);
\t\t\t\tvar first_half = string.substring(0,column).match(/\\w+\$/);
\t\t\t\tvar second_half = string.substring(column, string.length).match(/^\\w+/);
\t\t\t\tif (first_half == null) first_half = \"\";
\t\t\t\tif (second_half == null) second_half = \"\";
\t\t\t\tselection = first_half + second_half;
\t\t\t}
\t\t\twindow.open('http://www.google.com/search?q='+selection+'+inurl:arduino.cc/en/Reference&btnI');
\t    }
\t});
\t
\teditor.commands.addCommand({
\t    name: 'MyComments',
\t    bindKey: {
\t        win: 'Ctrl-/',
\t        mac: 'Command-/',
\t        sender: 'editor|cli'
\t    },
\t    exec: function(env, args, request)
\t\t{
\t\t\teditor.toggleCommentLines();
\t    }
\t});
\t
};


\$(document).ready(function()
{\t
\t\$(\"#line_count\").html(editor.getSession().getValue().split(\"\\n\").length);
\tdisableLink(\$(\".link_hex\"));
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
});
</script>
\t

";
    }

    // line 498
    public function block_examples($context, array $blocks = array())
    {
        // line 499
        echo "<ul class=\"nav\">
  <li class=\"dropdown\">
    <a href=\"javascript:void(0)\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Examples<b class=\"caret\"></b></a>
    <ul class=\"dropdown-menu\">
\t\t\t";
        // line 503
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "examples"));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 504
            echo "\t\t    <li class=\"dropdown\">
\t\t\t<a href=\"javascript:void(0)\">";
            // line 505
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "section"), 0, array(), "array"), "html", null, true);
            echo "</a>
\t\t\t<ul class=\"dropdown-menu\">
\t    \t";
            // line 507
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "section"), 1, array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 508
                echo "\t    \t    <li onclick=\"getExample('";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_fetchexample", array("category" => $this->getAttribute($this->getContext($context, "section"), 0, array(), "array"), "name" => $this->getContext($context, "file"))), "html", null, true);
                echo "')\"><a href=\"javascript:void(0)\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "file"), "html", null, true);
                echo "</a></li>
\t    \t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 510
            echo "\t\t\t</ul>
\t\t\t</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 513
        echo "\t
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
