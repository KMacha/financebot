<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class FinanceTipConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    private $tip=array(
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
    function askMoreTips()
    {
    	/*
    		if user responds yes, give them more tips
    	*/
    	$additionalinfo="(please answer (yes/no/all).<br>
    	<p style='color:red;'>all will output all tips</p>)";
    	$question="<p style='color:purple'>Do you want another tip?</p><br>".$additionalinfo;
    	$this->ask($question,function(Answer $answer)
    	{
    		$ansa=$answer->getText();

    		if ($ansa=="yes")
    		{
	    		$i=rand(0,count($this->tip)-1);
	    		$this->say($this->tip[$i]);
	    		$this->repeat();
	    	}
	    	else if($ansa=="all")
	    	{
	    		for ($i=0;$i<count($this->tip);$i++)
	    		{$this->say($this->tip[$i]);}
	    		$this->say("Feel free to ask any more queries");
	    	}
	    	else if($ansa=="no")
	    	{
	    		$this->say("Feel free to ask any more queries");
	    	}
	    	else
	    	{
	    		$this->repeat("<p style='color:red'>no such choice,please choose between yes/no/all</p>");
	    	}
    	});
    }

    public function run()
    {
        $this->askMoreTips();
    }
}
