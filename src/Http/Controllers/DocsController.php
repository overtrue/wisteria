<?php

/*
 * This file is part of the overtrue/wisteria.
 *
 * (c) overtrue <anzhengchao@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Overtrue\Wisteria\Http\Controllers;

use Overtrue\Wisteria\Documentation;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class DocsController.
 */
class DocsController
{
    /**
     * @var \Overtrue\Wisteria\Documentation
     */
    protected $docs;

    /**
     * DocsController constructor.
     *
     * @param \Overtrue\Wisteria\Documentation $docs
     */
    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    public function index()
    {
        return $this->show(
            config('wisteria.docs.default_version'),
            \str_replace('.md', '', config('wisteria.docs.home'))
        );
    }

    public function show($version, $page = null)
    {
        $content = $this->docs->get($version, $page);

        $title = (new Crawler($content))->filterXPath('//h1');

        return view('wisteria::docs', [
            'title' => count($title) ? $title->text() : null,
            'index' => $this->docs->index($version),
            'content' => $content,
            'currentVersion' => $version,
            'versions' => config('wisteria.docs.versions'),
            'page' => $page,
            'editUrl' => \sprintf('%s/edit/%s/%s.md', \config('wisteria.docs.repository.url'), $version, $page),
            'canonical' => sprintf('%/%s/%s', config('wisteria.docs.path'), config('wisteria.docs.default_version'), $page),
        ]);
    }
}
