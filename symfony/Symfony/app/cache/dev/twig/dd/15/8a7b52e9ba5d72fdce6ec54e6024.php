<?php

/* AceEditorBundle:Default:list.html.twig */
class __TwigTemplate_dd158a7b52e9ba5d72fdce6ec54e6024 extends Twig_Template
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
        echo "<p>Username: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
        echo "</p>
Hello ";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!<br />
";
        // line 5
        if ($this->getContext($context, "files")) {
            // line 6
            echo "Please select one of your projects from the list:<br />
<ul id=\"navigation\">
    ";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "files"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 9
                echo "        <li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_editor", array("project_name" => $this->getAttribute($this->getContext($context, "file"), "Name", array(), "method"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "file"), "getName", array(), "method"), "html", null, true);
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 11
            echo "</ul>
";
        }
        // line 13
        echo "<form method='post' action='";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_create"), "html", null, true);
        echo "'>
\t<input type='text' name='project_name' value='new'/>
\t<input type='submit' value='Add New' />
</form>
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
