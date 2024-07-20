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
    components,
    directives,
    data() {
        return {
            timelineData: [
                {
                    date: '1990',
                    dotColor: 'red',
                    icon: 'fa-solid fa-money-bill',
                    title: 'Donald Trump',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
                },
                {
                    date: '1990',
                    dotColor: 'red',
                    icon: 'fa-solid fa-money-bill',
                    title: 'Harambe',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
                },
                {
                    date: '1990',
                    dotColor: 'red',
                    icon: 'fa-solid fa-money-bill',
                    title: 'Harambe',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
                },
                {
                    date: '1990',
                    dotColor: 'red',
                    icon: 'fa-solid fa-money-bill',
                    title: 'Harambe',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
                },
                {
                    date: '1990',
                    dotColor: 'red',
                    icon: 'fa-solid fa-money-bill',
                    title: 'Harambe',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
                },
                {
                    date: '1990',
                    dotColor: 'red',
                    icon: 'fa-solid fa-money-bill',
                    title: 'Harambe',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
                },
                {
                    date: '1990',
                    dotColor: 'red',
                    icon: 'fa-solid fa-money-bill',
                    title: 'Harambe',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies tincidunt urna, vel consectetur massa lobortis sit amet. Cras quis diam ut erat suscipit interdum nec eu tortor. Cras ac velit quis metus convallis dictum quis a tellus.',
                }
            ],
        }
    }
}).use(vuetify).mount('#timeline')