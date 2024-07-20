<v-timeline>
    <v-timeline-item v-for="(item) in timelineData" :dot-color="item.dotColor" :icon="item.icon">
        <template v-slot:opposite>
            <h3>{{ item.date }}</h3>
        </template>
        <div>
            <div class="text-h6">{{ item.title }}</div>
            <p class="mb-1">{{ item.text }}</p>
            <p v-if="item.suggester" class="mb-0"><small>suggested by <span>{{ item.suggester }}</span></small></p>
        </div>
    </v-timeline-item>
</v-timeline>