import { createApp } from 'vue';

// Vuetify
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: 'dark',
    },
});

createApp({
    components: {
        components,
    },
    directives,
    props: [
        'init_timelinedata',
    ],
    methods: {
        onIntersect (isIntersecting, entries, observer) {
          console.log(entries);

          entries.forEach(element => {
            console.log(element.target);
            if (isIntersecting) {
                element.target.classList.add('visible');
            }
          });
        },
      },
    mounted() {
        this.timelineData = this.init_timelinedata;
},
    data() {
        return {
            timelineData: [],
        }
    }
}, {
    init_timelinedata: window.timelineData,
}).use(vuetify).mount('#timeline');