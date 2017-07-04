<?php

/* common/forgotten.twig */
class __TwigTemplate_5ea411b355b31e139a10b64722751dd5ae15974d266e4d61d420ae67f0a749b9 extends Twig_Template
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
        echo "
<div id=\"content\">
  <div class=\"container-fluid\"><br />
    <br />
    <div class=\"row\">
      <div class=\"col-sm-offset-4 col-sm-4\">
        <div class=\"panel panel-default\">
          <div class=\"panel-heading\">
            <h1 class=\"panel-title\"><i class=\"fa fa-repeat\"></i> ";
        // line 9
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
          </div>
          <div class=\"panel-body\">
            ";
        // line 12
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 13
            echo "            <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
            ";
        }
        // line 17
        echo "            <form action=\"";
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
              <div class=\"form-group\">
                <label for=\"input-email\">";
        // line 19
        echo (isset($context["entry_email"]) ? $context["entry_email"] : null);
        echo "</label>
                <div class=\"input-group\"><span class=\"input-group-addon\"><i class=\"fa fa-envelope\"></i></span>
                  <input type=\"text\" name=\"email\" value=\"";
        // line 21
        echo (isset($context["email"]) ? $context["email"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_email"]) ? $context["entry_email"] : null);
        echo "\" id=\"input-email\" class=\"form-control\" />
                </div>
              </div>
              <div class=\"text-right\">
                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-check\"></i> ";
        // line 25
        echo (isset($context["button_reset"]) ? $context["button_reset"] : null);
        echo "</button>
                <a href=\"";
        // line 26
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
";
        // line 35
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "common/forgotten.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 35,  70 => 26,  66 => 25,  57 => 21,  52 => 19,  46 => 17,  38 => 13,  36 => 12,  30 => 9,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="content">*/
/*   <div class="container-fluid"><br />*/
/*     <br />*/
/*     <div class="row">*/
/*       <div class="col-sm-offset-4 col-sm-4">*/
/*         <div class="panel panel-default">*/
/*           <div class="panel-heading">*/
/*             <h1 class="panel-title"><i class="fa fa-repeat"></i> {{ heading_title }}</h1>*/
/*           </div>*/
/*           <div class="panel-body">*/
/*             {% if error_warning %}*/
/*             <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*               <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*             </div>*/
/*             {% endif %}*/
/*             <form action="{{ action }}" method="post" enctype="multipart/form-data">*/
/*               <div class="form-group">*/
/*                 <label for="input-email">{{ entry_email }}</label>*/
/*                 <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>*/
/*                   <input type="text" name="email" value="{{ email }}" placeholder="{{ entry_email }}" id="input-email" class="form-control" />*/
/*                 </div>*/
/*               </div>*/
/*               <div class="text-right">*/
/*                 <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{ button_reset }}</button>*/
/*                 <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a>*/
/*               </div>*/
/*             </form>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* {{ footer }}*/
