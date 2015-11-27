<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZIMZIM\ConstructionSiteBundle\Model\ConstructionSite;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * AcmeCS
 *
 * @ORM\Table(name="acme_cs")
 * @ORM\Entity(repositoryClass="ZIMZIM\ConstructionSiteBundle\Model\ConstructionSiteRepository")
 * @ORM\HasLifecycleCallbacks
 * @GRID\Source(columns="id, name, date, pathBefore, pathPending, pathAfter", groups={"default"})
 */
class AcmeCS extends ConstructionSite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GRID\Column(operatorsVisible=false)
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="AcmeAI", mappedBy="constructionSite")
     *
     */
    protected $actionItems;

    public function getId(){
        return $this->id;
    }

    protected function getUploadDir()
    {
        return "resources/cs/" . $this->getId();
    }
}