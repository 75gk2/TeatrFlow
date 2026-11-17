<?php

declare(strict_types=1);

abstract class AppController
{
    protected function render(string $template, array $variables = []): void
    {
        $templatePatch = dirname(__DIR__, 2) . '/public/views/' . $template . '.html.php';


        if(!is_file($templatePatch))
        {
            throw new RuntimeException('View not found: ' . $template . ' | ' . $templatePatch);
        }

        extract($variables, EXTR_SKIP);
        require $templatePatch;
    }
}