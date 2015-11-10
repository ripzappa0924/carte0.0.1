<?php
class BloodtestsController  extends AppController{
public $uses = array('Patient','Bloodtest');

public function top($id=null){
	if(!$id){
    	throw new NotFoundException(__('そのような患者さんはいません'));
    }
    
    $option=array(
	    		'conditions'=>array('patient_id'=>$id)
	       	);
    
    $blood=$this->Bloodtest->find('all',$option);
    $this->set('blood',$blood);
    $this->set('id',$id);
}


public function add($id=null){
	if($this->request->is('get')){
		$this->Bloodtest->create();
		$data=array(
		'patient_id'=>$id
		);
		if($this->Bloodtest->save($data)){
			$this->Session->setFlash(__('採血オーダーを取得しました'));
    		$this->redirect($this->referer());
    	}	    		
    	$this->Session->setFlash(__('なぜか予約できませんでした'));
	}	
}

public function delete($id=null){
	if($this->request->is('get')){
	$this->Bloodtest->delete($id);
	$this->Session->setFlash(__('採血オーダーを削除しました'));
    $this->redirect($this->referer());
	}
	$this->Session->setFlash(__('なぜか削除できませんでした'));
}

public function edit($id=null){
	
	$this->Bloodtest->id=$id;
	
	if($this->request->is('get')){
	$this->request->data=$this->Bloodtest->read();
	}
	
	if($this->request->is('post')){
		$blooddata=$this->Bloodtest->save($this->request->data);
	
		if($blooddata){
			$this->Session->setFlash(__('採血データを保存しました'));
			
			$p=$this->Bloodtest->find('first',array(
			'condition'=>array('id'=>$this->Bloodtest->id),
			'fields'=>array('patient_id')));
			
			$this->redirect(array(
    			'controller'=>'bloodtests',
    			'action'=>'top',
    			$p['Bloodtest']['patient_id']
    		));	
    		
    		
		}
	
	}
	
	
	

	
	
	
}












}
