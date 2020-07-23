<?php


namespace rain1208\deadByDayLight\resource;

use pocketmine\math\Vector3;
use rain1208\deadByDayLight\ConfigManager;
use rain1208\deadByDayLight\Main;

class ResourceManager
{
    private $data;
    public function __construct()
    {
        $config = Main::getInstance()->getConfigManager()->get(ConfigManager::Resources);
        foreach ($config->getAll() as $name => $item) {
            $generators = [];
            $gates = [];
            foreach ($item["generator"] as $gen) {
                $generator[] = new Generator($gen[0],$gen[1],$gen[2]);
            }
            foreach ($item["gate"] as $gate) {
                $gates[] = new Vector3($gate[0],$gate[1],$gate[2]);
            }

            $this->data[$name] = ["generator" => $generators,"gate" => $gates];
        }
    }

    public function getData(string $name)
    {
        return $this->data[$name];
    }
}