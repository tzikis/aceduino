<?php

/* AceEditorBundle:Default:list.html.twig */
class __TwigTemplate_38c6176aab33580f46cb87614c61318d extends Twig_Template
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
        echo "Hello ";
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!<br />
";
        // line 4
        if ($this->getContext($context, "files")) {
            // line 5
            echo "Please select one of your projects from the list:<br />
<ul id=\"navigation\">
    ";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "files"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 8
                echo "        <li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_editor", array("filename" => $this->getAttribute($this->getContext($context, "file"), "getFilename", array(), "method"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "file"), "getName", array(), "method"), "html", null, true);
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        }
        // line 11
        echo "</ul>
<a href=''>Add New</a>
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
