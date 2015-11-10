<!-- app/View/Bloodstest/top.ctp-->
<h3>採血オーダー</h3>
<h4><?php
		echo $this->Html->link('この患者のトップに戻る',
		array('controller'=>'patients','action'=>'consult',$id));
	?>
</h4>

<h4><?php
		echo $this->Html->link('新規オーダー',
		array('controller'=>'bloodtests','action'=>'add',$id));
	?>
</h4>
<table>
<tr>
<th>予約日</th>
<th>WBC</th>
<th>Ht</th>
<th>CRP</th>
<th>操作</th>
</tr>
<tr><?php foreach($blood as $blood):?>
<td><?php echo $blood['Bloodtest']['modified'];?></td>
<td><?php echo $blood['Bloodtest']['wbc'];?></td>
<td><?php echo $blood['Bloodtest']['ht'];?></td>
<td><?php echo $blood['Bloodtest']['crp'];?></td>
<td><?php
		echo $this->Html->link('予約削除',
		array('controller'=>'bloodtests','action'=>'delete',$blood['Bloodtest']['id']));
	?>
	<?php
		echo $this->Html->link('データ入力/修正',
		array('controller'=>'bloodtests','action'=>'edit',$blood['Bloodtest']['id']));
	?>
</td>
</tr>
<?php endforeach;?>

</table>

