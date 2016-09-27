<?php
namespace Controller;

use \W\Controller\Controller;
use \Controller\RechercheController;
use \Model\EtudiantModel;

class DefaultController extends Controller
{
	/**
	* Page d'accueil par défaut
	*/
	public function home()
	{
		// $rechercheController = new RechercheController();
		// $rechercheResults = $rechercheController -> generateRechercheResults();
		$etudiant = new EtudiantModel();
		$lastStudents = $etudiant->getLastStudents();
		
		// $this->show('default/home',array('matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1], 'lastStudentsForView'=>$lastStudents));

		$rechercheController = new RechercheController();
		$rechercheResults = $rechercheController->generateRechercheResults();

		$this->show('default/home',array('matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1], 'lastStudentsForView'=>$lastStudents));
	}


	public function contact()
	{
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
		$destinataire = 'soutien-etudiant@gmail.com';

// copie ? (envoie une copie au visiteur)
		$copie = 'oui';

// Messages de confirmation du mail
		$message_envoye = "Votre message nous est bien parvenu !";
		$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

		$message_vue = '';

// on teste si le formulaire a été soumis
		if(isset($_POST['envoi']))
		{


  // formulaire envoyé, on récupère tous les champs.
			$nom     = (isset($_POST['name']))     ? $this->rec($_POST['name'])     : '';
			$email   = (isset($_POST['email']))   ? $this->rec($_POST['email'])   : '';
			$message = (isset($_POST['message'])) ? $this->rec($_POST['message']) : '';

  // On va vérifier les variables et l'email ...
			if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
				if (($nom != '') && ($email != '') && ($message != ''))
				{
    // les 4 variables sont remplies, on génère puis envoie le mail
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
					'Reply-To:'.$email. "\r\n" .
					'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
					'Content-Disposition: inline'. "\r\n" .
					'Content-Transfer-Encoding: 7bit'." \r\n" .
					'X-Mailer:PHP/'.phpversion();

    // envoyer une copie au visiteur ?
					if ($copie == 'oui')
					{
						$cible = $destinataire.';'.$email;
					}
					else
					{
						$cible = $destinataire;
					};


    // Envoi du mail
					$num_emails = 0;
					$tmp = explode(';', $cible);
					foreach($tmp as $email_destinataire)
					{
						if (mail($email_destinataire, $message, $headers))
							$num_emails++;
					}
					
					if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
					{
						$message_vue = $message_envoye;
					}
					else
					{
						$message_vue = $message_non_envoye;
					};
				} else {
					$message_vue = 'Tous les champs sont obligatoires' ;
				}
				
			} else {
				$message_vue = 'email invalide';
			}
		}

		

	$this->show('default/contact', array('message_vue'=>$message_vue));

	}

	public function cgu()
	{
		$this->show('default/cgu');

	}
}