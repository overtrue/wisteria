window.Vue = require('vue')

import docsearch from 'docsearch.js/dist/cdn/docsearch.js'
import ClipboardJS from 'clipboard'

window.Prism = require('prismjs')

require('prismjs/components/prism-markup-templating.js')
require('prismjs/components/prism-bash.js')
require('prismjs/components/prism-git.js')
require('prismjs/components/prism-javascript.js')
require('prismjs/components/prism-json.js')
require('prismjs/components/prism-markup.js')
require('prismjs/components/prism-php.js')
require('prismjs/components/prism-sass.js')
require('prismjs/components/prism-scss.js')

const files = require.context('./components', true, /\.vue$/i)
files.keys().map(key =>
  Vue.component(
    key
      .split('/')
      .pop()
      .split('.')[0],
    files(key).default,
  ),
)

class Wisteria {
  constructor() {
    this.initVueInstances()
    this.reformatContent()
    this.activateCurrentSection()

    document.addEventListener('scroll', () => this.handleAnchorLinkActiveStatus())
    document.querySelector('#nav-open').addEventListener('click', this.toggleSidebar)
    document.querySelector('#nav-close').addEventListener('click', this.toggleSidebar)

    setTimeout(this.formatPreBlock, 1000)

    if (window[WISTERIA_ALGOLIA_API_KEY] && window[WISTERIA_ALGOLIA_INDEX_NAME]) {
      this.initDocSearch()
    }
  }

  toggleSidebar() {
    document.querySelector('#app').classList.toggle('sidebar-expanded')
    document.querySelector('#sidebar').classList.toggle('hidden')
    document.querySelector('#nav-open').classList.toggle('hidden')
    document.querySelector('#nav-close').classList.toggle('hidden')
    document.querySelector('#docs-content').classList.toggle('overflow-hidden')
  }

  initVueInstances() {
    this.navbar = new Vue({el: '#navbar'})
    this.content = new Vue({el: '#content'})
  }

  reformatContent() {
    let content = document.querySelector('.markdown-body')

    this.createTocWidget(content)
    this.replaceQuoteIcons()
  }

  createTocWidget(content) {
    let toc = []

    content.querySelectorAll('h2, h3').forEach((heading, index) => {
      let title = heading.textContent
      let name = `heading-${heading.tagName.toLowerCase()}-${index}`
      let link = `#${name}`
      let level = parseInt(heading.tagName.substr(1)) - 1
      toc.push({title, link, name, level})
      let anchor = document.createElement('a')
      anchor.classList.add('anchor-link')
      anchor.setAttribute('href', link)
      anchor.insertAdjacentHTML(
        'beforeend',
        `<svg height="1em" width="1em" viewBox="0 0 24 24">
                <path fill="currentColor" d = "M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z" />
                </svg >`,
      )
      heading.id = name
      heading.prepend(anchor)
    })

    toc.reverse().forEach(item => {
      document
        .querySelector('#toc .anchors')
        .insertAdjacentHTML(
          'afterend',
          `<a href="${item.link}" data-anchor="${item.name}" class="level-${item.level} py-1 -ml-4 pl-${item.level *
          4} block text-gray-600 truncate border-l-2 border-transparent">${item.title}</a>`,
        )
    })

    window.onhashchange = this.handleAnchorLinkActiveStatus
  }

  formatPreBlock() {
    let copyIcon = `<svg height="1em" width="1em" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor">
                        <g>
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </g>
                    </svg>`

    this.content.querySelectorAll('pre,blockquote').forEach(pre => {
      pre.outerHTML = `<div class="pre-block relative">
                        <a class="copy-btn p-2 absolute top-0 right-0 cursor-pointer z-20" aria-label="copy">${copyIcon}</a>
                        ${pre.outerHTML}
                      </div>`
    })

    new ClipboardJS('.copy-btn', {
      target: trigger => trigger.nextElementSibling,
      text: target => target.innerText
    })
  }

  activateCurrentSection() {
    let nav = document.querySelector('#sidebar nav')
    let current = nav.querySelector('ul li a[href="' + WISTERIA_FULL_URL + '"]')

    nav.querySelectorAll('h2').forEach(h2 => {
      h2.classList.add('bg-white')
    })

    if (current) {
      current.classList.add('is-active', 'bg-gray-200', 'text-gray-900', 'rounded')
      current.parentElement.classList.add('is-active')
    }
    if (current.getBoundingClientRect().top >= window.screen.height * 0.4) {
      nav.scrollTop = current.getBoundingClientRect().top - window.screen.height * 0.4
    }
  }

  handleAnchorLinkActiveStatus() {
    document.querySelectorAll(`#content a.anchor-link`).forEach(anchor => {
      let anchorPosition = anchor.getBoundingClientRect()

      if (anchorPosition.top > 0 && anchorPosition.top <= 150) {
        this.setCurrentAnchor(anchor.hash)
      }
    })
  }

  setCurrentAnchor(hash = null) {
    hash = hash || window.location.hash
    let link = document.querySelector(`#toc a[href="${hash}"]`)

    if (link) {
      let previous = document.querySelector('#toc a.is-active')
      if (previous) {
        previous.classList.remove('is-active', 'font-semibold', 'border-gray-800', 'text-gray-800')
      }

      link.classList.add('is-active', 'font-semibold', 'border-gray-800', 'text-gray-800')
    }
  }

  initDocSearch() {
    docsearch({
      // Your apiKey and indexName will be given to you once
      apiKey: WISTERIA_ALGOLIA_API_KEY,
      indexName: WISTERIA_ALGOLIA_INDEX_NAME,
      // Replace inputSelector with a CSS selector
      // matching your search input
      inputSelector: '#search-input',
      // Set debug to true if you want to inspect the dropdown
      debug: false,
    })
  }

  replaceQuoteIcons() {
    document.querySelectorAll('.markdown-body blockquote').forEach(function (blockquote) {
      blockquote.querySelectorAll('blockquote').forEach(b => b.outerHTML = b.innerHTML)

      let match = blockquote.innerHTML.match(/\{(.*?)\}/)
      if (!match) {
        return
      }
      const icon = match[1]

      let icons = {
        info: `<svg class="w-4 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M7 13.33a7 7 0 1 1 6 0V16H7v-2.67zM7 17h6v1.5c0 .83-.67 1.5-1.5 1.5h-3A1.5 1.5 0 0 1 7 18.5V17zm2-5.1V14h2v-2.1a5 5 0 1 0-2 0z"></path>
                </svg>`,
        warning:
          `<svg class="w-4 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 5h2v6H9V5zm0 8h2v2H9v-2z"></path>
          </svg>`,
      }
      icons.note = icons.info
      icons.tips = icons.warning

      blockquote.innerHTML = `<div class="flag flex-0 text-blue-400 pr-2"><span class="svg">${icons[icon]}</span></div><div class="flex-1">${blockquote.innerHTML.replace(
        /\{(.*?)\}/,
        '',
      )}</div>`
      blockquote.classList.add(icon, 'flex', 'rounded-0', 'bg-blue-100', 'border-l-4', 'border-blue-400','text-blue-900')
    })
  }
}

new Wisteria()
