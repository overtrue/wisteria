<?php

/*
 * This file is part of the overtrue/wisteria.
 *
 * (c) overtrue <anzhengchao@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Overtrue\Wisteria\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Overtrue\Wisteria\Documentation;
use Overtrue\Wisteria\Exceptions\PageNotFoundException;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class DocsController.
 */
class DocsController
{
    use AuthorizesRequests;

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
        $page = $page ?? \config('wisteria.docs.index');

        if (Gate::has('wisteria.view')) {
            $this->authorize('wisteria.view', [$page, $version]);
        }

        $updatedAt = Carbon::parse(date('c', filemtime($this->docs->path($version, $page))))
            ->setTimezone(config('wisteria.date.timezone', 'UTC'))
            ->diffForHumans();

        $data = [
            'page' => $page,
            'title' => null,
            'currentVersion' => $version,
            'index' => $this->docs->index($version),
            'versions' => config('wisteria.docs.versions'),
            'updatedAt' => $updatedAt,
            'fullUrl' => \sprintf('%s/%s/%s', \config('wisteria.route'), $version, $page),
            'editUrl' => \sprintf('%s/edit/%s/%s.md', \config('wisteria.docs.repository.url'), $version, $page),
            'canonical' => sprintf('%s/%s/%s', config('wisteria.docs.path'), config('wisteria.docs.default_version'), $page),
        ];

        try {
            $content = new Crawler($this->docs->get($version, $page));
        } catch (PageNotFoundException $e) {
            $data['title'] = 'Page Not Found.';
            return \response(\view('wisteria::errors.404', $data), 404);
        }

        $titleNode = $content->filter('h1')->getNode(0);

        if ($titleNode) {
            $titleNode->parentNode->removeChild($titleNode);
            $data['title'] = $titleNode->textContent;
        }

        $data['content'] = $content->html();

        return view('wisteria::docs', $data);
    }
}
