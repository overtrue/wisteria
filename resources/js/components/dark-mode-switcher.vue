<template>
  <button type="button" class="dark-mode-switcher" @click="toggleDarkMode">
    <div class="light-mode-icon">
      <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M3.828 5.243L2.343 3.757a1 1 0 0 1 1.414-1.414l1.486 1.485a5.027 5.027 0 0 0-1.415 1.415zM7 3.1V1a1 1 0 1 1 2 0v2.1a5.023 5.023 0 0 0-2 0zm3.757.728l1.486-1.485a1 1 0 1 1 1.414 1.414l-1.485 1.486a5.027 5.027 0 0 0-1.415-1.415zM12.9 7H15a1 1 0 0 1 0 2h-2.1a5.023 5.023 0 0 0 0-2zm-.728 3.757l1.485 1.486a1 1 0 1 1-1.414 1.414l-1.486-1.485a5.027 5.027 0 0 0 1.415-1.415zM9 12.9V15a1 1 0 0 1-2 0v-2.1a5.023 5.023 0 0 0 2 0zm-3.757-.728l-1.486 1.485a1 1 0 0 1-1.414-1.414l1.485-1.486a5.027 5.027 0 0 0 1.415 1.415zM3.1 9H1a1 1 0 1 1 0-2h2.1a5.023 5.023 0 0 0 0 2zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
          fill-rule="evenodd"></path>
      </svg>
    </div>
    <div class="dark-mode-icon">
      <svg viewBox="0 0 17 16" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M7.914 0a6.874 6.874 0 0 0-1.26 3.972c0 3.875 3.213 7.017 7.178 7.017.943 0 1.843-.178 2.668-.5C15.423 13.688 12.34 16 8.704 16 4.174 16 .5 12.41.5 7.982.5 3.814 3.754.389 7.914 0z"
          fill-rule="evenodd"></path>
      </svg>
    </div>
  </button>
</template>

<script>
  import localforage from 'localforage'

  export default {
    name: "dark-mode-switcher",
    methods: {
      toggleDarkMode() {
        document.body.classList.toggle('dark-mode')
        localforage.setItem('docs-prefers-dark-mode', document.body.classList.contains('dark-mode'))
      },
      loadLastMode() {
        localforage.getItem('docs-prefers-dark-mode').then((scheme) => {
          if (scheme && !document.body.classList.contains('dark-mode')) {
            this.toggleDarkMode()
          }
        })
      }
    },
    mounted() {
      this.loadLastMode()
    }
  }
</script>

<style lang="scss">
  $dark-mode-switcher-height: 30px;

  .dark-mode-switcher {
    position: relative;
    overflow: hidden;
    background: transparent;
    border: none;
    height: $dark-mode-switcher-height;
    width: $dark-mode-switcher-height;
    display: flex;
    outline: none;
    flex-direction: column;
    transition: transform .2s;

    &:focus {
      outline: none;
    }

    .light-mode-icon {
      color: #1b4eab;
      margin-top: -100%;
      border: 2px solid #1b4eab;
    }

    .dark-mode-icon {
      color: #7dabf8;
      border: 2px solid #7dabf8;
    }

    .dark-mode-icon, .light-mode-icon {
      box-sizing: border-box;
      border-radius: 100%;
      height: $dark-mode-switcher-height;
      width: $dark-mode-switcher-height;
      padding: 4px;
      transition: transform .2s;

      svg {
        fill: currentColor;
      }
    }
  }

  @mixin dark-mode {
    background-color: #fefefe;
    filter: invert(100%);

    * {
      background-color: inherit;
    }

    img:not([src*=".svg"]), video {
      filter: invert(100%);
    }
  }

  body.dark-mode {
    @include dark-mode;
    .light-mode-icon {
      margin-top: 0;
    }
    .dark-mode-icon {
      transform: rotate(-90deg);
    }
  }

  body:not(.dark-mode) .dark-mode-icon {
    transform: rotate(-90deg);
  }

  @media (prefers-color-scheme: dark) {
    body {
      @include dark-mode;
    }
  }

  body.light-mode {
    :root {
      background-color: unset;
      filter: unset;
    }

    * {
      background-color: inherit;
    }

    img:not([src*=".svg"]), video {
      filter: unset;
    }
  }
</style>
