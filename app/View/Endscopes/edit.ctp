<!-- app/View/Endscopes/edit.ctp-->
<h2>内視鏡予約</h2>

<table>
<tr>
<td id='09:00'></td>
<td id='09:15'></td>
<td id='09:30'></td>
<td id='09:45'></td>
<td id='10:00'></td>
<td id='10:15'></td>
<td id='10:30'></td>
<td id='10:45'></td>
<td id='11:00'></td>
</tr>
</table>

<?php $title[0]='';?>  
<?php for($k=0;$k<=120;$k=$k+15){
 $title[]=date("H:i",strtotime("09:00 $k minute"));
}?>

<table>
<?php echo $this->Html->tableHeaders($title);?>
<?php $count=0;?>

<?php for($i=0;$i<=7;$i++){;?>
	
	<?php $date=date("Y-m-d",strtotime("$i day"));?>
	<tr><th><?php echo $date; ?></th>

		<?php for($j=0;$j<=120;$j=$j+15){;?>
			<?php $time=date("H:i:s",strtotime("09:00:00 $j minute"));?>
			<?php foreach($endscopes as $endscope):?>
				<?php if($endscope['Endscope']['reservationtime']==$time and $endscope['Endscope']['reservationdate']==$date){;?>
				
					<td><?php echo $this->Html->link('×',
		            array('controller'=>'endscopes','action'=>'edit',$endscope['Endscope']['id']));?>
		            </td>
				<?php $count=1;?>
				<?php };?>
			<?php endforeach ;?>
				<?php if($count==1){;?>
					<?php $count=0;?>
				<?php }else{;?>
					<td><?php echo '空';?></td>
					<?php $count=0;?>
					<?php };?>
		<?php }	;?>	
			
	
		
<?php };?></tr>
</table>


<?php 
	echo $this->Form->create('Endscope');
	echo $this->Form->input('reservationdate', array(
    'type' => 'date',
    'label' => '年月日',
    'monthNames' => false,
    'empty' => false,
    'minYear' => date('Y'),
    'maxYear' => date('Y')+1,
	));
	echo $this->Form->input('reservationtime',array(
	'interval'=>15,
	'label' => '予約時間'
	));
	echo $this->Form->input('medicine');
	echo $this->Form->input('comment');
	echo $this->Form->end('保存');


?>















