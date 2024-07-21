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
        'init_voted',
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
        },
        vote(e) {
            this.voted = true;

            $.ajax({
                url: baseUrl + "/site/ajax-cast-vote",
                cache: false,
                data: {
                    timeline_id: 1,
                },
                success: function (e) {
                }
            });
        }
    },
    mounted() {
        this.timelineData = this.init_timelinedata;
        this.voted = this.init_voted;
    },
    data() {
        return {
            timelineData: [],
            voted: false,
            politics: false,
        }
    }
}, {
    init_timelinedata: window.timeline.data,
    init_voted: window.timeline.voted,
}).use(vuetify).mount('#timeline');