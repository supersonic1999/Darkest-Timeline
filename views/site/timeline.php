<v-timeline>
    <template v-for="(item) in timelineData">
        <v-timeline-item v-intersect="onIntersect" :dot-color="item.dotColor" :icon="item.icon">
            <template v-slot:opposite>
                <h3>{{ item.date }}</h3>
            </template>
            <v-hover v-slot="{ isHovering, props }">
                <v-card v-bind="props" border="md" :color="item.winning ? 'success' : ''">
                    <v-card-item :append-icon="item.winning ? 'fa-solid fa-medal' : ''">
                        <v-card-title class="timeline-title">
                            <h5 class="d-inline">{{ item.title }}</h5>
                            <i v-if="item.voted" class="ms-3 fa-solid fa-check text-success"></i>
                        </v-card-title>

                        <v-card-subtitle>
                            Votes: {{ item.votes }}
                        </v-card-subtitle>
                    </v-card-item>

                    <v-card-text>
                        <p class="mb-2">{{ item.text }}</p>
                        <p v-if="item.suggester" class="mb-0">
                            <small>Suggested by {{ item.suggester }}</small>
                        </p>
                    </v-card-text>

                    <v-overlay v-if="!voted" :model-value="isHovering" class="align-center justify-center" scrim="#036358" contained>
                        <v-btn :ripple="true" @click="vote($event)">Vote as Beginning</v-btn>
                    </v-overlay>
                </v-card>
            </v-hover>
        </v-timeline-item>
    </template>
</v-timeline>

<settings @toggle-politics="togglePolitics"></settings>