<?php
$this->title = 'Literally the Darkest Timeline..';
?>

<script>
    window.timeline = [];
    window.timeline.data = <?= json_encode($timelineData) ?>;
    window.timeline.canVote = <?= json_encode($canVote) ?>;
</script>

<div id="about">
    <div class="row gy-3">
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <div class="w-100">
                <h3>When did we enter the Darkest Timeline? <i>or have we.....</i></h3>
                <br>
                <p class="mb-0 text-h6">View community votes and cast your own below.</p>
                <p><small>(Votes reset at start of the month.)</small></p>
            </div>
        </div>

        <div class="col-md-6">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/euu9TWw1R8U?si=b0UHW8_YzxEENGZd"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</div>

<div id="timeline">
    <?=
        $this->render('timeline', [
            'timelineData' => $timelineData,
        ]);
    ?>
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