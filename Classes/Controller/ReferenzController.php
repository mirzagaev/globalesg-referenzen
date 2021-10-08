<?php
namespace GSG\Globale\Controller;

use GSG\Globale\Domain\Repository\ReferenzRepository;
use GSG\Globale\PageTitle\PageTitleProvider;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "Referenzen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Aydin Mirzaghayev <aydin.mirzaghayev@gmx.de>
 *
 ***/
/**
 * ReferenzController
 */
class ReferenzController extends ActionController
{
    private $referenzRepository;
    /**
    * Inject the vertrag repository
    *
    * @param \GSG\Globale\Domain\Repository\ReferenzRepository $referenzRepository
    */
    public function injectReferenzRepository(ReferenzRepository $referenzRepository)
    {
        $this->referenzRepository = $referenzRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $languid = $GLOBALS['TSFE']->sys_language_uid;
        $this->cacheService->clearPageCache(87);
        $args = $this->request->getArguments();

        if ( $args["referenzSuche"]["name"] ){
            $suchwort = $args["referenzSuche"]["name"];
            $referenzen = $this->referenzRepository->getSearch($suchwort);
            $this->view->assign('suchwort', $suchwort);
        } else {
            $referenzen = $this->referenzRepository->getAll();
        }
        
        $this->view->assign('referenzen', $referenzen);
    }

    /**
     * action show
     * 
     * @param \GSG\Globale\Domain\Model\Referenz $referenz
     * @return void
     */
    public function showAction()
    {
        $args = $this->request->getArguments();
        $referenz = $this->referenzRepository->findByUid($args["uid"]);

        $pageTitle = $referenz->getName().', '.$referenz->getCity().', '.$referenz->getCountry();
        $titleProvider = GeneralUtility::makeInstance(PageTitleProvider::class);
        $titleProvider->setTitle($pageTitle);

        $persistenceManager = GeneralUtility::makeInstance("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
        $views = $referenz->getViews();
        $referenz->setViews($views+1);
        $this->referenzRepository->update($referenz);
        $persistenceManager->persistAll();

        // $this->debug($referenz);

        $this->view->assign('referenz', $referenz);
    }

    public function debug($content) {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($content);
    }
}
