import { createApp, computed } from 'vue';
import settings from './components/settings';

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
        settings,
    },
    directives,
    props: [
        'init_timelinedata',
    ],
    provide() {
        return {
            politics: computed(() => this.politics),
        }
    },
    methods: {
        onIntersect(isIntersecting, entries, observer) {
            entries.forEach(element => {
                if (isIntersecting) {
                    element.target.classList.add('visible');
                }
            });
        },
        togglePolitics(e) {
            this.politics = !this.politics;
           // console.log(this.politics);
        },
        vote(e) {
            this.voted = true;
        }
    },
    mounted() {
        console.log(this.testpolitics);
        this.timelineData = this.init_timelinedata;
    },
    data() {
        return {
            timelineData: [],
            voted: false,
            politics: false,
        }
    }
}, {
    init_timelinedata: window.timelineData,
}).use(vuetify).mount('#timeline');