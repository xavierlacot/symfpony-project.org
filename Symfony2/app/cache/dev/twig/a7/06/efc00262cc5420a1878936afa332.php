<?php

/* WebProfilerBundle:Profiler:bag.html.twig */
class __TwigTemplate_a706efc00262cc5420a1878936afa332 extends Twig_Template
{
    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<table>
    <tr>
        <th>Key</th>
        <th>Value</th>
    </tr>
    ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'bag', '6'), "keys", array(), "any", false, 6));
        foreach ($context['_seq'] as $context['_key'] => $context['key']) {
            // line 7
            echo "        <tr>
            <th>";
            // line 8
            echo twig_escape_filter($this->env, $this->getContext($context, 'key', '8'), "html");
            echo "</th>
            <td>";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('templating')->dump($this->getAttribute($this->getContext($context, 'bag', '9'), "get", array($this->getContext($context, 'key', '9'), ), "method", false, 9)), "html");
            echo "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:bag.html.twig";
    }
}
