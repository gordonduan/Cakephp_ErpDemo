<?php

namespace App\Controller;

use App\Controller\AppController;

class SettingsController extends AppController {
    public function index(){}
	/**
	 * Exporte la base de donnees
	 *
 	 * @access	public
	 * @return	void
	 */
	public function export() {
		/**
		 * on recupere le nom du fichier exporte
		 *
		 * La methode exportDatabase() est definie dans app/Model/Setting.php
		 */
		$d = $this->Setting->exportDatabase();
		/**
		 * si le fichier existe bien
		 * On va l'enregistrer sur l'ordinateur
		 */
		if($d['database']){
            // message de succès
		}
		// redirection
	}	
}