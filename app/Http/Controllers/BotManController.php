<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use App\Conversations\CreditScoreConversation;
use App\Conversations\CalculateCreditScore;
use App\Conversations\FinanceTipConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */

    private $tips=array();

    public function initTipsArray()
    {
        array_push($this->tips,
            "Pay your bills and debts on time and using your credit card wisely",
            "Keep old credit cards, if any, open. This is so as to maintain a longer
            credit history, It can benefit your credit score since the credit history
            length accounts for 10% of the credit score",
            "Create a budget, by knowing how much money is going in and out, you
             effectively get a way of knowing how much you can afford to spend
             without going to debt",
             "keep your credit utilisation low: credit utilisation is how much of your
             available credit limit you use. Consider, if your credit limit is 20,000/=
             and you use 10,000/=, your credit utilisation is 50%. Using less of your available
             credit will be seen positively by lenders and will increase your credit score as 
             a result",
             "Increase your credit limit, consider, if you have maxed out your 10,000/= card and 
             you get a limit increase to 20,000/=, you instantly cut your utilisation rate 
             in half. Having a lower utilisation will increase your credit score",
             "Avoid applying for new credit when possible, each time you apply for credit,
             it may prompt an inquiry into your report and your credit score may take a hit"

        );
    }

    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    public function firstConversation(BotMan $bot)
    {
        $bot->reply("Hello, I am here to help you know all you need to about

            how to improve your credit score");
        $bot->startConversation(new CreditScoreConversation());
    }

    public function calculateScore(BotMan $bot)
    {
        $bot->reply("oh it works");
        $bot->startConversation(new CalculateCreditScore());
    }

    function creditScoreImprovement(BotMan $bot)
    {
        $this->initTipsArray();
        $i=rand(0,count($this->tips)-1);
        $bot->reply($this->tips[$i]);
        $bot->startConversation(new FinanceTipConversation());
    }
    function defaultFunction(BotMan $bot)
    {
        $bot->reply("sorry I do not understand you");
        $bot->reply("would you mind rephrasing your question");
        $bot->reply("to get the answer you are looking for,
            please ask relevant questions dealing with credit score and tips
            on how to improve it");
    }

}
