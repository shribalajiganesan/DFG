<?php

/* default/template/extension/module/carousel.twig */
class __TwigTemplate_5186dac2f6ce2e3938c010e6d6d6ad02942ee6801e7bd3adc54d96e18d20b80a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"carousel";
        echo (isset($context["module"]) ? $context["module"] : null);
        echo "\" class=\"owl-carousel\">
 ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 3
            echo "  <div class=\"item text-center\">
    ";
            // line 4
            if ($this->getAttribute($context["banner"], "link", array())) {
                // line 5
                echo "    <a href=\"";
                echo $this->getAttribute($context["banner"], "link", array());
                echo "\"><img src=\"";
                echo $this->getAttribute($context["banner"], "image", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["banner"], "title", array());
                echo "\" class=\"img-responsive\" /></a>
    ";
            } else {
                // line 7
                echo "    <img src=\"";
                echo $this->getAttribute($context["banner"], "image", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["banner"], "title", array());
                echo "\" class=\"img-responsive\" />
    ";
            }
            // line 9
            echo "  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</div>
<script type=\"text/javascript\"><!--
\$('#carousel";
        // line 13
        echo (isset($context["module"]) ? $context["module"] : null);
        echo "').owlCarousel({
\titems: 6,
\tautoPlay: 3000,
\tnavigation: true,
\tnavigationText: ['<i class=\"fa fa-chevron-left fa-5x\"></i>', '<i class=\"fa fa-chevron-right fa-5x\"></i>'],
\tpagination: true
});
--></script>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/carousel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 13,  58 => 11,  51 => 9,  43 => 7,  33 => 5,  31 => 4,  28 => 3,  24 => 2,  19 => 1,);
    }
}
/* <div id="carousel{{ module }}" class="owl-carousel">*/
/*  {% for banner in banners %}*/
/*   <div class="item text-center">*/
/*     {% if banner.link %}*/
/*     <a href="{{ banner.link }}"><img src="{{ banner.image }}" alt="{{ banner.title }}" class="img-responsive" /></a>*/
/*     {% else %}*/
/*     <img src="{{ banner.image }}" alt="{{ banner.title }}" class="img-responsive" />*/
/*     {% endif %}*/
/*   </div>*/
/*   {% endfor %}*/
/* </div>*/
/* <script type="text/javascript"><!--*/
/* $('#carousel{{ module }}').owlCarousel({*/
/* 	items: 6,*/
/* 	autoPlay: 3000,*/
/* 	navigation: true,*/
/* 	navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],*/
/* 	pagination: true*/
/* });*/
/* --></script>*/
