<?php
/**
 * @var $this TrialContext
 */
?>
<?php
$shortlisted_code = TrialPatientStatus::SHORTLISTED_CODE;
$accepted_code = TrialPatientStatus::ACCEPTED_CODE;
$rejected_code = TrialPatientStatus::REJECTED_CODE;
$shortlisted_status = TrialPatientStatus::model()->find('code = ?', array($shortlisted_code));
$accepted_status = TrialPatientStatus::model()->find('code = ?', array($accepted_code));
$rejected_status = TrialPatientStatus::model()->find('code = ?', array($rejected_code));

$current_patient_status_id = $this->isPatientInTrial() ? $this->getPatientTrialStatusId($this->patient->id, $this->trial->id) :'';
?>
<span class="js-add-remove-participant"
      data-patient-id="<?= $this->patient->id ?>"
      data-trial-id="<?= $this->trial->id ?>"
>
<button class="js-add-to-trial button blue hint"
   style="<?= $this->isPatientInTrial() ? 'display:none;' : '' ?>"
>Add to Shortlist</button>

</span>
