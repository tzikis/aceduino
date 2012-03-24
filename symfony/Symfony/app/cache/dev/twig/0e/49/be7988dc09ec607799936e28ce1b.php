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
<script type=\"text/javascript\" charset=\"utf-8\">
            /* <![CDATA[ */
            function validat()
            {
                /*jQuery(\"#email\").validate({
                    expression: \"if (VAL.match(/^[^\\\\W][a-zA-Z0-9\\\\_\\\\-\\\\.]+([a-zA-Z0-9\\\\_\\\\-\\\\.]+)*\\\\@[a-zA-Z0-9_]+(\\\\.[a-zA-Z0-9_]+)*\\\\.[a-zA-Z]{2,4}\$/)) return true; else return false;\",
                    message: \"Please enter a valid Email address\"
                });*/
                \$(\"#old_pass\").validate({
                    expression: \"if (VAL.length > 5 && VAL) return true; else return false;\",
                    message: \"Password must be at least 6 characters\"
                });
                /*jQuery(\"#confirm_new_pass\").validate({
                    expression: \"if ((VAL == jQuery('#ValidPassword').val()) && VAL) return true; else return false;\",
                    message: \"Passwords do not match!\"
                });*/
\t\t\t\t//jQuery('form#form').validated(function(){
\t\t\t\t//\talert(\"Use this call to make AJAX submissions.\");
\t\t\t\t//});
            };
            /* ]]> */
        </script>

