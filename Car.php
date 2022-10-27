<?php
class Car extends Vehicle
{
    private string $energy = "";
    private int $levelEnergy = 20;
    private bool $hasParkBrake = false;

    public function __constructor(string $color, int $nbSeat, string $energy)
    {
        parent::__construct($color, $nbSeat);
        $this->energy = $energy;
    }


    public function start(): string
    {
        if ($this->getParkBrake())
            throw new Exception("Unset your ParkBrake!!!");
        if ($this->getCurrentSpeed() >= 0 && $this->getLevelEnergy() > 0) {
            if ($this->getCurrentSpeed() < 260) {
                $this->setCurrentSpeed($this->getCurrentSpeed() + 10);
                $this->setLevelEnergy($this->getLevelEnergy() - 1);
            }
            return "Going Forward!";
        } else {
            if ($this->levelEnergy > 0)
                return "Brake for stopping before go!";
            else
                return "No Energy to Go!!";
        }
    }

    public function back(): string
    {
        if ($this->getParkBrake())
            throw new Exception("Unset your ParkBrake!!!");
        if ($this->getCurrentSpeed() <= 0 && $this->getLevelEnergy() > 0) {
            if ($this->getCurrentSpeed() < 70) {
                $this->setCurrentSpeed($this->getCurrentSpeed() - 10);
                $this->setLevelEnergy($this->getLevelEnergy() -  1);
            }
            return "Going back!";
        } else {
            if ($this->getLevelEnergy() > 0)
                return "Brake for stopping before go back!";
            else
                return "No Energy to Go!!";
        }
    }

    public function brake(): string
    {
        if ($this->getCurrentSpeed() != 0) {
            $this->setCurrentSpeed($this->currentSpeed + ($this->currentSpeed > 0 ?  -10 : 10));
            return "Braking!";
        } else
            return "you are stopped!";
    }

    public function getParkBrake(): bool
    {
        return $this->hasParkBrake;
    }

    public function setParkBrake(bool $hasParkBrake): void
    {
        $this->hasParkBrake = $hasParkBrake;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }


    public function setEnergy(string $energy): void
    {
        $this->energy = $energy;
    }

    public function getLevelEnergy(): int
    {
        return $this->levelEnergy;
    }


    public function setLevelEnergy(int $levelEnergy): void
    {
        $this->levelEnergy = $levelEnergy;
    }
}
