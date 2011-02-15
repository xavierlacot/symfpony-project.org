<?php

/* WebProfilerBundle:Profiler:toolbar.html.twig */
class __TwigTemplate_90f0979cd592a07f34a16aacc3a3d544 extends Twig_Template
{
    public function display(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!-- START of Symfony2 Web Debug Toolbar -->
";
        // line 2
        if (("normal" != $this->getContext($context, 'position', '2'))) {
            // line 3
            echo "    <div style=\"clear: both; height: 40px;\"></div>
";
        }
        // line 5
        echo "<div
    class=\"sf-toolbarreset\"
    ";
        // line 7
        if (("normal" != $this->getContext($context, 'position', '7'))) {
            // line 8
            echo "        style=\"position: ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'position', '8'), "html");
            echo ";
        background: #cbcbcb;
        background-image: -moz-linear-gradient(-90deg, #e8e8e8, #cbcbcb);
        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e8e8e8), to(#cbcbcb));
        bottom: 0;
        left:0;
        z-index: 6000000;
        width: 100%;
        border-top: 1px solid #bbb;
        padding: 5px;
        margin: 0;
        font: 11px Verdana, Arial, sans-serif;
        color: #000;
    \"
    ";
        }
        // line 23
        echo ">
";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'templates', '24'));
        foreach ($context['_seq'] as $context['name'] => $context['template']) {
            // line 25
            echo "    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'template', '25'), "renderblock", array("toolbar", array("collector" => $this->getAttribute($this->getContext($context, 'profiler', '25'), "get", array($this->getContext($context, 'name', '25'), ), "method", false, 25)), ), "method", false, 25), "html");
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['template'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
        if (("normal" != $this->getContext($context, 'position', '27'))) {
            // line 28
            echo "    <img style=\"float: right; cursor: pointer; margin: 0 10px; vertical-align: middle\" width=\"24\" height=\"24\" alt=\"Hide Toolbar\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAwBJREFUeNrUVltrGkEUPlOvuah58R6Ehr4KAd8Cgb60CaTEP1Eo9AcFCv0TCZYQ+u5bfkFaEy9LYoRCqrvRmdXtd9bZdHW1pg996MDnzM7Mnm/ON+ecVTiOQ/+yvaB/3MLe4OLiwj//Erj+S1sloOU9HBwcLPSgCJwDDd0Xn2m4BjR1X1rowXg85u4EOAyHw2Tb9iHGdWAPMFYYL0ciEVJKHWH8GXgbuAMQFIFjHqfTaYrHYzxXAup6jebAazWgHI1GaWdnh0KhMM+/AV4FCHBiAzgbjUZkGAYlEkmKxWI8XwLqQBEgDZ6rAWX2Np/PU6PRIMsyee0r8C0gEdzj7iPrjnGFSbLZLCkYNAeDkk+ukCdLPB6nTCZDzWaTBoMB6cB4v/AONAFrXQVOmaQDEjagpCTTND2SBza+vr5OuVyOOp2O3/hrfyQtIgiSjCRlsmmSILEsy42QjY0N2t7eplarRf1+f6nxGQIJAqHHDpM4VBWCTiWTtEdTuZR0F9n4d2jef4AzQiw1PusBTjjXfnsiZYWlYJK1tTW6urpaefKgB0ECr0Vdr1CzhsMhwnBCErLp/Xzh42eVigUEXlaXI4hz1v3u7o4mkwkVCgVIKtmL0qpk9N3BVF+IyndRxM85Ht0kSmxuUq/XoxFOLoRDNzdNKhby7qEGmsQhsUfCMTwbC+5A+U/uxnksFqVUMukaZ3m05j+kVJUbxH4up0lm88RYcskgEE4RUtdwzN1YNEKp1BZ1u10aPj5OjQux755QR1e7rUmUJnFEHWsgcYxAqeBNUtontlK7LFIymXI17/d/cjZfIyf2scdwIWUVB7o0Bya1kQsp7I1HUVaUKtlKfvKpMVOLUGvU8RiXmEgm6P7+3g1FpabGFdcq9VSLULdUFXOXpmW5CZfa2nKlx/4jrlUBifgldGfAcff2luxp+WbN95dEyFOe4N0KFzuOMLQv/ryY/x5wsQthfKQ3fvjDt8BPcqJL/Zm2sfSDwy+8m//8rWgeSRrozS+K//5fxS8BBgCXGQk7P2P29gAAAABJRU5ErkJggg==\" onclick=\"this.parentNode.previousSibling.style.display = this.parentNode.style.display = 'none';\" />
";
        }
        // line 30
        echo "</div>
<!-- END of Symfony2 Web Debug Toolbar -->
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar.html.twig";
    }
}
