<?php

/* AceEditorBundle:Default:sidebar.html.twig */
class __TwigTemplate_96f47e4b98c75dc0b8ba28a141d215ab extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"span3\">
  <div class=\"well sidebar-nav\">
    <ul class=\"nav nav-list\">
\t\t<li class=\"nav-header\">New Project</li>
\t\t<li>
\t\t<form class=\"form-search\" method='post' action='";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_create"), "html", null, true);
        echo "'>
\t\t\t<input type=\"text\" name='project_name' class=\"input-medium search-query\">
\t\t\t<button type=\"submit\" class=\"btn\">Create new project</button>
\t\t</form>
\t\t</li>
      <li class=\"nav-header\">Projects</li>
\t   \t";
        // line 12
        if ($this->getContext($context, "files")) {
            // line 13
            echo "\t\t    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "files"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 14
                echo "\t\t        <li>
\t\t\t\t\t<a href=\"";
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_editor", array("project_name" => $this->getAttribute($this->getContext($context, "file"), "Name", array(), "method"))), "html", null, true);
                echo "\">
\t\t\t\t\t\t";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "file"), "getName", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 20
            echo "\t\t";
        }
        echo "\t
      <!-- <li class=\"active\"><a href=\"#\">Link</a></li> -->
\t\t<li class=\"nav-header\">Links</li>
\t\t<li><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("AceEditorBundle_options"), "html", null, true);
        echo "\"><i class=\"icon-cog\"></i>Options</a></li>
\t</ul>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "AceEditorBundle:Default:sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
