<?php

namespace App\Conversations;



use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;



class CalculateCreditScore extends Conversation
{
	public function gettingCreditScore()
	{
		$obj=new calculatescore();
		return $obj->gettingCreditScore();
	}
    public function askCreditScore()
    {   	
    	
    	$buttonhelpinfo="(please click either of the buttons below)";
        $question = Question::create("Would you like to know how to check your credit score?".$buttonhelpinfo)
            ->addButtons([
                Button::create('yes')->value('yes'),
                Button::create('no')->value('no'),
            ]);

        $this->ask($question, function (Answer $answer) 
        {
	        if ($answer->isInteractiveMessageReply())
	        {
	            if ($answer->getValue() =='yes') 
	            {
	                $this->say($this->gettingCreditScore());
	            }
	            $this->say("You can now ask me any query that you may have<br>
	            	e.g. ways in which i can improve my credit score");
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
