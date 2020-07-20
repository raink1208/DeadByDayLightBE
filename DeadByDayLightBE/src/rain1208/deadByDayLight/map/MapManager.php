<?php


namespace rain1208\deadByDayLight\map;


use pocketmine\level\Level;
use pocketmine\Server;
use rain1208\deadByDayLight\ConfigManager;
use rain1208\deadByDayLight\Main;

class MapManager
{
    private $maps = [];

    public function __construct()
    {
        $config = Main::getInstance()->getConfigManager()->get(ConfigManager::Maps);
        foreach ($config->getAll() as $name => $data) {
            Server::getInstance()->loadLevel($data["Level"]);
            $world = Server::getInstance()->getLevelByName($data["Level"]);
            $this->maps[$name] = new Map($name, $world);
        }
    }

    public function mapExists(string $name): bool
    {
        return isset($this->maps[$name]);
    }

    public function getAllMaps(): array
    {
        $maps = [];
        foreach ($this->maps as $map) {
            $maps[] = $map;
        }
        return $maps;
    }

    public function getMap(string $name): ?Map
    {
        return $this->mapExists($name)? $this->maps[$name] : null;
    }

    public function addMap(string $name,Level $world): void
    {
        $data = [
            "Level" => $world->getName()
        ];
        $config = Main::getInstance()->getConfigManager()->get(ConfigManager::Maps);
        $config->set($name,$data);
        $config->save();
        $this->maps[$name] = new Map($name,$world);
    }

    public function delMap(string $name): void
    {
        $config = Main::getInstance()->getConfigManager()->get(ConfigManager::Maps);
        $config->remove($name);
        $config->save();
        unset($this->maps[$name]);
    }
}