<?php

/*
 * This file is part of the overtrue/wisteria.
 *
 * (c) overtrue <anzhengchao@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Overtrue\Wisteria\Renders;

use Overtrue\LaravelEmoji\Emoji;
use Overtrue\Wisteria\Contracts\Renderer;

/**
 * Class Markdown.
 */
class Markdown implements Renderer
{
    /**
     * @var \ParsedownExtra
     */
    protected $markdown;

    /**
     * Markdown constructor.
     *
     * @param \ParsedownExtra $markdown
     */
    public function __construct(\ParsedownExtra $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * @param string $content
     *
     * @return string
     */
    public function render(string $content): string
    {
        return $this->markdown->text(Emoji::shortnameToUnicode($content));
    }
}
