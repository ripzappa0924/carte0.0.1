<?php
class Drug extends AppModel{
	public $name='Drug';
	public $hasMany=array('Medication','Taboo');
	
}
?>