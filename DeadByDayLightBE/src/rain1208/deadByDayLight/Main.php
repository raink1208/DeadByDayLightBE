<?php


namespace rain1208\deadByDayLight;


use pocketmine\plugin\PluginBase;
use rain1208\deadByDayLight\listener\PlayerEventListener;
use rain1208\deadByDayLight\map\MapManager;

class Main extends PluginBase
{
    private $configManager;
    private $mapManager;

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new PlayerEventListener(),$this);
        $this->configManager = new ConfigManager();
        $this->mapManager = new MapManager();
    }
}