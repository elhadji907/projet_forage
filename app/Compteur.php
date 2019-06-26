<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 27 May 2019 20:16:13 +0000.
 */

namespace App;
use App\Facture;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Compteur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero_serie
 * @property int $administrateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Administrateur $administrateur
 * @property \Illuminate\Database\Eloquent\Collection $abonnements
 * @property \Illuminate\Database\Eloquent\Collection $consommations
 *
 * @package App
 */
class Compteur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;use \App\Helpers\UuidForKey;

	protected $casts = [
		'administrateurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero_serie',
		'administrateurs_id'
	];

	public function administrateur()
	{
		return $this->belongsTo(\App\Administrateur::class, 'administrateurs_id');
	}

	public function abonnement()
	{
		return $this->hasOne(\App\Abonnement::class, 'compteurs_id');
	}

	public function consommations()
	{
		return $this->hasMany(\App\Consommation::class, 'compteurs_id');
	}

	//foncton ajouter pour l'édition d'une facture

	public function getNewConsommationAttribute(){
		return $this->consommations->where('facture','=',null);
	}

	public function generateFacture(){
		/* creer une facture
			afficher des consommations
			affectation client
			afficher client
			calcul de montant total
			calcul de la valeur total 
		*/
		$nouvelle_consommation = $this->getNewConsommationAttribute();
		if ($nouvelle_consommation->count() > 0) {
			$facture = new Facture;			 
			$facture->details="generée automatiquement";
			$facture->save();
			$valeur=0;
			foreach ($nouvelle_consommation as $conso) {
				$valeur += $conso->valeur;
			}
			$facture->valeur_totale_consomme = $valeur;
			$facture->montant = $valeur*3; //3 est le prix du littre
			$facture->save();
			$facture->consommations()->saveMany($nouvelle_consommation);
			
			return $facture;
		}
		return null;
	}
}
