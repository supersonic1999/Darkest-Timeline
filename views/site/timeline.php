<script>
    window.timelineData = <?= json_encode($timelineData) ?>;
</script>

<v-timeline>
    <template v-for="(item) in timelineData">
        <v-timeline-item 
            v-intersect="onIntersect"
            :dot-color="item.dotColor"
            :icon="item.icon"
        >
            <template v-slot:opposite>
                <h3>{{ item.date }}</h3>
            </template>
            <v-card>
                <v-card-item>
                    <v-card-title class="timeline-title">
                        <h5 class="d-inline">{{ item.title }}</h5>
                        <i
                            v-if="item.suggester"
                            class="ms-3 fa-solid fa-circle-info"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            :title="'Suggested by ' + item.suggester"
                        ></i>
                    </v-card-title>

                    <v-card-subtitle>
                        Votes: 10
                    </v-card-subtitle>
                </v-card-item>

                <v-card-text>
                    <p class="mb-0">{{ item.text }}</p>
                </v-card-text>

                <v-card-actions>
                    <v-btn
                        variant="tonal"
                        :ripple="true"
                    >Vote as Beginning</v-btn>
                </v-card-actions>
            </v-card>
        </v-timeline-item>
    </template>
</v-timeline>