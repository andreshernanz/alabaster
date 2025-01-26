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

/* _layouts/main.twig */
class __TwigTemplate_b50e2f50dea332d2d678a66ed58fe99c extends Template
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

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"es\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield ($context["title"] ?? "Alabaster");
        yield "</title>
   <link rel=\"stylesheet\" href=\"/css/main.css\">
</head>
<body>
";
        // line 10
        yield from $this->loadTemplate("_partials/header.twig", "_layouts/main.twig", 10)->unwrap()->yield($context);
        // line 11
        yield "<main>
    ";
        // line 12
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 13
        yield "</main>
";
        // line 14
        yield from $this->loadTemplate("_partials/footer.twig", "_layouts/main.twig", 14)->unwrap()->yield($context);
        // line 15
        yield "<script src=\"/js/main.js\"></script>
</body>
</html>";
        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_layouts/main.twig";
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
        return array (  76 => 12,  69 => 15,  67 => 14,  64 => 13,  62 => 12,  59 => 11,  57 => 10,  50 => 6,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "_layouts/main.twig", "C:\\laragon\\www\\alabaster\\src\\templates\\_layouts\\main.twig");
    }
}
