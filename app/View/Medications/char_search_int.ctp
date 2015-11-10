<!-- app/View/Medications/top.ctp-->
<h3>名前で検索</h3>

<?php echo $this->element('searchFormDrug')?>  





<h4><?php
		echo $this->Html->link('この患者のトップに戻る',
		array('controller'=>'patients','action'=>'consult',$id));
	?>
</h4>
