<?php
namespace GSG\Globale\Domain\Model;


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
 * Referenz
 */
class Referenz extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * code
     * 
     * @var string
     */
    protected $code = '';

    /**
     * codenr
     * 
     * @var int
     */
    protected $codenr = 0;

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * city
     * 
     * @var string
     */
    protected $city = '';

    /**
     * country
     * 
     * @var string
     */
    protected $country = '';

    /**
     * description
     * 
     * @var string
     */
    protected $description = '';

    /**
     * scope
     * 
     * @var string
     */
    protected $scope = '';

    /**
     * status
     * 
     * @var string
     */
    protected $status = '';

    /**
     * slug
     * 
     * @var string
     */
    protected $slug;

    /**
     * views
     * 
     * @var int
     */
    protected $views = 0;

    /**
     * images
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $images = null;

    /**
     * Returns the code
     * 
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the code
     * 
     * @param string $code
     * @return void
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Returns the codenr
     * 
     * @return int $codenr
     */
    public function getCodenr()
    {
        return $this->codenr;
    }

    /**
     * Sets the codenr
     * 
     * @param int $codenr
     * @return void
     */
    public function setCodenr($codenr)
    {
        $this->codenr = $codenr;
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the city
     * 
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     * 
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the country
     * 
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the country
     * 
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the scope
     * 
     * @return string $scope
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Sets the scope
     * 
     * @param string $scope
     * @return void
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    /**
     * Returns the status
     * 
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     * 
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the views
     * 
     * @return int $views
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Sets the views
     * 
     * @param int $views
     * @return void
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
    * Adds a FileReference
    *
    * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
    * @return void
    */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images) {
        $this->images->attach($images);
    }

    /**
    * Removes a FileReference
    *
    * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The FileReference to be removed
    * @return void
    */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imagesToRemove) {
        $this->images->detach($imagesToRemove);
    }
    /**
     * returns images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
     */
    public function getImages() { return $this->images; }
    
    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
     * @return void
     */
    public function setImages($images) {
        $this->images = $images;
    }

    /**
     * Sets the slug
     *
     * @param string $slug
     * @return void
     */
    public function setSlug(string $slug) { $this->slug = $slug; }
    /**
     * returns slug
     *
     * @return string $slug
     */
    public function getSlug() { return $this->slug; }

}
