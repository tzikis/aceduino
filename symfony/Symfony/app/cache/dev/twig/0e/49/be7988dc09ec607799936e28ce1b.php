<?php

/* AceEditorBundle:Default:options.html.twig */
class __TwigTemplate_0e49be7988dc09ec607799936e28ce1b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "Account Options";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h2>User Account Options</h2>
<hr />
Change your details, then click 'save' to save your changes.<br /><br />
<form>
<table>
<tr>
\t<td align=\"right\"><strong>Username:</strong></td>
\t<td>&nbsp";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "username"), "html", null, true);
        echo "</td>
</tr>
<tr>
\t<td align=\"right\"><strong>Firstname:</strong></td>
\t<td><input type=\"text\" name=\"firstname\" id=\"fname\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getFirstname", array(), "method"), "html", null, true);
        echo "\" /></td>
</tr>
<tr>
\t<td align=\"right\"><strong>Lastname:</strong></td>
\t<td><input type=\"text\" name=\"lastname\" id=\"lname\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getLastname", array(), "method"), "html", null, true);
        echo "\" /></td>
</tr>
<tr>
\t<td align=\"right\"><strong>E-mail:</strong></td>
\t<td><input type=\"text\" name=\"email\" id=\"email\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getEmail", array(), "method"), "html", null, true);
        echo "\" /></td>
</tr>
<tr>
\t<td align=\"right\"><strong>Twitter:</strong></td>
\t<td><input type=\"text\" name=\"tweet\" id=\"tweet\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "getTwitter", array(), "method"), "html", null, true);
        echo "\" /></td>
</tr>
<tr>
\t<td align=\"right\"><strong>Old Password:</strong></td>
\t<td><input type=\"password\" name=\"old_pass\" id=\"old_pass\" value=\"\" /></td>
</tr>
<tr>
\t<td align=\"right\"><strong>New Password:</strong></td>
\t<td><input type=\"password\" name=\"new_pass\" id=\"new_pass\" value=\"\" /></td>
</tr>
<tr>
\t<td align=\"right\"><strong>Confirm New Password:</strong></td>
\t<td><input type=\"password\" name=\"confirm_new_pass\" id=\"confirm_new_pass\" value=\"\" /></td>
</tr>
</table>
<hr />
<input type=\"button\" id=\"modify\" value=\"Save Changes\" />
</form>
<form action = \"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_homepage"), "html", null, true);
        echo "\"><input type=\"submit\" id=\"cancel\" value=\"Cancel\" /></form>

<script>
\$(document).ready(function()
\t{\t
\t\t\$(\"#modify\").click(function() 
\t\t{
\t\t\tvar str =  \$(\"form\").serialize();
\t\t\tvar items = \$(\"#results\").text(str);
\t\t\t\$.post(\"";
        // line 54
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
