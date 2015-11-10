<!-- app/View/Medications/top.ctp-->
<h3>処方オーダー</h3>

<h4><?php
		echo $this->Html->link('この患者のトップに戻る',
		array('controller'=>'patients','action'=>'consult',$id));
	?>
</h4>

<h4><?php
		echo $this->Html->link('名前で検索',
		array('controller'=>'medications','action'=>'char_search_int',$id));
	?>
</h4>
<h4><?php
		echo $this->Html->link('Do処方を検索',
		array('controller'=>'medications','action'=>'do_search',$id));
	?>
</h4>
