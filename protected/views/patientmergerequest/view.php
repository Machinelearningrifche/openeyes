<?php
/* @var $this PatientMergeRequestController */
/* @var $model PatientMergeRequest */

?>

<h1 class="badge">View PatientMergeRequest #<?php echo $model->id; ?></h1>

<div id="patientMergeWrapper" class="container content">
    
    <div class="row">
        <div class="large-3 column large-centered text-right large-offset-9">
            <section class="box dashboard">
            <?php 
                echo CHtml::link('list',array('patientMergeRequest/index'), array('class' => 'button small'));
                echo CHtml::link('create',array('patientMergeRequest/create'), array('class' => 'button small secondary'));
            ?>
            </section>
        </div>
    </div>

<div class="row">
    <div class="large-8 column large-centered">


        <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'itemsCssClass' => 'grid',
                    'dataProvider' => $dataProvider,
                    'summaryText' => '<h3><small> {start}-{end} of {count} </small></h3>',
                    'htmlOptions' => array('id' => 'patientMergeList'),
                    'columns' => array('log')
                ));
            ?>
        <br>
    </div>
</div>
