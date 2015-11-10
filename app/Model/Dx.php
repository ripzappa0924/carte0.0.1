<?php
class Dx extends AppModel{
	public $name='Dx';
	public $belongsTo=array('Patient','Dxname');
	
}
?>