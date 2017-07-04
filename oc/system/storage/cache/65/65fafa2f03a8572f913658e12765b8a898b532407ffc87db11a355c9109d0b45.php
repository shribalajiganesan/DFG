<?php

/* common/column_left.twig */
class __TwigTemplate_60f71bd442fced5deb1af1785a01ecf1262625271ff7dfb3b97f59b72935ae78 extends Twig_Template
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
        echo "<nav id=\"column-left\">
  <div id=\"navigation\">";
        // line 2
        echo (isset($context["text_navigation"]) ? $context["text_navigation"] : null);
        echo "</div>
  <ul id=\"menu\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) ? $context["menus"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 5
            echo "    <li id=\"";
            echo $this->getAttribute($context["menu"], "id", array());
            echo "\"> ";
            if ($this->getAttribute($context["menu"], "href", array())) {
                echo " <a href=\"";
                echo $this->getAttribute($context["menu"], "href", array());
                echo "\"><i class=\"fa ";
                echo $this->getAttribute($context["menu"], "icon", array());
                echo " fw\"></i> <span>";
                echo $this->getAttribute($context["menu"], "name", array());
                echo "</span></a> ";
            } else {
                echo " <a class=\"parent\"><i class=\"fa ";
                echo $this->getAttribute($context["menu"], "icon", array());
                echo " fw\"></i> <span>";
                echo $this->getAttribute($context["menu"], "name", array());
                echo "</span></a> ";
            }
            // line 6
            echo "      ";
            if ($this->getAttribute($context["menu"], "children", array())) {
                // line 7
                echo "      <ul>
        ";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["menu"], "children", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["children_1"]) {
                    // line 9
                    echo "        <li> ";
                    if ($this->getAttribute($context["children_1"], "href", array())) {
                        echo " <a href=\"";
                        echo $this->getAttribute($context["children_1"], "href", array());
                        echo "\">";
                        echo $this->getAttribute($context["children_1"], "name", array());
                        echo "</a> ";
                    } else {
                        echo " <a class=\"parent\">";
                        echo $this->getAttribute($context["children_1"], "name", array());
                        echo "</a> ";
                    }
                    // line 10
                    echo "          ";
                    if ($this->getAttribute($context["children_1"], "children", array())) {
                        // line 11
                        echo "          <ul>
            ";
                        // line 12
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["children_1"], "children", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["children_2"]) {
                            // line 13
                            echo "            <li> ";
                            if ($this->getAttribute($context["children_2"], "href", array())) {
                                echo " <a href=\"";
                                echo $this->getAttribute($context["children_2"], "href", array());
                                echo "\">";
                                echo $this->getAttribute($context["children_2"], "name", array());
                                echo "</a> ";
                            } else {
                                echo " <a class=\"parent\">";
                                echo $this->getAttribute($context["children_2"], "name", array());
                                echo "</a> ";
                            }
                            // line 14
                            echo "              ";
                            if ($this->getAttribute($context["children_2"], "children", array())) {
                                // line 15
                                echo "              <ul>
                ";
                                // line 16
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["children_2"], "children", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["children_3"]) {
                                    // line 17
                                    echo "                <li><a href=\"";
                                    echo $this->getAttribute($context["children_3"], "href", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["children_3"], "name", array());
                                    echo "</a></li>
                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children_3'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 19
                                echo "              </ul>
              ";
                            }
                            // line 20
                            echo " </li>
            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children_2'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 22
                        echo "          </ul>
          ";
                    }
                    // line 23
                    echo " </li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children_1'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "      </ul>
      ";
            }
            // line 26
            echo " </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "  </ul>
  <div id=\"stats\">
    <ul>
      <li>
        <div>";
        // line 32
        echo (isset($context["text_complete_status"]) ? $context["text_complete_status"] : null);
        echo " <span class=\"pull-right\">";
        echo (isset($context["complete_status"]) ? $context["complete_status"] : null);
        echo "%</span></div>
        <div class=\"progress\">
          <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"";
        // line 34
        echo (isset($context["complete_status"]) ? $context["complete_status"] : null);
        echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        echo (isset($context["complete_status"]) ? $context["complete_status"] : null);
        echo "%\"> <span class=\"sr-only\">";
        echo (isset($context["complete_status"]) ? $context["complete_status"] : null);
        echo "%</span></div>
        </div>
      </li>
      <li>
        <div>";
        // line 38
        echo (isset($context["text_processing_status"]) ? $context["text_processing_status"] : null);
        echo " <span class=\"pull-right\">";
        echo (isset($context["processing_status"]) ? $context["processing_status"] : null);
        echo "%</span></div>
        <div class=\"progress\">
          <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"";
        // line 40
        echo (isset($context["processing_status"]) ? $context["processing_status"] : null);
        echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        echo (isset($context["processing_status"]) ? $context["processing_status"] : null);
        echo "%\"> <span class=\"sr-only\">";
        echo (isset($context["processing_status"]) ? $context["processing_status"] : null);
        echo "%</span></div>
        </div>
      </li>
      <li>
        <div>";
        // line 44
        echo (isset($context["text_other_status"]) ? $context["text_other_status"] : null);
        echo " <span class=\"pull-right\">";
        echo (isset($context["other_status"]) ? $context["other_status"] : null);
        echo "%</span></div>
        <div class=\"progress\">
          <div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"";
        // line 46
        echo (isset($context["other_status"]) ? $context["other_status"] : null);
        echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        echo (isset($context["other_status"]) ? $context["other_status"] : null);
        echo "%\"> <span class=\"sr-only\">";
        echo (isset($context["other_status"]) ? $context["other_status"] : null);
        echo "%</span></div>
        </div>
      </li>
    </ul>
  </div>
