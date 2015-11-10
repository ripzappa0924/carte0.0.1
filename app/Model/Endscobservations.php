<?php
class Endscobservation extends AppModel{
	public $name='Endscobservation';
	public $belongsTo=array('Endscope','Dxname');
}
?>