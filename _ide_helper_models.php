<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Absence
 *
 * @property int $id
 * @property string $date
 * @property string $motif
 * @property int $candidat_id
 * @property int $session_formation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidat $candidat
 * @property-read \App\Models\SessionFormation $sessionFormation
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereCandidatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereMotif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereSessionFormationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absence whereUpdatedAt($value)
 */
	class Absence extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AgentFacturation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Facture> $factures
 * @property-read int|null $factures_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFacturation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFacturation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFacturation query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFacturation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFacturation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentFacturation whereUpdatedAt($value)
 */
	class AgentFacturation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BanqueQuestion
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Test> $test
 * @property-read int|null $test_count
 * @method static \Illuminate\Database\Eloquent\Builder|BanqueQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanqueQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanqueQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|BanqueQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanqueQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanqueQuestion whereUpdatedAt($value)
 */
	class BanqueQuestion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Batiment
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Salle> $salles
 * @property-read int|null $salles_count
 * @method static \Database\Factories\BatimentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereUpdatedAt($value)
 */
	class Batiment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Candidat
 *
 * @property int $id
 * @property string $candidatable_type
 * @property int $candidatable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Absence> $absences
 * @property-read int|null $absences_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $candidatable
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formation> $formation
 * @property-read int|null $formation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Groupe> $groupe
 * @property-read int|null $groupe_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereCandidatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereCandidatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereUpdatedAt($value)
 */
	class Candidat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CandidatEcosysteme
 *
 * @property int $id
 * @property string $CIN
 * @property string|null $Entreprise_actuelle
 * @property string|null $Poste_actuellement_occupe
 * @property string|null $Type_contrat
 * @property string|null $Societe
 * @property int $Anciennete
 * @property int $annees_experience
 * @property string|null $Niveau_scolaire
 * @property string|null $Diplôme
 * @property string|null $Spécialité
 * @property string|null $Organismes_de_diplôme
 * @property string|null $Organisme_de_formation
 * @property string|null $Langues
 * @property int $first_time
 * @property int $agreed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidat|null $candidat
 * @method static \Database\Factories\CandidatEcosystemeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme query()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereAgreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereAnciennete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereAnneesExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereCIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereDiplôme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereEntrepriseActuelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereFirstTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereLangues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereNiveauScolaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereOrganismeDeFormation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereOrganismesDeDiplôme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme wherePosteActuellementOccupe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereSociete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereSpécialité($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereTypeContrat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatEcosysteme whereUpdatedAt($value)
 */
	class CandidatEcosysteme extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CandidatOcp
 *
 * @property int $id
 * @property int|null $Code_Emploi
 * @property string $Matricule
 * @property string|null $Libelle_Code_Emploi
 * @property string|null $Niveau_code_Emploi
 * @property string|null $GROUPE_Professionnel
 * @property string|null $service
 * @property string|null $Direction
 * @property string|null $Societe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidat|null $candidat
 * @method static \Database\Factories\CandidatOcpFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp query()
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereCodeEmploi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereGROUPEProfessionnel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereLibelleCodeEmploi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereMatricule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereNiveauCodeEmploi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereSociete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CandidatOcp whereUpdatedAt($value)
 */
	class CandidatOcp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Certificat
 *
 * @property int $id
 * @property string $nom
 * @property string $date_obtention
 * @property int $chef_formation_id
 * @property int $candidat_id
 * @property int $formation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidat $candidat
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Certificat> $certificats
 * @property-read int|null $certificats_count
 * @property-read \App\Models\ChefFormation $chefFormation
 * @property-read \App\Models\Formation $formation
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereCandidatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereChefFormationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereDateObtention($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereFormationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificat whereUpdatedAt($value)
 */
	class Certificat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChefDomain
 *
 * @property int $id
 * @property int $domain_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Domain $domain
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ChefDomain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChefDomain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChefDomain query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChefDomain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChefDomain whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChefDomain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChefDomain whereUpdatedAt($value)
 */
	class ChefDomain extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChefFormation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Certificat> $certificats
 * @property-read int|null $certificats_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ChefFormation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChefFormation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChefFormation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChefFormation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChefFormation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChefFormation whereUpdatedAt($value)
 */
	class ChefFormation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Data
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Data newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data query()
 */
	class Data extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property int $id
 * @property string $nom
 * @property string $type
 * @property mixed $fichier
 * @property int $approuved_by_chef_domain
 * @property int $theme_id
 * @property int $formateur_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Formateur|null $formateurs
 * @property-read \App\Models\Theme $theme
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereApprouvedByChefDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereFichier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereFormateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 */
	class Document extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Domain
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ChefDomain|null $chefDomain
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formateur> $formateurs
 * @property-read int|null $formateurs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SousDomain> $sousDomain
 * @property-read int|null $sous_domain_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Theme> $theme
 * @property-read int|null $theme_count
 * @method static \Illuminate\Database\Eloquent\Builder|Domain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain query()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereUpdatedAt($value)
 */
	class Domain extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Evaluation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Test|null $test
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereUpdatedAt($value)
 */
	class Evaluation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Facture
 *
 * @property int $id
 * @property string $dateFacturation
 * @property float $montant
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AgentFacturation|null $agentFacturation
 * @method static \Illuminate\Database\Eloquent\Builder|Facture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Facture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Facture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereDateFacturation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereUpdatedAt($value)
 */
	class Facture extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FicheSatisfaction
 *
 * @property int $id
 * @property int $formation_id
 * @property int $formateur_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Formateur $formateur
 * @property-read \App\Models\Formation $formation
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction whereFormateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction whereFormationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FicheSatisfaction whereUpdatedAt($value)
 */
	class FicheSatisfaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Formateur
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Domain> $domains
 * @property-read int|null $domains_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FicheSatisfaction> $ficheSatisfaction
 * @property-read int|null $fiche_satisfaction_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SessionFormation> $sessionFormations
 * @property-read int|null $session_formations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Test> $tests
 * @property-read int|null $tests_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Formateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formateur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Formateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formateur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formateur whereUpdatedAt($value)
 */
	class Formateur extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Formation
 *
 * @property int $id
 * @property string $Intitulé
 * @property string $date_debut
 * @property string $date_fin
 * @property int $planificateur_id
 * @property string|null $formationable_type
 * @property int|null $formationable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidat> $candidats
 * @property-read int|null $candidats_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FicheSatisfaction> $ficheSatisfactions
 * @property-read int|null $fiche_satisfactions_count
 * @property-read Formation $formation
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $formationable
 * @property-read \App\Models\Planificateur $planificateur
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Test> $tests
 * @property-read int|null $tests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Theme> $theme
 * @property-read int|null $theme_count
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereFormationableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereFormationableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereIntitulé($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation wherePlanificateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereUpdatedAt($value)
 */
	class Formation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FormationContinue
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Formation|null $formation
 * @method static \Illuminate\Database\Eloquent\Builder|FormationContinue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationContinue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationContinue query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationContinue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationContinue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationContinue whereUpdatedAt($value)
 */
	class FormationContinue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FormationInitial
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Formation|null $formation
 * @method static \Illuminate\Database\Eloquent\Builder|FormationInitial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationInitial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationInitial query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationInitial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationInitial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationInitial whereUpdatedAt($value)
 */
	class FormationInitial extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FormationPromotion
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Formation|null $formation
 * @method static \Illuminate\Database\Eloquent\Builder|FormationPromotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationPromotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationPromotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationPromotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationPromotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationPromotion whereUpdatedAt($value)
 */
	class FormationPromotion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Groupe
 *
 * @property int $id
 * @property string $nom
 * @property int $capacite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidat> $candidats
 * @property-read int|null $candidats_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Panoscape\History\History> $histories
 * @property-read int|null $histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SessionFormation> $sessionFormations
 * @property-read int|null $session_formations_count
 * @method static \Database\Factories\GroupeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe whereCapacite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupe whereUpdatedAt($value)
 */
	class Groupe extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mds
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Formation|null $formation
 * @method static \Illuminate\Database\Eloquent\Builder|Mds newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mds newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mds query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mds whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mds whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mds whereUpdatedAt($value)
 */
	class Mds extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Planificateur
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formation> $planFormations
 * @property-read int|null $plan_formations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Planificateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Planificateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Planificateur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Planificateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planificateur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planificateur whereUpdatedAt($value)
 */
	class Planificateur extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreAssissment
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Test|null $test
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssissment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssissment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssissment query()
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssissment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssissment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssissment whereUpdatedAt($value)
 */
	class PreAssissment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Question
 *
 * @property int $id
 * @property float $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BanqueQuestion> $banqueQuestions
 * @property-read int|null $banque_questions_count
 * @property-read \App\Models\QuestionFichier|null $questionFichier
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Statement> $statements
 * @property-read int|null $statements_count
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuestionFichier
 *
 * @property int $id
 * @property int $question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionFichier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionFichier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionFichier query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionFichier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionFichier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionFichier whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionFichier whereUpdatedAt($value)
 */
	class QuestionFichier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property string $date_debut
 * @property string $date_fin
 * @property int $salle_id
 * @property int $responsable_logistique_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ResponsableLogistique|null $responsableLogistique
 * @property-read \App\Models\Salle $salle
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereResponsableLogistiqueUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereSalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 */
	class Reservation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResponsableLogistique
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reservation> $reservations
 * @property-read int|null $reservations_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ResponsableLogistique newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponsableLogistique newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponsableLogistique query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponsableLogistique whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponsableLogistique whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponsableLogistique whereUpdatedAt($value)
 */
	class ResponsableLogistique extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Salle
 *
 * @property int $id
 * @property int|null $code
 * @property string|null $intitule
 * @property int|null $batiment_id
 * @property int|null $typesalle_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Batiment|null $batiment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reservation> $reservations
 * @property-read int|null $reservations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SessionFormation> $sessionFormations
 * @property-read int|null $session_formations_count
 * @property-read \App\Models\TypesSalle|null $typessalles
 * @method static \Database\Factories\SalleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Salle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereBatimentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereIntitule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereTypesalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereUpdatedAt($value)
 */
	class Salle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SessionFormation
 *
 * @property int $id
 * @property string $date_debut
 * @property string $date_fin
 * @property int $groupe_id
 * @property int $salle_id
 * @property int $formation_id
 * @property int $formateur_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Absence> $absences
 * @property-read int|null $absences_count
 * @property-read \App\Models\Formateur $formateur
 * @property-read \App\Models\Formation $formation
 * @property-read \App\Models\Groupe $groupe
 * @property-read \App\Models\Salle $salle
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereFormateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereFormationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereGroupeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereSalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SessionFormation whereUpdatedAt($value)
 */
	class SessionFormation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SousDomain
 *
 * @property int $id
 * @property string $nom
 * @property int $domain_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Domain $domain
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain query()
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousDomain whereUpdatedAt($value)
 */
	class SousDomain extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Statement
 *
 * @property int $id
 * @property string $value
 * @property int $respone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Statement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereRespone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereValue($value)
 */
	class Statement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Test
 *
 * @property int $id
 * @property string $testable_type
 * @property int $testable_id
 * @property int $theme_id
 * @property int $banque_question_id
 * @property int $formateur_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BanqueQuestion $banqueQuestion
 * @property-read \App\Models\Formateur $formateur
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formation> $formations
 * @property-read int|null $formations_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $testable
 * @property-read \App\Models\Theme $theme
 * @method static \Illuminate\Database\Eloquent\Builder|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test query()
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereBanqueQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereFormateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereTestableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereTestableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereUpdatedAt($value)
 */
	class Test extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TestEntreeSortie
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Test|null $test
 * @method static \Illuminate\Database\Eloquent\Builder|TestEntreeSortie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestEntreeSortie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestEntreeSortie query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestEntreeSortie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestEntreeSortie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestEntreeSortie whereUpdatedAt($value)
 */
	class TestEntreeSortie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Theme
 *
 * @property int $id
 * @property string $nom
 * @property int $domain_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \App\Models\Domain $domain
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formation> $planFormations
 * @property-read int|null $plan_formations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Test> $tests
 * @property-read int|null $tests_count
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
 */
	class Theme extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TypesSalle
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Salle> $salles
 * @property-read int|null $salles_count
 * @method static \Database\Factories\TypesSalleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TypesSalle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypesSalle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypesSalle query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypesSalle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypesSalle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypesSalle whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypesSalle whereUpdatedAt($value)
 */
	class TypesSalle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $Matricule
 * @property string|null $userable_type
 * @property int|null $userable_id
 * @property string|null $email
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $prenom
 * @property string|null $nom
 * @property string|null $date_naissance
 * @property string|null $date_embauche
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $profile_photo_path
 * @property int|null $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Panoscape\History\History> $operations
 * @property-read int|null $operations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $userable
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateEmbauche($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMatricule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserableType($value)
 */
	class User extends \Eloquent {}
}

