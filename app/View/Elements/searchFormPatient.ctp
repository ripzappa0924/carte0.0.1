  
<?php echo $this->Form->create('Patient')?>  
  
<fieldset>  
  <legend>患者検索</legend>  
  <dl>  
    <dt><label>ID</label></dt>  
    <dd><?php echo $this->Form->input('id', array(  
      'type'=>'text','div' => false, 'label' => false))?></dd>  
    <dt><label>患者名</label></dt>  
    <dd><?php echo $this->Form->input('name', array(  
       'type'=>'text','div' => false, 'label' => false));?></dd>  

  </dl>  
  
  <?php echo $this->Form->submit('検索')?>  
  
</fieldset>  
  
<?php echo $this->Form->end()?>  