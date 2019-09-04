<?php
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;
use App\Http\Controllers\BotManController;
use App\Conversations\calculatescore;

$botman = resolve('botman');

$botman->hears('(Hello|Hey).*', BotManController::class.'@firstConversation');
$botman->hears('.*(calculat|Check).*',function($bot){
			$bot->reply("i love programming");
			$obj=new calculatescore();
			$bot->reply($obj->gettingCreditScore());
		});

$botman->hears('.*(credit score|save|saving|improv|financ|tips).*',BotManController::class.'@creditScoreImprovement');
$botman->fallback(BotManController::class.'@defaultFunction');
?>

