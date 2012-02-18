<?php

/* AceEditorBundle:Default:options.html.twig */
class __TwigTemplate_0e49be7988dc09ec607799936e28ce1b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'mainspan' => array($this, 'block_mainspan'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AceEditorBundle:Default:container.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Account Options";
    }

    // line 3
    public function block_mainspan($context, array $blocks = array())
    {
        // line 4
        echo "<script src=";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("validation/jquery.validate.js"), "html", null, true);
        echo " type=\"text/javascript\"></script>
<!--<script src=";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("validation/jquery.validate.functions.js"), "html", null, true);
        echo " type=\"text/javascript\"></script>-->
<script type=\"text/javascript\">
            /* <![CDATA[ */
            Query(function(){
                jQuery(\"#email\").validate({
                    expression: \"if (VAL.match(/^[^\\\\W][a-zA-Z0-9\\\\_\\\\-\\\\.]+([a-zA-Z0-9\\\\_\\\\-\\\\.]+)*\\\\@[a-zA-Z0-9_]+(\\\\.[a-zA-Z0-9_]+)*\\\\.[a-zA-Z]{2,4}\$/)) return true; else return false;\",
                    message: \"Please enter a valid Email address\"
                });
                jQuery(\"#new_pass\").validate({
                    expression: \"if (VAL.length > 5 && VAL) return true; else return false;\",
                    message: \"Password must be at least 6 characters\"
                });
                jQuery(\"#confirm_new_pass\").validate({
                    expression: \"if ((VAL == jQuery('#ValidPassword').val()) && VAL) return true; else return false;\",
                    message: \"Passwords do not match!\"
                });
\t\t\t\t//jQuery('form#form').validated(function(){
\t\t\t\t//\talert(\"Use this call to make AJAX submissions.\");
\t\t\t\t//});
            });
            /* ]]> */
        </script>

<h2>User Account Options</h2>
<hr />
<script type=\"text/javascript\" charset=\"utf-8\">
function myfunc()
{
\tif(\$(\"#new_pass\").val() == \$(\"#confirm_new_pass\").val())
\t{
\t\tif(\$(\"#new_pass\").val() == \"\")
\t\t{
\t\t\t\$(\".passwords\").removeClass(\"error\").removeClass(\"success\");
\t\t\t\$(\".password_signs\").removeClass(\"icon-ok\").removeClass(\"icon-remove\").addClass(\"icon-exclamation-sign\");\t\t\t\t\t\t
\t\t}
\t\telse
\t\t{
\t\t\t\$(\".passwords\").removeClass(\"error\").addClass(\"success\");
\t\t\t\$(\".password_signs\").removeClass(\"icon-exclamation-sign\").removeClass(\"icon-remove\").addClass(\"icon-ok\");\t\t\t
\t\t}
\t}
\telse
\t{
\t\t\$(\".passwords\").removeClass(\"success\").addClass(\"error\");\t\t\t
\t\t\$(\".password_signs\").removeClass(\"icon-exclamation-sign\").removeClass(\"icon-ok\").addClass(\"icon-remove\");\t\t\t
\t}
\t\$(\".password_signs\").removeClass(\"password_signs\").addClass(\"password_signs\");\t\t\t
};
</script>
Change your details, then click 'save' to save your changes.<br /><br />
<form name=\"form\" id=\"form\" action=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_homepage"), "html", null, true);
        echo "\">
<div class=\"row-fluid\">
\t<div class=\"span4\">
\t\t<div class=\"control-group\">
\t\t\t<label class=\"control-label\" for=\"uname\"><strong>Username</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">\t<i class=\"icon-user\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"text\" name=\"username\" id=\"uname\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getContext($context, "username"), "html", null, true);
        echo "\" disabled/>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"control-group\">
\t\t\t<label class=\"control-label\" for=\"fname\"><strong>Firstname</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">F</span>
\t\t\t\t\t<input class=\"input-large\" type=\"text\" name=\"firstname\" id=\"fname\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getFirstname", array(), "method"), "html", null, true);
        echo "\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"control-group\">
\t\t\t<label class=\"control-label\" for=\"lname\"><strong>Lastname</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">L</span>
\t\t\t\t\t<input class=\"input-large\" type=\"text\" name=\"lastname\" id=\"lname\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getLastname", array(), "method"), "html", null, true);
        echo "\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"control-group\">
\t\t\t<label class=\"control-label\" for=\"email\"><strong>E-mail</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">\t<i class=\"icon-envelope\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"text\" name=\"email\" id=\"email\" value=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getEmail", array(), "method"), "html", null, true);
        echo "\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"control-group\">
\t\t\t<label class=\"control-label\" for=\"tweet\"><strong>Twitter</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">@</span>
\t\t\t\t\t<input class=\"input-large\" type=\"text\" name=\"tweet\" id=\"tweet\" value=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getTwitter", array(), "method"), "html", null, true);
        echo "\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"span4\">
\t\t<div class=\"control-group\">
\t\t\t<label class=\"control-label\" for=\"old_pass\"><strong>Old Password</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">\t<i class=\"icon-exclamation-sign\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"password\" name=\"old_pass\" id=\"old_pass\" value=\"\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"passwords control-group\">
\t\t\t<label class=\"control-label\" for=\"new_pass\"><strong>New Password</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">\t<i class=\"icon-exclamation-sign password_signs\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"password\" name=\"new_pass\" id=\"new_pass\" value=\"\" onkeyup=\"myfunc()\"/>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"passwords control-group\">
\t\t\t<label class=\"control-label\" for=\"confirm_new_pass\"><strong>Confirm New Password</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\"><i class=\"icon-exclamation-sign password_signs\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"password\" name=\"confirm_new_pass\" id=\"confirm_new_pass\" value=\"\"  onkeyup=\"myfunc()\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<hr />
<input class=\"btn btn-primary\" type=\"button\" id=\"modify\" value=\"Save Changes\" />
<input class=\"btn\" type=\"submit\" id=\"cancel\" value=\"Cancel\" />
</form>

<script>
\$(document).ready(function()
\t{\t
\t\t\$(\"#modify\").click(function() 
\t\t{
\t\t\t//construct array name=>value from form fields
\t\t\tvar items = {};
\t\t\t\$.each(\$('#form').serializeArray(),
\t\t\tfunction(i, field)
\t\t\t{
    \t\t\titems[field.name] = field.value;
\t\t\t});

\t\t\t\$.post(\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_setoptions"), "html", null, true);
        echo "\", {data: items },
\t\t\tfunction(data)
\t\t\t{
\t\t\t\talert(\"Profile Updated: \" + data);
\t\t\t});
\t\t});
\t});
</script>

";
    }

    public function getTemplateName()
    {
        return "AceEditorBundle:Default:options.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
