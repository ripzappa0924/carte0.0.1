<!--carte2/app/View/Elements/searchFormDrug.ctp-->
  
<?php echo $this->Form->create('Drug')?>  
  
<fieldset>  
  <legend>薬品名検索</legend>  
  <dl>  
    
    <dt><label>商品名</label></dt>  
    <dd><?php echo $this->Form->input('productName', array(  
       'type'=>'text','div' => false, 'label' => false));?></dd>  

  </dl>  
  
  <?php echo $this->Form->submit('検索')?>  
  
</fieldset>  
  
<?php echo $this->Form->end()?>  