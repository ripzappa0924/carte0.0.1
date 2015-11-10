<?php
class Meddetail extends AppModel{
	
	public $name='Meddetail';
	public $belongsTo=array('Medication','Drug');
	
	
	
}
?>