</nav>
";
    }

    public function getTemplateName()
    {
        return "common/column_left.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 46,  192 => 44,  181 => 40,  174 => 38,  163 => 34,  156 => 32,  150 => 28,  143 => 26,  139 => 25,  132 => 23,  128 => 22,  121 => 20,  117 => 19,  106 => 17,  102 => 16,  99 => 15,  96 => 14,  83 => 13,  79 => 12,  76 => 11,  73 => 10,  60 => 9,  56 => 8,  53 => 7,  50 => 6,  31 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* <nav id="column-left">*/
/*   <div id="navigation">{{ text_navigation }}</div>*/
/*   <ul id="menu">*/
/*     {% for menu in menus %}*/
/*     <li id="{{ menu.id }}"> {% if menu.href %} <a href="{{ menu.href }}"><i class="fa {{ menu.icon }} fw"></i> <span>{{ menu.name }}</span></a> {% else %} <a class="parent"><i class="fa {{ menu.icon }} fw"></i> <span>{{ menu.name }}</span></a> {% endif %}*/
/*       {% if menu.children %}*/
/*       <ul>*/
/*         {% for children_1 in menu.children %}*/
/*         <li> {% if children_1.href %} <a href="{{ children_1.href }}">{{ children_1.name }}</a> {% else %} <a class="parent">{{ children_1.name }}</a> {% endif %}*/
/*           {% if children_1.children %}*/
/*           <ul>*/
/*             {% for children_2 in children_1.children %}*/
/*             <li> {% if children_2.href %} <a href="{{ children_2.href }}">{{ children_2.name }}</a> {% else %} <a class="parent">{{ children_2.name }}</a> {% endif %}*/
/*               {% if children_2.children %}*/
/*               <ul>*/
/*                 {% for children_3 in children_2.children %}*/
/*                 <li><a href="{{ children_3.href }}">{{ children_3.name }}</a></li>*/
/*                 {% endfor %}*/
/*               </ul>*/
/*               {% endif %} </li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*           {% endif %} </li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*       {% endif %} </li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   <div id="stats">*/
/*     <ul>*/
/*       <li>*/
/*         <div>{{ text_complete_status }} <span class="pull-right">{{ complete_status }}%</span></div>*/
/*         <div class="progress">*/
/*           <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ complete_status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ complete_status }}%"> <span class="sr-only">{{ complete_status }}%</span></div>*/
/*         </div>*/
/*       </li>*/
/*       <li>*/
/*         <div>{{ text_processing_status }} <span class="pull-right">{{ processing_status }}%</span></div>*/
/*         <div class="progress">*/
/*           <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ processing_status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ processing_status }}%"> <span class="sr-only">{{ processing_status }}%</span></div>*/
/*         </div>*/
/*       </li>*/
/*       <li>*/
/*         <div>{{ text_other_status }} <span class="pull-right">{{ other_status }}%</span></div>*/
/*         <div class="progress">*/
/*           <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ other_status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ other_status }}%"> <span class="sr-only">{{ other_status }}%</span></div>*/
/*         </div>*/
/*       </li>*/
/*     </ul>*/
/*   </div>*/
/* </nav>*/
/* */
