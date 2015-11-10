<!-- app/View/Bloodtests/edit.ctp-->
<h3>採血データ入力/修正</h3>

<?php 
	echo $this->Form->create('Bloodtest');
	echo $this->Form->input('modified',array('label'=>'施行日'));
	echo $this->Form->input('wbc',array('label'=>'WBC'));
	echo $this->Form->input('ht',array('label'=>'Ht'));
	echo $this->Form->input('crp',array('label'=>'CRP'));
	echo $this->Form->end('保存');


?>

</table>

