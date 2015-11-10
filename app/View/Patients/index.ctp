<!--carte2View/patients/index-->

<h1>患者リスト</h1>
<?php echo $this->Html->link('新規追加',array('action'=>'add'));?>



<?php echo $this->element('searchFormPatient')?>  


<?php echo $this->element('pager')?>  
<table>
<tr>
<th><?php echo $this->Paginator->sort('Patient.id', '患者ID')?></th>
<td><?php echo $this->Paginator->sort('Patient.name', '名前')?></td>
<td>操作</td>
<td><?php echo $this->Paginator->sort('Patient.sex', '性別')?></td>
<td><?php echo $this->Paginator->sort('Patient.insuranceid', '保険証番号')?></td>
<td><?php echo $this->Paginator->sort('Patient.lastvisit_date', '最終受診日')?></td>
<td><?php echo $this->Paginator->sort('Patient.created', '初診日')?></td>
<td><?php echo $this->Paginator->sort('Patient.comment', 'コメント')?></td>
</tr>

<tr>
<?php foreach($patients as $patient):?>
<th><?php echo $patient['Patient']['id'];?></th>
<td><?php
		echo $this->Html->link($patient['Patient']['name'],
		array('action'=>'view',$patient['Patient']['id']));
	?>
</td>
<td>
	<?php
		echo $this->Html->link('受診',
		array('controller'=>'visitors','action'=>'visit',$patient['Patient']['id']));
	?> 
	<?php
		echo $this->Html->link('診察',
		array('controller'=>'patients','action'=>'consult',$patient['Patient']['id']));
	?>
	
</td>
	
<td><?php echo $patient['Patient']['sex'];?></td>
<td><?php echo $patient['Patient']['insuranceid'];?></td>
<td><?php echo date('Y/m/d',strtotime(h($patient['Patient']['lastvisit_date'])));?></td>
<td><?php echo date('Y/m/d',strtotime(h($patient['Patient']['created'])));?></td>
<td><?php echo $patient['Patient']['comment'];?></td>

</tr>
<?php endforeach;?>


</table>

