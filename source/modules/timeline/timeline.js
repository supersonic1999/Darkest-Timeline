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

const data = [
    {
        date: '1990',
        dotColor: 'red',
        icon: 'fa-solid fa-money-bill',
        title: 'Donald Trump',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
        suggester: 'Anon',
    },
    {
        date: '1990',
        dotColor: 'red',
        icon: 'fa-solid fa-money-bill',
        title: 'Harambe',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
        suggester: 'Anon',
    },
    {
        date: '1990',
        dotColor: 'red',
        icon: 'fa-solid fa-money-bill',
        title: 'Harambe',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
        suggester: 'Anon',
    },
    {
        date: '1990',
        dotColor: 'red',
        icon: 'fa-solid fa-money-bill',
        title: 'Harambe',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
        suggester: 'Anon',
    },
    {
        date: '1990',
        dotColor: 'red',
        icon: 'fa-solid fa-money-bill',
        title: 'Harambe',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
        suggester: 'Anon',
    },
    {
        date: '1990',
        dotColor: 'red',
        icon: 'fa-solid fa-money-bill',
        title: 'Harambe',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
        suggester: 'Anon',
    },
    {
        date: '1990',
        dotColor: 'red',
        icon: 'fa-solid fa-money-bill',
        title: 'Harambe',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',suggester: 'Anon',
    }
];

createApp({
    components,
    directives,
    props: [
        'init_timelinedata',
    ],
    mounted() {
        this.timelineData = this.init_timelinedata;
    },
    data() {
        return {
            timelineData: [],
        }
    }
}, {
    init_timelinedata: data,
}).use(vuetify).mount('#timeline');