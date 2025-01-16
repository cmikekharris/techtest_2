<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* file_process_form.html.twig */
class __TwigTemplate_ca03622b102bdb6548a7a7f788b31aa9 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "file_process_form.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "
    <a href=\"/\" class=\"link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover\">Process Next File</a>

    <h3>Original Data</h3>

    <ul>
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["existing_records"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 11
            yield "            <li>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = $context["line"]) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null), "html", null, true);
            yield "</li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['line'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        yield "    </ul>

    <h3>Processed Data</h3>

    <div>Number of original rows : ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["number_of_original_rows"] ?? null), "html", null, true);
        yield "</div>
    <div>Number of useable records : ";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["number_of_new_rows"] ?? null), "html", null, true);
        yield "</div>

    <table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">Title</th>
      <th scope=\"col\">First Name</th>
      <th scope=\"col\">Initial</th>
      <th scope=\"col\">Last Name</th>
    </tr>
  </thead>
  <tbody>

    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["updated_records"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 32
            yield "        <tr>
            <td>";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["line"], "title", [], "any", false, false, false, 33), "html", null, true);
            yield "</td>
            <td>";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["line"], "first_name", [], "any", false, false, false, 34), "html", null, true);
            yield "</td>
            <td>";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["line"], "initial", [], "any", false, false, false, 35), "html", null, true);
            yield "</td>
            <td>";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["line"], "last_name", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['line'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        yield "
  </tbody>
</table>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "file_process_form.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  133 => 39,  124 => 36,  120 => 35,  116 => 34,  112 => 33,  109 => 32,  105 => 31,  89 => 18,  85 => 17,  79 => 13,  70 => 11,  66 => 10,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block content %}

    <a href=\"/\" class=\"link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover\">Process Next File</a>

    <h3>Original Data</h3>

    <ul>
        {% for line in existing_records %}
            <li>{{ line[0] }}</li>
        {% endfor %}
    </ul>

    <h3>Processed Data</h3>

    <div>Number of original rows : {{ number_of_original_rows }}</div>
    <div>Number of useable records : {{ number_of_new_rows }}</div>

    <table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">Title</th>
      <th scope=\"col\">First Name</th>
      <th scope=\"col\">Initial</th>
      <th scope=\"col\">Last Name</th>
    </tr>
  </thead>
  <tbody>

    {% for line in updated_records %}
        <tr>
            <td>{{ line.title }}</td>
            <td>{{ line.first_name }}</td>
            <td>{{ line.initial }}</td>
            <td>{{ line.last_name }}</td>
        </tr>
    {% endfor %}

  </tbody>
</table>

{% endblock %}
", "file_process_form.html.twig", "/home/mharris/Projects/techtest_2/StreetGroupTechTest/templates/file_process_form.html.twig");
    }
}
