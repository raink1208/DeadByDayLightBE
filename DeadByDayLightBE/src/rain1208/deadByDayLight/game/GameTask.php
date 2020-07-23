<?php


namespace rain1208\deadByDayLight\game;


use pocketmine\scheduler\Task;

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
        $this->count++;
        $this->checkPlayer();
    }

    public function checkPlayer()
    {
        if (count($this->game->getFlags()) <= 0) return;
        foreach ($this->game->getFlags() as $player) {
            foreach ($this->game->getGenerator() as $generator) {
                if ($player->distance($generator) <= 1) {
                    $generator->onActivate(0.5);
                }
            }
        }
    }
}