<h2>User Account Options</h2>
<hr />
<script type=\"text/javascript\" charset=\"utf-8\">
//TODO: add check if passwords match when new_pass changes
function validinput(id)
{
\tif(id==\"new_pass\" || id==\"confirm_pass\")
\t{
\t\tif(id==\"new_pass\")
\t\t\tvar other=\"confirm_pass\";
\t\telse
\t\t\tvar other=\"new_pass\";
\t\t
\t\tif(\$(\"#\"+id).val() == \$(\"#\"+other).val())
\t\t{
\t\t\tvar len = \$(\"#\"+id).val().length;
\t\t\tif (len == 0)
\t\t\t\treturn 2; //zero length pass
\t\t\t\t
\t\t}
\t\telse if (len < 6 || len > 15)
\t\t\treturn 3; //out of range of min/max characters
\t\telse
\t\t{
\t\t\tvar regnum = /.*\\d/;
\t\t\tvar reglet = /.*[a-z]/;
\t\t\tvar regcaps = /.*[A-Z]/;
\t\t\tvar regpunc = /.*[@#\$%\\!\\^\\&\\*\\(\\)\\_\\+\\=\\~]/;
\t\t\tvar regexp = [regnum, reglet, regcaps, regpunc];
\t
\t\t\tvar sets = 0;
\t\t\tfor(var i=0 ; i < 4; i++)
\t\t\t{
\t\t\t\tif (regexp[i].test(\$(\"#\"+id).val()))
\t\t\t\t\tsets++;
\t\t\t}
\t\t\tif (sets < 3)
\t\t\t\treturn 4; //less than 3 charsets in pass
\t\t\telse
\t\t\t\treturn 1; //valid pass
\t\t}
\t}
\t/*
\telse if(id==\"confirm_pass\")
\t{
\t\tif (\$(\"#\"+id).val().length > 0)
\t\t{
\t\t\tif(\$(\"#new_pass\").val() == \$(\"#\"+id).val())
\t\t\t\treturn 5;
\t\t\telse
\t\t\t\treturn 6;\t\t\t
\t\t}
\t\telse if(\$(\"#new_pass\").val().length > 0)
\t\t\treturn 7;
\t\telse
\t\t\treturn 8;
\t}
\t*/
\telse if(id==\"old_pass\")
\t{
\t\t//TODO:Ajax post request for a match;
\t}
\t/*
\telse if(id==\"email\") //using type=\"email\" instead
\t{
\t\tif (\$(\"#\"+id).val().length != 0)
\t\t{
\t\t\tvar regmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,4}\$/;
\t\t\tif(regmail.test(\$(\"#\"+id).val()))
\t\t\t\treturn 9;
\t\t\telse
\t\t\t\treturn 10;
\t\t}
\t\telse
\t\t\treturn 9;
\t}
\t*/
\telse
\t{
\t\t//no valid id
\t}
\t
};

function validation(inputid)
{
\tswitch(validinput(inputid))
\t{
\tcase 1:
\t\t\$(\".newpassword\").removeClass(\"error\").addClass(\"success\");
\t\t\$(\".password_signs\").removeClass(\"icon-exclamation-sign\").removeClass(\"icon-remove\").addClass(\"icon-ok\");
\t\t\$(\".newpass-info\").html('');
\t\tbreak;
\tcase 2:
\t\t\$(\".passwords\").removeClass(\"error\").removeClass(\"success\");
\t\t\$(\".password_signs , .password_confirm\").removeClass(\"icon-ok\").removeClass(\"icon-remove\").addClass(\"icon-exclamation-sign\");\t\t\t
\t\t\$(\".newpass-info, .confirmpass-info\").html('');
\t\tbreak;
\tcase 3:
\t\t\$(\".passwords\").addClass(\"error\").removeClass(\"success\");
\t\t\$(\".password_signs, .password_confirm\").removeClass(\"icon-exclamation-sign\").removeClass(\"icon-ok\").addClass(\"icon-remove\");
\t\t\$(\".newpass-info\").html('<i>Passwords must be 6-15 characters long</i>');
\t\tbreak;
\tcase 4:
\t\t\$(\".passwords\").addClass(\"error\").removeClass(\"success\");
\t\t\$(\".password_signs, .password_confirm\").removeClass(\"icon-exclamation-sign\").removeClass(\"icon-ok\").addClass(\"icon-remove\");
\t\t\$(\".newpass-info\").html('<i>Password must contain characters from at least 3 of 4 characters sets([a..z][A..Z][0..9][~!@#\$%^&*()_+=])</i>');
\t\tbreak;
\tcase 5:
\t\t\$(\".passwords\").removeClass(\"error\").addClass(\"success\");
\t\t\$(\".password_confirm\").removeClass(\"icon-exclamation-sign\").removeClass(\"icon-remove\").addClass(\"icon-ok\");
\t\t\$(\".confirmpass-info\").html('');
\t\tbreak;
\tcase 6:
\t\t\$(\".confirmpassword\").addClass(\"error\").removeClass(\"success\");
\t\t\$(\".password_confirm\").removeClass(\"icon-exclamation-sign\").removeClass(\"icon-ok\").addClass(\"icon-remove\");
\t\t\$(\".confirmpass-info\").html('<i>Passwords do not match!</i>');
\t\tbreak;
\tcase 7:
\t\t\$(\".confirmpass-info\").html('');
\t\tbreak;
\tcase 8:
\t\t\$(\".confirmpassword\").removeClass(\"error\").removeClass(\"success\");
\t\t\$(\".password_confirm\").removeClass(\"icon-ok\").removeClass(\"icon-remove\").addClass(\"icon-exclamation-sign\");
\t\t\$(\".confirmpass-info\").html('');
\t\tbreak;
\tcase 9:
\t\t\$(\".mail\").removeClass(\"error\").addClass(\"success\");
\t\t\$(\".mail-info\").html('');
\t\tbreak;
\tcase 10:
\t\t\$(\".mail\").addClass(\"error\").removeClass(\"success\");
\t\t\$(\".mail-info\").html('<i>Please enter a valid email(aaa@bbb.ccc)</i>');
\t\tbreak;
\t}
\t\$(\".password_signs\").removeClass(\"password_signs\").addClass(\"password_signs\");
\t\$(\".password_confirm\").removeClass(\"password_confirm\").addClass(\"password_confirm\");
\t//\$(\".mail\").removeClass(\".mail\").addClass(\".mail\");
\t
\t/*if(\$(\"#\"inputid).val() !== \"\")
\t{
\t\tif (\$(\"#old_pass\").val().length < 6)
\t\t{
        \t\$(\".oldpass\").addClass(\"error\");
        \t\$(\".help-inline\").html('<i>Password must be at least 6 characters</i>');       \t
\t\t}
\t\telse
\t\t{
\t\t\tvar regnum = /.*\\d/;
\t\t\tvar reglet = /.*[a-z]/;
\t\t\tvar regcaps = /.*[A-Z]/;
\t\t\tvar regpunc = /.*[@#\$%\\!\\^\\&\\*\\(\\)\\_\\+\\=\\~]/;
\t\t\tvar regexp = [regnum, reglet, regcaps, regpunc];
\t\t\tsets = 0;
\t\t\tfor(var i=0 ; i < 4; i++)
\t\t\t{
\t\t\t\tif (regexp[i].test(\$(\"#old_pass\").val()))
\t\t\t\t\tsets = sets + 1;
\t\t\t}
\t\t\tif (sets < 3)
\t\t\t{
\t\t\t\t\$(\".oldpass\").addClass(\"error\");
\t\t\t\t\$(\".help-inline\").html('<i>Password must contain characters from at least 3 of 4 characters sets([a..z][A..Z][0..9][~!@#\$%^&*()_+=])</i>');
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\t\$(\".oldpass\").removeClass(\"error\");
\t\t\t\t\$(\".help-inline\").html('');
\t\t\t}
\t\t}
\t}
\telse
\t{
\t\t\$(\".oldpass\").removeClass(\"error\");
\t\t\$(\".help-inline\").html('');
\t}
*/\t
};

function myfunc()
{
\tif(\$(\"#new_pass\").val() == \$(\"#confirm_pass\").val())
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
        // line 232
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
        // line 240
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
        // line 249
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
        // line 258
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getLastname", array(), "method"), "html", null, true);
        echo "\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"mail control-group\">
\t\t\t<label class=\"control-label\" for=\"email\"><strong>E-mail</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">\t<i class=\"icon-envelope\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"email\" name=\"email\" id=\"email\" value=\"";
        // line 267
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getEmail", array(), "method"), "html", null, true);
        echo "\" required/> 
\t\t\t\t<!-- TODO: onchange, AJAX POST to check if mail already exists in the db  -->
\t\t\t\t\t<span class=\"help-inline mail-info\"></span>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"control-group\">
\t\t\t<label class=\"control-label\" for=\"tweet\"><strong>Twitter</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">@</span>
\t\t\t\t\t<input class=\"input-large\" type=\"text\" name=\"tweet\" id=\"tweet\" value=\"";
        // line 278
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getTwitter", array(), "method"), "html", null, true);
        echo "\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"span4\">
\t\t<div class=\"oldpass control-group\">
\t\t\t<label class=\"control-label\" for=\"old_pass\"><strong>Old Password</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">\t<i class=\"icon-exclamation-sign pass_valid\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"password\" name=\"old_pass\" id=\"old_pass\" value=\"\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"passwords control-group newpassword\">
\t\t\t<label class=\"control-label\" for=\"new_pass\"><strong>New Password</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\">\t<i class=\"icon-exclamation-sign password_signs\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"password\" name=\"new_pass\" id=\"new_pass\" value=\"\" onkeyup=\"validation(id)\"/>
\t\t\t\t\t<span class=\"help-inline newpass-info\"></span>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"passwords control-group confirmpassword\">
\t\t\t<label class=\"control-label\" for=\"confirm_pass\"><strong>Confirm New Password</strong></label>
\t\t\t<div class=\"controls\">
\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t<span class=\"add-on\"><i class=\"icon-exclamation-sign password_confirm\"></i></span>
\t\t\t\t\t<input class=\"input-large\" type=\"password\" name=\"confirm_pass\" id=\"confirm_pass\" value=\"\"  onkeyup=\"validation(id)\" />
\t\t\t\t\t<span class=\"help-inline confirmpass-info\"></span>
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
        // line 333
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_setoptions"), "html", null, true);
        echo "\", {data: items },
\t\t\tfunction(data)
\t\t\t{
\t\t\t\talert(\"Profile Updated: \" + data);
\t\t\t});
\t\t});
\t\t\$(\"#options\").addClass(\"active\");
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
