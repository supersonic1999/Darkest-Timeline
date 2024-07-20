<?php
$this->title = 'Literally the Darkest Timeline..';
?>

<div id="about" class="my-5">
    <div class="text-center w-100">
        <h3>Welcome to the Darkest Timeline....</h3>
        <p class="text-h6">Cast your vote below</p>
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