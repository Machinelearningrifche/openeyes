<?php
?>
<table class="element-data label-values last-left cols-6">
  <tbody>
  <tr>
      <td><div class="data-label">Time:</div></td>
      <td><div class="data-value"><?= CHtml::encode($element->time) ?></div></td>
  </tr>
  <tr>
      <td><div class="data-label">Result:</div></td>
      <td><div class="data-value"><?= CHtml::encode($element->result) . " " . CHtml::encode($element->unit) ?></div></td>
  </tr>
  <tr>
      <td><div class="data-label">Comment</div></td>
      <td><div class="data-value"><?= CHtml::encode($element->comment) ?></div></td>
  </tr>
  </tbody>
</table>