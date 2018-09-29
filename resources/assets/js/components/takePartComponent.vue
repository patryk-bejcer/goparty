<template>
  <div>
    <button
      class="btn btn-success pull-right"
      @click="takePart"
    >
      {{ btnText }}
    </button>
  </div>
</template>

<script>
export default {
  name: 'TakePartComponent',

  // Get data from blade view.
  props: ['user', 'event'],

  data() {
    return {
      btnText: 'Weź udział',
      eventAttendance: {
        event_id: this.event,
        user_id: this.user,
        status: 2,
      },
    };
  },

  methods: {
    checkIfExist() {
      axios.get(`/api/take-part?event_id=${this.eventAttendance.event_id}&user_id=${this.eventAttendance.user_id}`)
        .then((resp) => {
          // console.log(resp);
          console.log('exist');
          btnText = 'Bierzesz udział';
        })
        .catch((resp) => {
          // console.log(resp);
          console.log('not exist');
          btnText = 'Weź udział';
        });
    },

    takePart() {
      console.log(this.eventAttendance);

      axios.post('/api/take-part', this.eventAttendance)
        .then((response) => {
          console.log(response.data);
        }, (error) => {
          console.log(error);
        });
    },
  },
};

</script>

<style scoped>

</style>
