<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
use ZIMZIM\ConstructionSiteBundle\Model\ActionItem;
use ZIMZIM\ConstructionSiteBundle\Model\TypeActionItem;
use Gedmo\Mapping\Annotation as Gedmo;
use AppBundle\Entity\AcmeCS;
use AppBundle\Entity\AcmeTAI;

/**
 * AcmeAI
 *
 * @ORM\Table(name="acme_ai")
 * @ORM\Entity(repositoryClass="ZIMZIM\ConstructionSiteBundle\Model\ActionItemRepository")
 * @ORM\HasLifecycleCallbacks
 * @GRID\Source(columns="id, name", groups={"default"})
 */
class AcmeAI extends ActionItem
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
     * @var TypeActionItem
     *
     * @GRID\Column(operatorsVisible=false, field="typeActionItem.name", title="ZIMZIMActionItem.typeActionItem")
     *
     * @ORM\ManyToOne(targetEntity="AcmeTAI")
     * @ORM\JoinColumn(name="id_type_action_item", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $typeActionItem;

    /**
     * @var ConstructionSite
     *
     * @GRID\Column(operatorsVisible=false, field="constructionSite.name", title="ZIMZIMActionItem.constructionSite")
     *
     * @Gedmo\SortableGroup
     *
     * @ORM\ManyToOne(targetEntity="AcmeCS", inversedBy="actionItems")
     * @ORM\JoinColumn(name="id_construction_site", referencedColumnName="id")
     */
    protected $constructionSite;

    public function getId(){
        return $this->id;
    }
}