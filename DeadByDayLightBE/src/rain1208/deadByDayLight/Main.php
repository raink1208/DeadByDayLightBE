<?php


namespace rain1208\deadByDayLight;


use pocketmine\plugin\PluginBase;
use rain1208\deadByDayLight\game\Game;
use rain1208\deadByDayLight\listener\PlayerEventListener;
use rain1208\deadByDayLight\map\Map;
use rain1208\deadByDayLight\map\MapManager;
use rain1208\deadByDayLight\resource\ResourceManager;
use rain1208\deadByDayLight\skill\SkillManager;

class Main extends PluginBase
{
    public static $instance;

    private $configManager;
    private $mapManager;
    private $skillManager;
    private $resourceManager;

    private $game;

    private $generatorCount = 25;

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new PlayerEventListener(),$this);

        $this->configManager = new ConfigManager();
        $this->mapManager = new MapManager();
        $this->skillManager = new SkillManager();
    }

    public static function getInstance(): Main
    {
        return self::$instance;
    }

    public function getConfigManager(): ConfigManager
    {
        return $this->configManager;
    }

    public function getMapManager(): MapManager
    {
        return $this->mapManager;
    }

    public function getSkillManager(): SkillManager
    {
        return $this->skillManager;
    }

    public function getResourceManager(): ResourceManager
    {
        return $this->resourceManager;
    }

    public function getGeneratorCount():int
    {
        return $this->generatorCount;
    }

    public function createGame(Map $map): void
    {
        $this->game = new Game($map);
    }

    public function gameExists(): bool
    {
        return isset($this->game);
    }

    public function getGame(): Game
    {
        return $this->game;
    }
}