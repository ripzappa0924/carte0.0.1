<!-- app/View/Bloodtests/consult.ctp-->

<?php
		echo $this->Html->link('カルテ記載',
		array('controller'=>'cartes','action'=>'add',$patient['Patient']['id']));
?><||>


<?php
		echo $this->Html->link('採血',
		array('controller'=>'bloodtests','action'=>'top',$patient['Patient']['id']));
?><||>	
<?php
		echo $this->Html->link('内視鏡',
		array('controller'=>'endscopes','action'=>'add',$patient['Patient']['id']));
?><||>
<?php
		echo $this->Html->link('処方',
		array('controller'=>'medications','action'=>'top',$patient['Patient']['id']));
?>
<br/>
<br/>

<h2><?php echo h($patient['Patient']['name']);?><small>さん</small></h2>

<ul>

<li>ID:<?php echo h($patient['Patient']['id']);?>---性別:<?php echo h($patient['Patient']['sex']);?></li>
<li>生年月日:<?php echo h($patient['Patient']['birthday']);?></li>


<li>最終受診日:<?php echo date('Y/m/d',strtotime(h($patient['Patient']['lastvisit_date'])));?>
---初診日:<small><?php echo date('Y/m/d',strtotime(h($patient['Patient']['created'])));?></small></li>

<?php foreach($patient['Dx']as $dx):?>
<li>診断名:<?php echo h($dx['Dxname']['diagnosis']);?>-<?php echo date('Y/m/d',strtotime(h($dx['created'])));?>～</li>
</ul>
<?php endforeach;?>
<li>コメント:<?php echo h($patient['Patient']['comment']);?></li> 
<ul>
<br/>


<br/>

<?php foreach ($patient['Carte'] as $carte): ?>
<li><big><?php echo h($carte['created']);?></big></li>

<?php if(!$carte) {;?>
記載無し
<?php }else{;?>

<li>S:<?php echo h($carte['object']);?></li>
<li>O:<?php echo h($carte['subject']);?></li>
<li>A:<?php echo h($carte['assessment']);?></li>
<li>P:<?php echo h($carte['plan']);?></li>
<br/>
<?php };?>

<?php endforeach;?>

</ul>


</body>