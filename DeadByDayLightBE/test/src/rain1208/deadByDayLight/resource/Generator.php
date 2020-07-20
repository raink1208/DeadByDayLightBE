<?php


namespace rain1208\deadByDayLight\resource;


use rain1208\deadByDayLight\Main;

class Generator
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
}