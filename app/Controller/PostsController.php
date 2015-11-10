<?php
class PostsController  extends AppController{

function index($id=null){
	$post = $this->Post->find('all');
	$this->set('posts',$post);	
}

function index_sub($id=null){
	$con=array(
	'conditions'=>array('Post.category'=>2),
	'order'=>array('Post.id DESC')
	);
	$post = $this->Post->find('all',$con);
	$this->set('posts',$post);
}

function category($id=null){
	$this->Post->category=$id;
	$con=array(
	'conditions'=>array('Post.category'=>$id),
	'order'=>array('Post.id desc')
	);
	$post = $this->Post->find('all',$con);
	$this->set('posts',$post);
}
function id($id=null){
	$this->Post->id=$id;
	$con=array(
	'conditions'=>array('Post.id'=>$id),
	'order'=>array('Post.id desc')
	);
	$post = $this->Post->find('all',$con);
	$this->set('posts',$post);
}






}
