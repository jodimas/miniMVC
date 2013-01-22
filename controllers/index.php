<?php
/**
 * Hier werden Anfragen abgearbeitet und die Artikel ans Model ausgeliefert
 */
class Index_Controller
{

	// template festlegen
    public $template = 'index';

    public function main(array $getVars) {
   		
    	// indexModel intantiieren
    	$indexModel = new Index_Model;

    	// view instantieren
		$view = new View_Model($this->template);

		// daten holen
		$title = $indexModel->getTitle();
		$content = $indexModel->getContent();

		// daten an view schicken
		$view->assign('title' , $title);
		$view->assign('content' , $content);

    }
}

?>