<?php

namespace App\Conversations;


use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class CreditScoreConversation extends Conversation
{
    /**
     * First question
     */
    public function meaning()
    {
    	//meaning of credit score
    	$answer="Credit score is a 3 digit number that relates to how likely you are to repay debt<br><br>";
    	$additionalinfo="it is used by banks and lenders to decide whether they'll approve
    	one for a credit card or loan<br><br>";
    	$moreinfo="it is based on the credit history,in turn, the credit history is a record of a consumers ability to repay debts and the responsibility demonstrated in repaying debts<br><br>";

    	return "".$answer.$additionalinfo.$moreinfo;
    }

    public function askCreditScore()
    {
    	$buttonhelpinfo="(please click either of the buttons below)";
        $question = Question::create("Do you know what credit score is?".$buttonhelpinfo)
            ->addButtons([
                Button::create('yes')->value('yes'),
                Button::create('no')->value('no'),
            ]);

        $this->ask($question, function (Answer $answer) 
        {
	        if ($answer->isInteractiveMessageReply())
	        {
	            if ($answer->getValue() =='no') 
	            {
	                $this->say($this->meaning());	           
	                $this->bot->startConversation(new CalculateCreditScore());
	            }
	            else
	            {	
	            	$this->bot->startConversation(new CalculateCreditScore());
	            }
	        } 
   		});
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askCreditScore();
    }
}
