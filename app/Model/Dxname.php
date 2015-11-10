<?php
class Dxname extends AppModel{
	public $name='Dxname';
	public $hasMany=array('Dx','Endscobservation');
}
?>