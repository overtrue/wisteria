<?php


namespace Overtrue\Wisteria\Contracts;


/**
 * Interface Render
 */
interface Renderer
{
    public function render(string $page): string;
}