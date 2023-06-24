<?php	
	defined('_JEXEC') or die;
	require_once dirname(__FILE__).'/helper.php';
	
	$valeurGreffe =  $params->get("greffe")
	
	$json = file_get_contents('https://opendata.datainfogreffe.fr/api/records/1.0/search/?dataset=entreprises-immatriculees-en-'.date('Y').'&q=&sort=date_immatriculation&facet=siren&facet=forme_juridique&facet=code_ape&facet=ville&facet=region&facet=greffe&facet=date_immatriculation&facet=statut&refine.greffe='.$valeurGreffe);
	$hello = modEntJCA::getEntJCA($json);
	require JModuleHelper::getLayoutPath('mod_entjca');
	$document = JFactory::getDocument()->addStyleSheet("modules/mod_entjca/style.css");
	
	echo "<div style=\"text-align:left;\">";
	
	foreach($hello["records"] as $une_entreprise)
	{
			echo '<div class="une-entreprise">';
			echo '<div class="titre">'.$une_entreprise["fields"]["denomination"].'</div>';
			echo '<div class="url-fiche-identite"><a href="'.$une_entreprise["fields"]["fiche_identite"].'" target="_blank">'.$une_entreprise["fields"]["fiche_identite"].'</a></div>';
			echo '<div class="statut-entreprise">'.$une_entreprise["fields"]["statut"].'</div>';
			echo '<div class="denomination">'.$une_entreprise["fields"]["denomination"].'</div>';
			echo '<div class="siren">'.$une_entreprise["fields"]["siren"].'</div>';
			echo '<div class="date_immatriculation">'.$une_entreprise["fields"]["date_immatriculation"].'</div>';
			echo '<div class="ville">'.$une_entreprise["fields"]["ville"].'</div>';
			echo '<div class="geolocalisationLatitude">'.$une_entreprise["fields"]["geolocalisation"][0].'</div>';
			echo '<div class="geolocalisationLongitude">'.$une_entreprise["fields"]["geolocalisation"][1].'</div>';
			echo '<div class="adresse">'.$une_entreprise["fields"]["adresse"].'</div>';
			echo '<div class="code_postal">'.$une_entreprise["fields"]["code_postal"].'</div>';
			echo '<div class="departement">'.$une_entreprise["fields"]["departement"].'</div>';
			
			echo '<div class="devise">'.$une_entreprise["fields"]["devise"].'</div>';
			echo '<div class="nic">'.$une_entreprise["fields"]["nic"].'</div>';
			echo '<div class="forme_juridique">'.$une_entreprise["fields"]["forme_juridique"].'</div>';
			echo '<div class="region">'.$une_entreprise["fields"]["region"].'</div>';
			echo '<div class="num_dept">'.$une_entreprise["fields"]["num_dept"].'</div>';
			echo '<div class="date_de_publication">'.$une_entreprise["fields"]["date_de_publication"].'</div>';
			echo '<div class="date_immatriculation_origine">'.$une_entreprise["fields"]["date_immatriculation_origine"].'</div>';
			echo '<div class="greffe">'.$une_entreprise["fields"]["greffe"].'</div>';
			echo '<div class="etat">'.$une_entreprise["fields"]["etat"].'</div>';
			echo '<div class="code_greffe">'.$une_entreprise["fields"]["code_greffe"].'</div>';
			
			echo '<div class="etat_pub">'.$une_entreprise["fields"]["etat_pub"].'</div>';
			echo "</div>";
			//echo '<div class="">'.$une_entreprise["fields"][""].'</div>';
			//print_r($une_entreprise);
			//print_r($une_entreprise);
		
	}
	
	
	
	echo "</div>";