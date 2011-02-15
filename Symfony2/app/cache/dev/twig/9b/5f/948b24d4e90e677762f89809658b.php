<?php

/* WebProfilerBundle:Collector:logger.html.twig */
class __TwigTemplate_9b5f948b24d4e90e677762f89809658b extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
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
        echo "<img style=\"margin: 0 5px 0 10px; vertical-align: middle; height: 24px\" width=\"24\" height=\"24\" alt=\"Logs\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAApBJREFUeNrsl19oUlEcx+91dp24hgMXhmvYZokaC5Uon+ollk/14JMIw8c9zpfwJeglqMfoVXQw9KknAyNFfagRyNaiB7Mw3VDxz9iG/xH/9D10HSJxJ9oSyh98OOd47u+c7/2ec/AeutPpUOMMHjXm4HN10jTdrc6Ax+AOOATvwWe2PDO4XKY5O38JUIjF4uc2m023vLwsa7Va+XQ6Hdne3m56vV4BK+QD2HO73dn+Mcxm80gCHqhUKvvGxsYNhmEyHo/nVbvdvryysiJUKpW3hEKhtlwuf4pEIgfBYJBJJpMVIoQI2traIiVlsViGF2A0GqMmk+lqvV5/HQqFnAsLC/cFAsFSLpc7TKVSBfzekEqlfIPBcAUu3YZgXjab/er3+8vhcHgKQ/wgYjDH26EEbG5udjBR0eVyxWZnZ79ptdoThULRgohOtVoVgZlisdiOx+P7tVqtgZSGTqebxjMGPHMN7uz7fL5LQDWUAKfTedqZSCSOo9HoUSwWK2KyI41GE1Wr1VWJRMI0m80LlUrlYqlUYrA/8ohjtBvr6+tkf7yxWq30UKcAG+60vri4OEdYXV2l8OaN3d3d64FA4LhQKNTn5+e/6PX6A7lcPiWTyaYzmcxN7BUa+c9GOoa9AnoD9jJk3QmkDVeWdnZ28rC6bLfbLXDkBVf+yAL6A2suIbA538nb/1UB/QEB1L8hAGs5lIDuxIPkTxyYODBZgokD5yKgmzf5L/gTAqwo7oJHQHweAjgvJg6Hw4XBrGAOaMFTsEcm4ILMLRKJ0mzbxXn3OOtesLa29rsuObgHHrJlrzs0jt8TPp//DvWP+LDl/CznD2pnXySBi4XqE0PxeLyXyDsZZLno//5yOnYBPwUYACFn5hv7UNkXAAAAAElFTkSuQmCC\" />
<span>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'collector', '5'), "counterrors", array(), "any", false, 5), "html");
        echo "</span>
";
    }

    // line 8
    public function block_menu($context, array $blocks = array())
    {
        // line 9
        echo "<span class=\"count\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'collector', '9'), "counterrors", array(), "any", false, 9), "html");
        echo "</span>
<img style=\"margin: 0 5px 0 0; vertical-align: middle; width: 32px\" width=\"32\" height=\"32\" alt=\"Logs\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("bundles/webprofiler/images/logger.png"), "html");
        echo "\" />
Logs
";
    }

    // line 14
    public function block_panel($context, array $blocks = array())
    {
        // line 15
        echo "    <h2>Logs</h2>

    ";
        // line 17
        if ($this->getAttribute($this->getContext($context, 'collector', '17'), "logs", array(), "any", false, 17)) {
            // line 18
            echo "        <ul class=\"alt\">
            ";
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'collector', '19'), "logs", array(), "any", false, 19));
            foreach ($context['_seq'] as $context['i'] => $context['log']) {
                // line 20
                echo "                <li class=\"";
                echo ((twig_test_odd($this->getContext($context, 'i', '20'))) ? ("odd") : ("even"));
                if (("ERR" == $this->getAttribute($this->getContext($context, 'log', '20'), "priorityName", array(), "any", false, 20))) {
                    echo " error";
                }
                echo "\">
                    ";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'log', '21'), "priorityName", array(), "any", false, 21), "html");
                echo "
                    ";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'log', '22'), "message", array(), "any", false, 22), "html");
                echo "
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 25
            echo "        </ul>
    ";
        } else {
            // line 27
            echo "        <em>No logs available.</em>
    ";
        }
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:logger.html.twig";
    }
}
