<?php

/* baseTemplate.twig.html */
class __TwigTemplate_48819e2abd2d5e3ae6ecd9e01a774ee133ef5ce71310106f88c73768c92aa47d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'headTitle' => array($this, 'block_headTitle'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pl\">
<head>
\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t";
        // line 5
        $this->displayBlock('headTitle', $context, $blocks);
        // line 7
        echo "\t
\t<link rel=\"stylesheet\" href=\"/Balls/Assets/styles.css\" type=\"text/css\" />
\t<script src=\"/Balls/Assets/jquery.js\" ></script>
\t<script src=\"/Balls/Assets/jscript.js\"></script>
</head>
<body>
\t";
        // line 13
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "</body>
";
    }

    // line 5
    public function block_headTitle($context, array $blocks = array())
    {
        // line 6
        echo "\t";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "\t";
    }

    public function getTemplateName()
    {
        return "baseTemplate.twig.html";
    }

    public function getDebugInfo()
    {
        return array (  54 => 14,  51 => 13,  47 => 6,  44 => 5,  39 => 15,  37 => 13,  29 => 7,  27 => 5,  21 => 1,);
    }
}
