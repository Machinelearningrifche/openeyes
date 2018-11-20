<?php
/* @var $this PracticeController */
/* @var $model Practice */
$this->pageTitle = 'Update Practice';
?>

<div>
    <div class="oe-full-header flex-layout">
        <div class="title wordcaps">
            Update <b>Practice</b>
        </div>
    </div>

    <div class="oe-full-content oe-new-patient flex-layout flex-top">
        <?php $this->renderPartial('_form', array('model' => $model, 'address' => $address,'contact' => $contact)); ?>
    </div>
</div>
