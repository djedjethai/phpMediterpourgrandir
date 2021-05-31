<?php
namespace OCFram;

class ImageHandler
{
	protected $destination;

	public function __construct($destination) 
	{
		$this->destination = $destination;
	}

	public function checkFile($image)
	{
		if (isset($image) && $image["error"] == 0) {
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
	        $filename = $image["name"];
	        $filetype = $image["type"];
	        $filesize = $image["size"];

	        // Vérifie l'extension du fichier
	        $ext = pathinfo($filename, PATHINFO_EXTENSION);
	        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

	        // Vérifie la taille du fichier - 5Mo maximum
	        $maxsize = 5 * 1024 * 1024;
	        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

	        // Vérifie le type MIME du fichier
	        if(in_array($filetype, $allowed)){
	            // Vérifie si le fichier existe avant de le télécharger.
	            // here i must check in bdd if name of the pic already exist
 	            if(file_exists($this->destination. "/" . $image["name"]))
	            {
	                return $image["name"] . " existe déjà.";
	            } 
	            else 
	            {
	            	// this false return authorize the upload
	                return false;
	            } 
	        } 
	        else 
	        {
	            return "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
	        }
	   }
	}	


	public function uploadFile($image) 
	{
		echo 'image destination';
		var_dump($this->destination);
		$feedBack = move_uploaded_file($image["tmp_name"], $this->destination.'/'.$image["name"]);
		// if true upload success
		return $feedBack;
	    
	}

}
