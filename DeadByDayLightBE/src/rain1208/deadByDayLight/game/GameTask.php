<?php


namespace rain1208\deadByDayLight\game;


use pocketmine\scheduler\Task;
use pocketmine\Server;
use rain1208\deadByDayLight\game\Game;

class GameTask extends Task
{
    /** @var Game  */
    private $game;
    private $count;

    public function __construct(Game $game)
    {
        $this->game = $game;
        $this->count = 0;
    }


    public function onRun(int $currentTick)
    {
        if ($this->count%10 == 0) {
            Server::getInstance()->broadcastMessage("$this->count");
        }
        if ($this->count >= 50) {
            $this->game->endGame();
        }
        $this->count++;
    }

    public function sendStatus()
    {
        foreach (Server::getInstance()->getOnlinePlayers() as $player) {
            $player;
        }
    }
}