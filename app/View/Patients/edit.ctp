<h2>患者さん情報の編集</h2>
<?php 
echo $this->Form->create('Patient',array('action'=>'edit'));
echo $this->Form->input('name',array('legend'=>'氏名'));
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