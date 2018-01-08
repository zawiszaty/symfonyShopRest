<?php


namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="delivery_method")
 */
class DeliveryMethod
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="methods", type="string", length=255), nullable=false)
     */
    private $methods;
    /**
     * @var int
     *
     * @ORM\Column(name="methods_prize", type="integer", length=255), nullable=false)
     */
    private $methods_prize;
    /**
     * @var int
     *
     * @ORM\Column(name="archived", type="integer", length=255), nullable=false)
     */
    private $archived = 0;

    /**
     * @return int
     */
    public function getArchived(): int
    {
        return $this->archived;
    }

    /**
     * @param int $archived
     */
    public function setArchived(int $archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return int
     */
    public function getIdDeliveryMethod(): int
    {
        return $this->idDeliveryMethod;
    }

    /**
     * @param int $idDeliveryMethod
     */
    public function setIdDeliveryMethod(int $idDeliveryMethod)
    {
        $this->idDeliveryMethod = $idDeliveryMethod;
    }

    /**
     * @return string
     */
    public function getMethods(): ?string
    {
        return $this->methods;
    }

    /**
     * @param string $methods
     */
    public function setMethods(string $methods)
    {
        $this->methods = $methods;
    }

    /**
     * @return int
     */
    public function getMethodsPrize(): ?int
    {
        return $this->methods_prize;
    }

    /**
     * @param int $methods_prize
     */
    public function setMethodsPrize(int $methods_prize)
    {
        $this->methods_prize = $methods_prize;
    }


}