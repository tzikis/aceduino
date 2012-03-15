<?php

/* AceEditorBundle:Default:container.html.twig */
class __TwigTemplate_f8cd3711e2590c19fa44340236f4d70a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'alert' => array($this, 'block_alert'),
            'mainspan' => array($this, 'block_mainspan'),
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

    // line 30
    public function block_alert($context, array $blocks = array())
    {
        // line 31
        echo "\t";
    }

    // line 38
    public function block_mainspan($context, array $blocks = array())
    {
        // line 39
        echo "\t\t
\t\t";
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "
<script>
\$(document).ready(function()
{\t
\t\$(\".new-repo\").click(function() 
\t{
\t\t\$('[name=project_name]').val(\$(\"#your-repos-filter\").val());
\t\t\$(\"#create\").submit();
\t});
});
</script>

<style type=\"text/css\" media=\"screen\">
.input-medium.search-query
{
\twidth: 85%;
\tmargin-right: 10px;\t
}
button.btn
{
\twidth:100%;
\tmargin-top: 5px;
}
</style>

<div class=\"container\">
\t<br />
\t";
        // line 30
        $this->displayBlock('alert', $context, $blocks);
        // line 32
        echo "
\t<div class=\"container-fluid\">
\t  <div class=\"row-fluid\">
\t    ";
        // line 35
        echo $this->env->getExtension('actions')->renderAction("AceEditorBundle:Default:sidebar", array(), array());
        // line 36
        echo "        \t
\t    <div class=\"span9\">
\t\t";
        // line 38
        $this->displayBlock('mainspan', $context, $blocks);
        // line 41
        echo "\t    </div><!--/span-->
\t
\t  </div><!--/row-->
\t  <hr>

\t  <footer>
\t\t";
        // line 47
        $this->env->loadTemplate("AceEditorBundle:Default:footer.html.twig")->display($context);
        // line 48
        echo "\t  </footer>

\t</div><!--/.fluid-container-->\t
</div>
";
    }

    public function getTemplateName()
    {
        return "AceEditorBundle:Default:container.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
