<?php

namespace HannesTheDev\Commands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use HannesTheDev\Main;

class FlyCommand implements Listener{
  
  public $flylist = []
  
  public function onCommand(Command $cmd, CommandSender $sender, string $label, array $args) : bool{
    if($cmd->getName() == "fly"){
      if($sender instanceof Player){
        if($sender->hasPermission("fly.command")){
          if(!isset($this->flyList[$sender->getName()])){
            $sender->setFlying(true);
            $sender->setAllowFlieght(true);
            $sender->sendMessage("§8[§bSC§8] §7Der Flugmodus wurde erfolgreich §aaktiviert§7!");
            return true;
          } else {
            unset($this->flyList[$sender->getName()]);
            $sender->setFlying(false);
            $sender->setAllowFlieght(false);
            $sender->sendMessage("§8[§bSC§8] §7Der Flugmodus wurde erfolgreich §4deaktiviert§7!");
            return true;
          }
        } else {
          $sender->sendMessage("§8[§bSC§8] §cDu hast dafür keine Berechtigung!");
          return true;
        }
      } else {
        $sender->sendMessage("§8[§bSC§8] §cDu musst ein Spieler sein, diesen Befehl auszuführen!");
        return true;
      }
      break;
    }
  }
}
