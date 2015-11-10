<!-- app/View/Patients/view.ctp-->


<h2><?php echo h($patient['Patient']['name']);?><small>さん</small></h2>
<?php
		echo $this->Html->link('編集',
		array('controller'=>'patients','action'=>'edit',$patient['Patient']['id']));
?>
<ul>
<li>患者ID:<?php echo h($patient['Patient']['id']);?></li>
<li>性別:<?php echo h($patient['Patient']['sex']);?></li>
<li>住所:<?php echo h($patient['Patient']['address']);?></li>
<li>保険証番号:<?php echo h($patient['Patient']['insuranceid']);?></li>
<li>最終受診日:<?php echo h($patient['Patient']['lastvisit_date']);?></li>
<li>初診日:<?php echo h($patient['Patient']['created']);?></li>


<?php foreach($patient['Dx'] as $dx):?>
<li>診断名:<?php echo h($dx['Dxname']['diagnosis']);?>---診断日:<?php echo h($dx['created']);?></li>
<?php endforeach;?>
<li>コメント:<?php echo h($patient['Patient']['comment']);?></li> 
</ul>




