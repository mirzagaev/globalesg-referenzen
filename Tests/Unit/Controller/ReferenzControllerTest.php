<?php
namespace GSG\Globale\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Aydin Mirzaghayev <aydin.mirzaghayev@gmx.de>
 */
class ReferenzControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \GSG\Globale\Controller\ReferenzController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\GSG\Globale\Controller\ReferenzController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllReferenzsFromRepositoryAndAssignsThemToView()
    {

        $allReferenzs = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $referenzRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $referenzRepository->expects(self::once())->method('findAll')->will(self::returnValue($allReferenzs));
        $this->inject($this->subject, 'referenzRepository', $referenzRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('referenzs', $allReferenzs);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenReferenzToView()
    {
        $referenz = new \GSG\Globale\Domain\Model\Referenz();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('referenz', $referenz);

        $this->subject->showAction($referenz);
    }
}
