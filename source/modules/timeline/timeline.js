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
        'init_canVote',
    ],
    provide() {
        return {
            politics: computed(() => this.politics),
        }
    },
    methods: {
        checkPolitics(timeline_item) {
            if (!this.politics) {
                return !timeline_item.is_political;
            }
            return true;
        },
        onIntersect(isIntersecting, entries, observer) {
            entries.forEach(element => {
                if (isIntersecting) {
                    element.target.classList.add('visible');
                }
            });
        },
        togglePolitics(e) {
            this.politics = !this.politics;

            sessionStorage.setItem("politics", this.politics);
        },
        vote(e, timeline_item) {
            const that = this;

            $.ajax({
                url: baseUrl + "/site/ajax-cast-vote",
                cache: false,
                data: {
                    timeline_id: timeline_item.id,
                },
                success: function (e) {
                    that.canVote = e.canVote;

                    timeline_item.votes += 1;
                    timeline_item.votes_monthly += 1;
                    timeline_item.votedFor = true;
                }
            });
        }
    },
    mounted() {
        this.timelineData = this.init_timelinedata;
        this.canVote = this.init_canVote;

        if (!sessionStorage.getItem("politics")) {
            sessionStorage.setItem("politics", false);
        } else {
            this.politics = (sessionStorage.getItem("politics") == "true");
        }
    },
    data() {
        return {
            timelineData: [],
            canVote: false,
            politics: false,
        }
    }
}, {
    init_timelinedata: window.timeline.data,
    init_canVote: window.timeline.canVote,
}).use(vuetify).mount('#timeline');