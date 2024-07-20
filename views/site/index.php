<?php
$this->title = 'Darkest Timeline';
?>

<div class="site-index">
    <div class="body-content">
        <div id="about" class="my-5">
            <div class="text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dignissim urna eu turpis accumsan
                    venenatis. Morbi turpis libero, fringilla eget tincidunt id, dictum sed nunc. Nunc molestie varius
                    tincidunt. In convallis nisi lacus, quis congue dui auctor id. Fusce sed sollicitudin tellus, at
                    luctus
                    tortor. Suspendisse potenti. Nullam vel risus vitae tortor sodales volutpat. Pellentesque cursus
                    sapien
                    bibendum orci placerat, eu molestie sem bibendum. Aenean sed eleifend ante. Quisque vulputate felis
                    orci, eu tempus diam accumsan quis. Sed egestas blandit metus, a dictum turpis eleifend sed.
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    Vestibulum
                    ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus vel maximus
                    est.
                </p>
            </div>
        </div>

        <div id="timeline">
            <v-timeline>
                <v-timeline-item v-for="(item) in timelineData" :dot-color="item.dotColor" :icon="item.icon">
                    <template v-slot:opposite>
                        <h3>{{ item.date }}</h3>
                    </template>
                    <div>
                        <div class="text-h6">{{ item.title }}</div>
                        <p>{{ item.text }}</p>
                    </div>
                </v-timeline-item>
            </v-timeline>
        </div>

        <div id="suggest" class="my-5">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Suggest New Event
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?=
                                $this->render('contact', [
                                    'contactModel' => $contactModel,
                                ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>