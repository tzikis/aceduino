<?php

/* AceEditorBundle:Default:index.html.twig */
class __TwigTemplate_87698ff1523de09d043a0c908ef82253 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
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
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"container\">
\t<br />
\t<div class=\"container-fluid\">
\t  <div class=\"row-fluid\">        \t
\t    <div class=\"span12\">
        ";
        // line 8
        $this->env->loadTemplate("AceEditorBundle:Default:hero.html.twig")->display($context);
        // line 9
        echo "\t    </div><!--/span-->
\t
\t  </div><!--/row-->
\t  <hr>

\t  <footer>
\t    <p>&copy; clouduino 2012</p>
\t  </footer>

\t</div><!--/.fluid-container-->\t
</div>
";
    }

    public function getTemplateName()
    {
        return "AceEditorBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
