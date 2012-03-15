<?php

/* AceEditorBundle:Default:list.html.twig */
class __TwigTemplate_dd158a7b52e9ba5d72fdce6ec54e6024 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'alert' => array($this, 'block_alert'),
            'mainspan' => array($this, 'block_mainspan'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_alert($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"alert alert-info\">
\t<h1 id=\"\">Hello ";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!<br /></h1>
</div>
";
    }

    // line 8
    public function block_mainspan($context, array $blocks = array())
    {
        // line 9
        echo "\t";
        $this->env->loadTemplate("AceEditorBundle:Default:hero.html.twig")->display($context);
    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        // line 13
        echo "<script type=\"text/javascript\" charset=\"utf-8\">
\$(document).ready(function()
{
\t\$(\"#homepage\").addClass(\"active\");
});
</script>

";
    }

    public function getTemplateName()
    {
        return "AceEditorBundle:Default:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
