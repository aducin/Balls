<?php

/* /ballsTemplate.twig.html */
class __TwigTemplate_c25a311fe91f35c15d7ca4a1ea38dbaa767f425e16735f4eacf0939c1231fd62 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("baseTemplate.twig.html", "/ballsTemplate.twig.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "baseTemplate.twig.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "\t<h1 class=\"finish1\">Welcome to the World of Balls!</h1>
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "\t<fieldset>
\t";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["basketsContent"]) ? $context["basketsContent"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["singleContent"]) {
            // line 10
            echo "\t\t<p>";
            echo twig_escape_filter($this->env, $context["singleContent"], "html", null, true);
            echo "</p>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['singleContent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "\t</fieldset>
\t<fieldset>
\t\t<p>User`s Basket consists of the folowing Numbers: ";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["userBasketContent"]) ? $context["userBasketContent"] : null), "html", null, true);
        echo "</p>
\t</fieldset>
";
    }

    public function getTemplateName()
    {
        return "/ballsTemplate.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 14,  56 => 12,  47 => 10,  43 => 9,  40 => 8,  37 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
