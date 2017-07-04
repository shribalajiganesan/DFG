<?php

/* common/dashboard.twig */
class __TwigTemplate_d5413066fcbfcb7630a282e1d0e3155eb21e193d0085b98053932fb4627b8ceb extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"button\" id=\"button-setting\" title=\"";
        // line 6
        echo (isset($context["button_setting"]) ? $context["button_setting"] : null);
        echo "\" data-loading-text=\"";
        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
        echo "\" class=\"btn btn-info\"><i class=\"fa fa-cog\"></i></button>
      </div>
      <h1>";
        // line 8
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">";
        // line 16
        if ((isset($context["error_install"]) ? $context["error_install"] : null)) {
            // line 17
            echo "    <div class=\"alert alert-danger alert-dismissible\">
      <button type=\"button\" class=\"close pull-right\" data-dismiss=\"alert\">&times;</button>
      <i class=\"fa fa-exclamation-circle\"></i> ";
            // line 19
            echo (isset($context["error_install"]) ? $context["error_install"] : null);
            echo "</div>
    ";
        }
        // line 21
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 22
            echo "    <div class=\"row\">";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["row"]);
            foreach ($context['_seq'] as $context["_key"] => $context["dashboard_1"]) {
                // line 23
                echo "      ";
                $context["class"] = sprintf("col-lg-%s %s", $this->getAttribute($context["dashboard_1"], "width", array()), "col-md-3 col-sm-6");
                // line 24
                echo "      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["row"]);
                foreach ($context['_seq'] as $context["_key"] => $context["dashboard_2"]) {
                    // line 25
                    echo "      ";
                    if (($this->getAttribute($context["dashboard_2"], "width", array()) > 3)) {
                        // line 26
                        echo "      ";
                        $context["class"] = sprintf("col-lg-%s %s", $this->getAttribute($context["dashboard_1"], "width", array()), "col-md-12 col-sm-12");
                        // line 27
                        echo "      ";
                    }
                    // line 28
                    echo "      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dashboard_2'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 29
                echo "      <div class=\"";
                echo (isset($context["class"]) ? $context["class"] : null);
                echo "\">";
                echo $this->getAttribute($context["dashboard_1"], "output", array());
                echo "</div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dashboard_1'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "</div>
  ";
        // line 32
        if ((isset($context["error_storage"]) ? $context["error_storage"] : null)) {
            // line 33
            echo "  <div id=\"modal-error\" class=\"modal\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h4 class=\"modal-title text-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            // line 38
            echo (isset($context["error_storage"]) ? $context["error_storage"] : null);
            echo "</h4>
        </div>
        <div class=\"modal-body\">
          <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            // line 41
            echo (isset($context["error_storage"]) ? $context["error_storage"] : null);
            echo "</div>
          <div style=\"height: 300px; overflow: scroll;\" class=\"form-control\" disabled=\"disabled\">";
            // line 42
            echo (isset($context["text_instruction"]) ? $context["text_instruction"] : null);
            echo "</div>
        </div>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$(document).ready(function() {
\t\$('#modal-error').modal('show');
});   
//--></script> 
  ";
        }
        // line 52
        echo " 
  <script type=\"text/javascript\"><!--
\$('#button-setting').on('click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=common/developer&user_token=";
        // line 56
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\tdataType: 'html',
\t\tbeforeSend: function() {
\t\t\t\$('#button-setting').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-setting').button('reset');
\t\t},
\t\tsuccess: function(html) {
\t\t\t\$('#modal-developer').remove();
\t\t\t
\t\t\t\$('body').prepend('<div id=\"modal-developer\" class=\"modal\">' + html + '</div>');
\t\t\t
\t\t\t\$('#modal-developer').modal('show');
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});\t
});\t
//--></script> 
</div>
";
        // line 78
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "common/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 78,  164 => 56,  158 => 52,  144 => 42,  140 => 41,  134 => 38,  127 => 33,  125 => 32,  122 => 31,  115 => 30,  104 => 29,  98 => 28,  95 => 27,  92 => 26,  89 => 25,  84 => 24,  81 => 23,  76 => 22,  71 => 21,  66 => 19,  62 => 17,  60 => 16,  55 => 13,  44 => 11,  40 => 10,  35 => 8,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">*/
/*         <button type="button" id="button-setting" title="{{ button_setting }}" data-loading-text="{{ text_loading }}" class="btn btn-info"><i class="fa fa-cog"></i></button>*/
/*       </div>*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">{% if error_install %}*/
/*     <div class="alert alert-danger alert-dismissible">*/
/*       <button type="button" class="close pull-right" data-dismiss="alert">&times;</button>*/
/*       <i class="fa fa-exclamation-circle"></i> {{ error_install }}</div>*/
/*     {% endif %}*/
/*     {% for row in rows %}*/
/*     <div class="row">{% for dashboard_1 in row %}*/
/*       {% set class = 'col-lg-%s %s'|format(dashboard_1.width, 'col-md-3 col-sm-6') %}*/
/*       {% for dashboard_2 in row %}*/
/*       {% if dashboard_2.width > 3 %}*/
/*       {% set class = 'col-lg-%s %s'|format(dashboard_1.width, 'col-md-12 col-sm-12') %}*/
/*       {% endif %}*/
/*       {% endfor %}*/
/*       <div class="{{ class }}">{{ dashboard_1.output }}</div>*/
/*       {% endfor %}</div>*/
/*     {% endfor %}</div>*/
/*   {% if error_storage %}*/
/*   <div id="modal-error" class="modal">*/
/*     <div class="modal-dialog">*/
/*       <div class="modal-content">*/
/*         <div class="modal-header">*/
/*           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>*/
/*           <h4 class="modal-title text-danger"><i class="fa fa-exclamation-circle"></i> {{ error_storage }}</h4>*/
/*         </div>*/
/*         <div class="modal-body">*/
/*           <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_storage }}</div>*/
/*           <div style="height: 300px; overflow: scroll;" class="form-control" disabled="disabled">{{ text_instruction }}</div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <script type="text/javascript"><!--*/
/* $(document).ready(function() {*/
/* 	$('#modal-error').modal('show');*/
/* });   */
/* //--></script> */
/*   {% endif %} */
/*   <script type="text/javascript"><!--*/
/* $('#button-setting').on('click', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=common/developer&user_token={{ user_token }}',*/
/* 		dataType: 'html',*/
/* 		beforeSend: function() {*/
/* 			$('#button-setting').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-setting').button('reset');*/
/* 		},*/
/* 		success: function(html) {*/
/* 			$('#modal-developer').remove();*/
/* 			*/
/* 			$('body').prepend('<div id="modal-developer" class="modal">' + html + '</div>');*/
/* 			*/
/* 			$('#modal-developer').modal('show');*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});	*/
/* });	*/
/* //--></script> */
/* </div>*/
/* {{ footer }}*/
