<?php

/* AceSecurityBundle:Security:login.html.twig */
class __TwigTemplate_d4786e9005a312d46d5e87d002e6ec5d extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        if ($this->getContext($context, "error")) {
            // line 3
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "error"), "message"), "html", null, true);
            echo "</div>
";
        }
        // line 5
        echo "
<form action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("login_check"), "html", null, true);
        echo "\" method=\"post\">
    <label for=\"username\">Username:</label>
    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" />

    <label for=\"password\">Password:</label>
    <input type=\"password\" id=\"password\" name=\"_password\" />

    ";
        // line 17
        echo "
    <input type=\"submit\" name=\"login\" />
</form>
";
    }

    public function getTemplateName()
    {
        return "AceSecurityBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
