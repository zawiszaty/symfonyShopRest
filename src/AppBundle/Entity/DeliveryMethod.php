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
     * @var int
     *
     * @ORM\Column(name="id_delivery_method", type="string", length=255), nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDeliveryMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="methods", type="string", length=255), nullable=false)
     */
    private $methods;

    /**
     * @return mixed
     */
    public function getIdDeliveryMethod(): int
    {
        return $this->idDeliveryMethod;
    }

    /**
     * @param mixed $idDeliveryMethod
     */
    public function setIdDeliveryMethod(int $idDeliveryMethod)
    {
        $this->idDeliveryMethod = $idDeliveryMethod;
    }

    /**
     * @return mixed
     */
    public function getMethods(): string
    {
        return $this->methods;
    }

    /**
     * @param mixed $methods
     */
    public function setMethods(string $methods)
    {
        $this->methods = $methods;
    }

}