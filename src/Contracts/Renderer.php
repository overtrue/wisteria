<?php

/*
 * This file is part of the overtrue/wisteria.
 *
 * (c) overtrue <anzhengchao@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Overtrue\Wisteria\Contracts;

/**
 * Interface Render.
 */
interface Renderer
{
    public function render(string $page): string;
}
