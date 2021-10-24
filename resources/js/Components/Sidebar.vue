<template>
  <div>
    <div class="overlay" v-if="showing" @click.prevent="close">
      <!-- <svg class="icon close txt-red" aria-label="close" @click.prevent="close">
        <use xlink:href="/svg/naykel-ui-SVG-sprite.svg#close"></use>
      </svg> -->
    </div>
    <transition name="slide">
      <div class="sidebar light" v-if="showing">
        <slot />
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: {
    showing: {
      required: true,
      type: Boolean,
    },
  },
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>

<style lang="scss" scoped>
.overlay {
  z-index: 1000;
}

.sidebar {
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
  width: 100%;
  max-width: 375px;
  z-index: 1000;
  overflow-y: auto;
  outline: none;
  transition: transform 0.25s ease-in-out;
}

.slide-enter-active {
  animation: menu-slide 0.5s;
}
.slide-leave-active {
  animation: menu-slide 0.5s reverse;
}
@keyframes menu-slide {
  from {
    transform: translateX(-100%);
  }
  to {
    transform: translateX(0);
  }
}
</style>
