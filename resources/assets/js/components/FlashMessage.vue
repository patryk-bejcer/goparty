<template>
  <div>
    <transition name="bounce">
      <div
        v-show="show"
        class="alert alert-success spacing flash-success justify-content-between"
        role="alert"
      >
        <i
          class="fa fa-info-circle"
          aria-hidden="true"
        />
        <p class="mb-0"> {{ body }}</p>
      </div>
    </transition>
  </div>

</template>

<script>
export default {
  props: ['message'],
  data() {
    return {
      show: false,
      body: '',
    };
  },
  created() {
    if (this.message) {
      this.flash(this.message);
    }
    window.events.$on('flash', message => this.flash(message));
  },
  methods: {
    flash(message) {
      this.show = true;
      this.body = message;

      setTimeout(() => {
        this.hide();
      }, 4500);
    },
    hide() {
      this.show = false;
    },
  },
};
</script>

<style>
    .spacing {
        position: fixed;
        right: 30px;
        /*bottom: 15px;*/
        top:25px;
        z-index: 10000;
    }

    .spacing i{
        font-size: 2em;
        margin-right: .3em;
        float: left;
    }

    .spacing p{
        margin-bottom: 0;
        float:right;
        line-height:25px;
    }

    .flash-success {
        background-color: rgba(0, 200, 81, .95);
        color: #FFF;
        border: 1px solid transparent;
        border-radius: 0;
        box-shadow: 4px 4px 3px rgba(0, 0, 0, 0.2);
    }

    .bounce-enter-active {
        animation: bounce-in .5s;
    }

    .bounce-leave-active {
        animation: bounce-in .5s reverse;
    }

    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.15);
        }
        100% {
            transform: scale(1);
        }
    }
</style>
