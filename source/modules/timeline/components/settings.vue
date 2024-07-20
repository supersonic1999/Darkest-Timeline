<script>
export default {
    inject: [
        'politics',
    ],
    methods: {
        togglePolitics(e) {
            setTimeout(() => {
                this.$emit('toggle-politics');
            }, 500);
        },
    },
    data() {
        return {
        }
    }
}
</script>

<template>
    <v-speed-dial location="top left" transition="slide-x-transition" attach="body">
        <template v-slot:activator="{ props: activatorProps }">
            <v-fab v-bind="activatorProps" size="small" icon="fa-solid fa-gear"></v-fab>
        </template>

        <v-btn key="1" prepend-icon="fa-solid fa-medal" @click="togglePolitics($event)">
            <template v-if="politics">Disable</template>
            <template v-else>Enable</template> Politics
        </v-btn>
    </v-speed-dial>
</template>

<style>
.v-fab {
  position: fixed !important;
  bottom: 15px;
  left: 15px;
  height: unset !important;
}

.v-fab__container {
    position: static !important;
}
</style>