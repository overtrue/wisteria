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
use Parsedown;

/**
 * Class Markdown.
 */
class Markdown implements Renderer
{
    /**
     * @var \Parsedown
     */
    protected $markdown;

    /**
     * Markdown constructor.
     *
     * @param \Parsedown $markdown
     */
    public function __construct(\Parsedown $markdown)
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
