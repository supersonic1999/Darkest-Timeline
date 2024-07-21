<v-timeline>
    <template v-for="(item) in timelineData">
        <v-timeline-item v-if="checkPolitics(item)" v-intersect="onIntersect" :dot-color="item.dotColor" :icon="item.icon">
            <template v-slot:opposite>
                <h3>{{ item.date }}</h3>
            </template>
            <v-hover v-slot="{ isHovering, props }">
                <v-card v-ripple v-bind="props" border="md" :color="item.position != '' ? 'success' : ''">
                    <v-card-item>
                        <v-card-title class="timeline-title d-flex justify-space-between">
                            <div>
                                <h5 class="d-inline">{{ item.title }}</h5>
                                <i v-if="item.votedFor" class="ms-3 fa-solid fa-check text-success" title="Voted for"></i>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <i v-if="item.is_political" class="fa-solid fa-landmark" title="Potentially Political"></i>

                                <div v-if="item.position" class="d-flex align-items-center gap-1">
                                    <p class="mb-0">
                                        <small v-if="item.position == 1">1st</small>
                                        <small v-else-if="item.position == 2">2nd</small>
                                        <small v-else-if="item.position == 3">3rd</small>
                                    </p>
                                    <v-icon icon="fa-solid fa-medal"></v-icon>
                                </div>
                            </div>
                        </v-card-title>

                        <v-card-subtitle>
                            Votes: {{ item.votes_monthly }} (All Time: {{ item.votes }})
                        </v-card-subtitle>
                    </v-card-item>

                    <v-card-text>
                        <p class="mb-2">{{ item.text }}</p>
                        <p v-if="item.suggester" class="mb-0">
                            <small>Suggested by {{ item.suggester }}</small>
                        </p>
                    </v-card-text>

                    <v-overlay v-if="canVote" :model-value="isHovering" class="align-center justify-center" scrim="#036358" contained>
                        <v-btn :ripple="true" @click="vote($event, item)">Vote as Beginning</v-btn>
                    </v-overlay>
                </v-card>
            </v-hover>
        </v-timeline-item>
    </template>
</v-timeline>

<settings @toggle-politics="togglePolitics"></settings>