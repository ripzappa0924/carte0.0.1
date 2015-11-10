<!--View/Patients/add-->

<h2>患者さんの追加</h2>
<?php 
	echo $this->Form->create('Patient');
	echo $this->Form->input('name');
	echo $this->Form->radio('sex',
		array('M'=>'男','F'=>'女'
		)
	);
	echo $this->Form->input('birthday');
	echo $this->Form->input('insuranceid');
	echo $this->Form->input('address');
	echo $this->Form->input('comment');
	echo $this->Form->end('保存');


?>