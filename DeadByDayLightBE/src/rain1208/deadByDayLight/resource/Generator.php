<?php


namespace rain1208\deadByDayLight\resource;

use pocketmine\math\Vector3;
use rain1208\deadByDayLight\Main;

class Generator extends Vector3
{
    private $flag = false;
    private $count;

    public function onActivate(int $count):void
    {
        if ($this->flag) return;
        $this->count += $count;
        if ($this->count >= Main::getInstance()->getGeneratorCount()) {
            $this->flag = true;
        }
    }

    public function getFlag(): bool
    {
        return $this->flag;
    }
}