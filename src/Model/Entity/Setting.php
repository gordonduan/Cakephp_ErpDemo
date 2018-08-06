<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Datasource\ConnectionManager;

class Setting extends Entity {
    public $useTable = false;
     /**
     * Exporte la base de donnees dans un format .sql
     * un fichier est cree dans App/webroot/files/sql_dump
     * un autre fichier est telecharge dans par le navigateur
     *
     * @access  public
     * @return  string|null     le nom de la base, null si erreur
     */
    public function exportDatabase() {
        /**
         * Recupere la configuration de la base de donnees
         */
//        App::uses('ConnectionManager', 'Model');
//        $dataSource = ConnectionManager::getDataSource('default');
        $dataSource = ConnectionManager::get('default');
        $database = $dataSource->config['database'];
        // commentaires sql de l'en-tete
        $content  = "--\n";
        $content .= "-- Pierre Baron \n";
        $content .= "-- export de la base `".$database."` au ".date("d-m-Y")."\n";
        $content .= "--\n\n\n";
        // commentaires sql
        $content .= "-- -----------------------------\n";
        $content .= "-- creation de la base `".$database."`\n";
        $content .= "-- -----------------------------\n";
        $content .= "CREATE DATABASE `" .$database. "` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;\n";
        $content .= "USE `" + $database +"`;\n\n";
        $content .= "-- --------------------------------------------------------\n\n";
        $tables = $this->query('show tables');
        foreach($tables as $k => $v){
            foreach($v['TABLE_NAMES'] as $table) {
                // commentaires sql
                $content .= "--\n";
                $content .= "-- Structure de la table `".$table."`\n";
                $content .= "--\n";
                $structures = $this->query("show create table `".$table."`");
                foreach($structures as $s) {
                    $content .= $s[0]['Create Table'].";\n\n";
                    $content .= "--\n";
                    $content .= "-- entrees dans la table `".$table."`\n";
                    $content .= "--\n";
                    $entries = $this->query("SELECT * FROM `".$table."`");
                    foreach($entries as $entry) {
                        $content .= "INSERT INTO ".$table." (";
                        /**
                        * on entre tous les champs a remplir
                        * ce sont les cles du tableau $e[$table]
                        */
                        $i = 0;
                        foreach($entry[$table] as $entryKey => $vv) {
                            $entryKey = addslashes($entryKey);
                            $content .= "`".$entryKey."`";
                            $i++;
                            if($i < count($entry[$table]))
                                $content .=", ";
                        }
                        $content .= ") VALUES (";
                        /**
                        * on entre toutes les entrees
                        * ce sont les valeurs du tableau $e[$table]
                        */
                        $j = 0;
                        foreach($entry[$table] as $ee => $entryValue) {
                            $entryValue = addslashes($entryValue);
                            debug($entryValue);
                            $content .= "'".$entryValue."'";
                            $j++;
                            if($j < count($entry[$table]))
                                $content .=", ";
                        }
                        $content .= ");\n";
                    }
                    $content .= "\n\n";
                    $content .= "-- --------------------------------------------------------\n\n\n";
                }
            }
        }
        /**
         * Cree le fichier de sauvegarde.
         * il se trouve dans "app/webroot/files/sql_dump/"
         */
        App::uses('File', 'Utility');
        $filename = "files".DS."sql_dump".DS .$database. "_" .date("d-m-Y_H-i-s"). ".sql";
        $file = new File($filename, true);
        $d['file'] = $filename;
        $d['database'] = $database;
        if($file->append($content, true)) {
            return $d;
        } else {
            return false;
        }
    }
}