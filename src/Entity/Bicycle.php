<?php
namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Orm\Mapping as ORM;
use function PHPUnit\Framework\throwException;

/**
 * @ORM\Entity
 */
class Bicycle
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var int
     */
    protected $gear;

    /**
     * @var int
     */
    protected $tirePressure;

    public function __construct()
    {
        $this->id = uniqid();
        $this->gear = 1;
        $this->tirePressure = 100;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Bicycle
     */
    public function setId(string $id): Bicycle
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getGear(): int
    {
        return $this->gear;
    }

    /**
     * @param int $gear
     * @return Bicycle
     */
    public function setGear(int $gear): Bicycle
    {
        $this->gear = $gear;
        return $this;
    }

    /**
     * @return int
     */
    public function getTirePressure(): int
    {
        return $this->tirePressure;
    }

    /**
     * @param int $tirePressure
     * @return Bicycle
     */
    public function setTirePressure(int $tirePressure): Bicycle
    {
        $this->tirePressure = $tirePressure;
        return $this;
    }

    /**
     * Shift gear up by one
     */
    public function shiftUp(){
        if($this->gear < 7){
            $this->setGear($this->gear + 1);
        }
        else{
            throw new \Exception('At highest gear');
        }
    }

    /**
     * Shift gear down by one
     */
    public function shiftDown(){
        if($this->gear > 1){
            $this->setGear($this->gear - 1);
        }
        else{
            throw new \Exception('At lowest gear');
        }
    }

    /**
     * Inflate tires back to 100
     */
    public function inflateTires(){
        if($this->tirePressure < 100){
            $this->setTirePressure(100);
        }
        else{
            throw new \Exception('Tires are full');
        }
    }

    /**
     * Ride bicycle, deflates tires by 5
     */
    public function ride(){
        if($this->tirePressure > 0){
            $this->setTirePressure($this->tirePressure - 5);
        }
        else{
            throw new \Exception('Tires need to be inflated');
        }
    }
}