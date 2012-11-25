<?php
/**
 * Hier werden Anfragen abgearbeitet und die Artikel ans Model ausgeliefert
 */
class Index_Controller
{

    public $template = 'index';

    public function main(array $getVars) {

    	$indexModel = new Index_Model;

		$view = new View_Model($this->template);
		
		$title = $indexModel->getTitle();
		$content = $indexModel->getContent();
		
		$view->assign('title' , $title);
		$view->assign('content' , $content);

    }
}