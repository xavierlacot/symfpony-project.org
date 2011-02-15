<?php

/* WebProfilerBundle:Collector:memory.html.twig */
class __TwigTemplate_50cd3159ec5e9e490094a1519660aa3a extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");
        }

        return $this->parent;
    }

    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        // line 4
        echo "<img style=\"margin: 0 5px 0 10px; vertical-align: middle; height: 24px\" width=\"24\" height=\"24\" alt=\"Memory Usage\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAVZJREFUeNrsl82qRVAUx7mdB5AkZmbKxMjEyHkMZXDuk9zOkyjJ/D7Bva9gQhQRJUkewNdl19bpDnyc42wTq7SyWNvP+u+VBe/7HjvSPrCD7QS4zF3Ecfzn4fS6ce0pd9hn16cALMtSXni5Vbn4XBcMFcBM0wQ3aJr2C+NDbE01YN7sMy5Lq3RdB7xhGMr/2Nv3wGht2wL/OdhD+LaUp+v6vgCqqn6NnmEYe83CMG83AEVRuNE7joMWoGka4F3X/d6iLczbDSDLMhHGaJq2kQPIsszBmOd56AF83z9WgjzPgQQURdmHAEiSBCQIggAtQF3XwIdhuEkCmLdbBYqimLqAJEn0m1AUxakLoihCDxDH8bFdUJYlkIAgiGO6QBAEIEGSJGgB4EclTdNNEuz+NayqStwCwLLsvgA8z3PvqMDiWD6MX/dxBHvyuL80lJ5/RicACvsTYABfiPlU6mFY2gAAAABJRU5ErkJggg==\" />
";
        // line 5
        echo twig_escape_filter($this->env, sprintf("%.0f", ($this->getAttribute($this->getContext($context, 'collector', '5'), "memory", array(), "any", false, 5) / 1024)), "html");
        echo " KB
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:memory.html.twig";
    }
}
