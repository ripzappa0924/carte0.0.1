<?php
class CartesController  extends AppController{
public $uses = array('Visitor','Patient','Carte');



public function add($id=null){
	if($this->request->is('post')){
    	
    	$this->Carte->create();
    		
    	if($this->Carte->save($this->request->data)){
    		$data=array(
    			'id'=>$this->Carte->id,
    			'patient_id'=>$id
    		);
    		$this->Carte->save($data);
    		$this->Session->setFlash(__('カルテを保存しました'));
    		
    		$this->redirect(array(
    		'controller'=>'patients',
    		'action'=>'consult',$id));
    	}	    		
    	$this->Session->setFlash(__('なぜか保存できませんでした'));
    }
}

public function edit($id=null){
 $this->Carte->id=$id;
    if($this->request->is('get')){
    	$this->request->data=$this->Carte->read();
    }else{
    	$p=$this->Carte->find(
    		'first',
	    		array(
	    		'conditions'=>array('Carte.id'=>$this->Carte->id),
		    	'field'=>'Carte.visitor_id'
		    	)
	    	);
	    	
	    	$p_id=$p['Visitor']['patient_id'];
	    	
    	if($this->Carte->save($this->request->data)){
    		
    		$this->Session->setFlash('カルテ情報を変更しました');
			$this->redirect(array('controller'=>'visitors','action'=>'index',$p_id));
    	}else{
    		
    		$this->Session->setFlash('保存に失敗しました');
			$this->redirect(array('controller'=>'visitors','action'=>'index',$p_id));
    	}
    }	
    	
} 




}





