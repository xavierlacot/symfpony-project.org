<?php

/* WebProfilerBundle:Profiler:layout.html.twig */
class __TwigTemplate_761c25e24757820926cc798aee5245b7 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
            'body' => array($this, 'block_body'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:base.html.twig");
        }

        return $this->parent;
    }

    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 38
    public function block_panel($context, array $blocks = array())
    {
        echo "";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"header\">
        <h1>
            <img alt=\"\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("bundles/webprofiler/images/profiler.png"), "html");
        echo "\" />
            Symfony Profiler
        </h1>
        <div>
            <em>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'profiler', '10'), "url", array(), "any", false, 10), "html");
        echo "</em> by <em>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'profiler', '10'), "ip", array(), "any", false, 10), "html");
        echo "</em> at <em>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->getAttribute($this->getContext($context, 'profiler', '10'), "time", array(), "any", false, 10), "r"), "html");
        echo "</em>
        </div>
    </div>

    ";
        // line 14
        echo $this->env->getExtension('templating')->renderAction("WebProfilerBundle:Profiler:toolbar", array("token" => $this->getContext($context, 'token', '14'), "position" => "normal"), array());
        // line 15
        echo "
    <table>
        <tr><td class=\"menu\">
            ";
        // line 18
        if (twig_test_defined("templates", $context)) {
            // line 19
            echo "                <ul>
                    ";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'templates', '20'));
            foreach ($context['_seq'] as $context['name'] => $context['template']) {
                // line 21
                echo "                        ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'template', '21'), "renderBlock", array("menu", array("collector" => $this->getAttribute($this->getContext($context, 'profiler', '21'), "get", array($this->getContext($context, 'name', '21'), ), "method", false, 21)), ), "method", false, 21), "html");
                $context['menu'] = ob_get_clean();
                // line 22
                echo "                        ";
                if ($this->getContext($context, 'menu', '22')) {
                    // line 23
                    echo "                            <li
                                ";
                    // line 24
                    if (($this->getContext($context, 'name', '24') == $this->getContext($context, 'panel', '24'))) {
                        echo "class=\"selected\"";
                    }
                    // line 25
                    echo "                            >
                                <a href=\"";
                    // line 26
                    echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getPath("_profiler_panel", array("token" => $this->getContext($context, 'token', '26'), "panel" => $this->getContext($context, 'name', '26'))), "html");
                    echo "\">";
                    echo $this->getContext($context, 'menu', '26');
                    echo "</a>
                            </li>
                        ";
                }
                // line 29
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['template'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 30
            echo "                </ul>
            ";
        }
        // line 32
        echo "
            ";
        // line 33
        echo $this->env->getExtension('templating')->renderAction("WebProfilerBundle:Profiler:searchBar", array("token" => $this->getContext($context, 'token', '33')), array());
        // line 34
        echo "
            ";
        // line 35
        $template = "WebProfilerBundle:Profiler:admin.html.twig";
        if ($template instanceof Twig_Template) {
            $template->display(array("token" => $this->getContext($context, 'token', '35')));
        } else {
            echo $this->env->getExtension('templating')->getTemplating()->render($template, array("token" => $this->getContext($context, 'token', '35')));
        }
        // line 36
        echo "        </td><td class=\"main\">
            <div class=\"content\">
                ";
        // line 38
        $this->displayBlock('panel', $context, $blocks);
        // line 39
        echo "            </div>
        </td></tr>
    </table>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }
}
