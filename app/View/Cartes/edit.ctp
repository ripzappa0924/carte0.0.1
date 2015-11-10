<!-- app/View/Cartes/edit.ctp-->


<h1><カルテ編集画面></h1>
<?php
echo $this->Form->create('Carte',array('action'=>'edit'));
echo $this->Form->input('subject',array('rows'=>'2'));
echo $this->Form->input('object',array('rows'=>'2'));
echo $this->Form->input('assessment',array('rows'=>'2'));
echo $this->Form->input('plan',array('rows'=>'2'));


echo $this->Form->end('Let\'s 保存');


?>