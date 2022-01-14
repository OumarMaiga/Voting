<?php 

    class ImageUploader {
        
        
        public function __construct() {
            
        }

        public function upload($file, $folder) {
            // On initialise la valeur de retour
            $max_size = 5242880; // 5Mo en octe
            $extension = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
            $retour = array(
                'error' => false, 
                'msg' => '', 
                'url' => ''
            );

            // On définit l'extention du fichier puis on le nomme par le timestamp actuel
            if ($file['image']['type'] == 'image/jpeg') { $ext = '.jpeg'; }
            if ($file['image']['type'] == 'image/jpeg') { $ext = '.jpg'; }
            if ($file['image']['type'] == 'image/png') { $ext = '.png'; }
            if ($file['image']['type'] == 'image/gif') { $ext = '.gif'; }
            $nom_fichier = time().$ext;
            
            // Verification de l'extension et de la taille du fichier
            if (!in_array($file['image']['type'], $extension)) {
                $retour['error'] = true;
                $retour['msg'] = 'image_ext';
            }
            if ($file['image']['size'] > $max_size) {
                $retour['error'] = true;
                $retour['msg'] = 'image_file_size';
            }
            // On crée le dossier si cela n'existe pas 
            if(!file_exists($folder)) {
                if (!mkdir($folder, 0777, true)) {
                    $retour['error'] = true;
                    $retour['msg'] = 'create_folder_failed';
                }
            }
            // Upload du fichier
            if (move_uploaded_file($file['image']['tmp_name'], $folder.$nom_fichier)) {
                $url = $folder.$nom_fichier;
                $retour['url'] = $url;
            } else {
                $retour['error'] = true;
                $retour['msg'] = 'image_upload_failed';
            }

            return $retour;
        }

    }