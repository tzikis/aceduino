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
        echo "<div class=\"hero-unit\">
  <h1>Hello, world!</h1>
  <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
  <p><a class=\"btn btn-primary btn-large\">Learn more &raquo;</a></p>
</div>
<div class=\"row-fluid\">
  <div class=\"span4\">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
  </div><!--/span-->
  <div class=\"span4\">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
  </div><!--/span-->
  <div class=\"span4\">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
  </div><!--/span-->
</div><!--/row-->
<div class=\"row-fluid\">
  <div class=\"span4\">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
  </div><!--/span-->
  <div class=\"span4\">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
  </div><!--/span-->
  <div class=\"span4\">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
  </div><!--/span-->
</div><!--/row-->

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
