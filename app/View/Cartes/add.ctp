<!-- app/View/Cartes/add.ctp-->


<h1><カルテ入力画面></h1>
<?php
echo $this->Form->create('Carte');
echo $this->Form->input('subject',array('rows'=>'2'));
echo $this->Form->input('object',array('rows'=>'2'));
echo $this->Form->input('assessment',array('rows'=>'2'));
echo $this->Form->input('plan',array('rows'=>'2'));
echo $this->Form->hidden('visitor_id',array('value'=>$this->request->pass[0]));

echo $this->Form->end('Let\'s 保存');


?>
