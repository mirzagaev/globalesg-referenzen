<?php
namespace GSG\Globale\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * The repository for Referenz
 */
class ReferenzRepository extends Repository
{
	public function getAll()
	{
	    $query = $this->createQuery();
	    $query->statement('	SELECT * FROM tx_globale_domain_model_referenz
	    					WHERE deleted=0 AND hidden=0 AND sys_language_uid=""
	    					ORDER BY code, codenr ASC');
	    return $query->execute();
	}

	public function getSearch($suchwort)
	{
	    $query = $this->createQuery();
	    #$query->matching($query->like('name', '%' . $suchwort . '%'));
	    $query->statement('	SELECT * FROM tx_globale_domain_model_referenz
	    					WHERE (
	    						name LIKE "%'.$suchwort.'%"
	    						OR description LIKE "%'.$suchwort.'%"
	    						OR city LIKE "%'.$suchwort.'%"
	    						OR country LIKE "%'.$suchwort.'%"
	    						)
	    						AND deleted=0
	    						AND hidden=0
	    						AND sys_language_uid=""
	    					ORDER BY code ASC');
	    return $query->execute();
	}
}