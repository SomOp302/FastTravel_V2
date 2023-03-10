<?php 

namespace SomOP;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use onebone\economyapi\EconomyAPI;
use pocketmine\utils\Config;

use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;

class Warp extends PluginBase implements Listener

public function onLoad(): void
    {
        self::$instance = $this;
        $this->getLogger()->info("Β§eLoading FastTravel-V2 π©βπ»Made By SomDevOP");

        /** @var array $loadWorlds */
       $loadWorlds = $this->getConfig()->get("load-worlds");
       /** @var string $world */
       foreach ($loadWorlds as $world) {
               if ($this->getServer()->getWorldManager()->loadWorld($world)) {
                    $this->getLogger()->info("Β§eWorld ${world} Has Been Successfully Loaded");
            }
        }
    }
    
    public function onEnable(): void
    {
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin is Enabled π₯
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     Made By Som");
 
 $this->reloadConfig();
 Server::getInstance()->getPluginManager()->registerEvents(new EventListener(), $this);
 $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
  }
    
      public function onDisable(): void
    {
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin Fast Tarvel is going to sleep π΄")
       }
       
      public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
                 switch($command->getName()){
                 	    case "warpui":
                              if($sender->hasPermission("warpui.cmd")){
                              	$this->warpui($sender);
                               } else {
                              	$sender->sendMessage("You Don't Have Permission To Use This Command");
                      }
                   }
                   
                   return true;
                   
           }
           
public function warpui(Player $player) {
       $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){
           if($data === null){
                      	                               return true;
                      
           switch ($data){ 
           	
                case 0:
                        $world = $this->getConfig()->get("pvp-world");
                        
                        $player->teleport(new Position(floatval($this->getConfig()->get("pvp-x")), floatval($this->getConfig()->get("pvp-y")), floatval($this->getConfig()->get("pvp-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lPVP");
                        break;
                        
                case 1:
                        $world = $this->getConfig()->get("forest-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("forest-x")), floatval($this->getConfig()->get("forest-y")), floatval($this->getConfig()->get("forest-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lFOREST");
                        break;
                        
                case 2:
                        $world = $this->getConfig()->get("mine-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("mine-x")), floatval($this->getConfig()->get("mine-y")), floatval($this->getConfig()->get("mine-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lMINE");
                        break;
                        
                case 3:
                        $world = $this->getConfig()->get("farm-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("farm-x")), floatval($this->getConfig()->get("farm-y")), floatval($this->getConfig()->get("farm-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lFARM");
                        break;
                        
                case 4:
                        $world = $this->getConfig()->get("grave-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("grave-x")), floatval($this->getConfig()->get("grave-y")), floatval($this->getConfig()->get("grave-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lGRAVEYARD");
                        break;
                         
               case 5:
                       Server::getInstance()->dispatchCommand($player, "liftui");
                       break;
                       
               case 6:
                       Server::getInstance()->dispatchCommand($player, "is tp");
                       $player->sendTitle("Β§eΒ§lISLAND");
                       break;

              case 7:
                      Server::getInstance()->dispatchCommand($player, "hub");
                      $player->sendTitle("Β§eΒ§lHUB");
                      break;
                      
              case 8:
                     $world = $this->getConfig()->get("nether-world");
                     $player->teleport(new Position(floatval($this->getConfig()->get("nether-x")), floatval($this->getConfig()->get("nether-y")), floatval($this->getConfig()->get("nether-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                     $player->sendTitle("Β§eΒ§lNETHER");
                     break;
                     
             case 9:
                     $world = $this->getConfig()->get("end-world");
                     $player->teleport(new Position(floatval($this->getConfig()->get("end-x")), floatval($this->getConfig()->get("end-y")), floatval($this->getConfig()->get("end-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                     $player->sendTitle("Β§eΒ§lEND");
                     break;
                     
            case 10:
                    $world = $this->getConfig()->get("crates-world");
                    $player->teleport(new Position(floatval($this->getConfig()->get("crates-x")), floatval($this->getConfig()->get("crates-y")), floatval($this->getConfig()->get("crates-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                    $player->sendTitle("Β§eΒ§lCRATES");
                    break;
                    
            case 11:
                    $world = $this->getConfig()->get("leaderboard-world");
                    $player->teleport(new Position(floatval($this->getConfig()->get("leaderboard-x")), floatval($this->getConfig()->get("leaderboard-y")), floatval($this->getConfig()->get("leaderboard-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                    $player->sendTitle("Β§eΒ§lLEADERBOARDS");
                    break;
            }
            
         });
         
    $form->setTitle("Β§lΒ§cFAST TRAVEL");
    $form->setContent("Β§rΒ§9Select The Place Which You Want To Teleport: \n Happy Journey");
    $form->addButton("Β§lΒ§bPVP\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/4618/4618495.png");
    $form->addButton("Β§lΒ§bFOREST\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/532/532606.png");
    $form->addButton("Β§lΒ§bMINE\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/4492/4492671.png");
    $form->addButton("Β§lΒ§bFARM\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/7417/7417717.png");
    $form->addButton("Β§lΒ§bGRAVEYARD\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/3472/3472185.png");
    $form->addButton("Β§lΒ§bLIFT UI\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/2084/2084189.png");
    $form->addButton("Β§lΒ§bISLAND\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/4617/4617270.png");
    $form->addButton("Β§lΒ§bHUB\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/2942/2942149.png");
    $form->addButton("Β§lΒ§bNETHER\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/7040/7040964.png");
    $form->addButton("Β§lΒ§bEND\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/5553/5553850.png");
    $form->addButton("Β§lΒ§bCRATES\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/6491/6491529.png");
    $form->addButton("Β§lΒ§bLEADERBOARD\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/1426/1426727.png");
    $form->sendtoPlayer($player);
    return $form;
    
  }
}
