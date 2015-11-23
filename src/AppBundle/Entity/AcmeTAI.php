<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
use ZIMZIM\ConstructionSiteBundle\Model\TypeActionItem;

/**
 * AcmeTAI
 *
 * @ORM\Table(name="acme_tai")
 * @ORM\Entity(repositoryClass="ZIMZIM\ConstructionSiteBundle\Model\TypeActionItemRepository")
 * @ORM\HasLifecycleCallbacks
 * @GRID\Source(columns="id, name", groups={"default"})
 */
class AcmeTAI extends TypeActionItem
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

    public function getId(){
        return $this->id;
    }
}