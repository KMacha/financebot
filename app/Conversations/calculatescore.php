<?php

namespace App\Conversations;

class calculatescore
{
	public function metropolInfo()
    {
    	$answer=<<< _END_OF_TEXT
    			<h3>Metropol</h3>
    	To check using Metropol you can:
    	<ul>
	    	 <li>
	    	 	Access the <a target="_blank" href="https://www.metropol.co.ke/crystobol/">Metropol</a> website
	    	 </li> 
	    	 <li> 
	    	 	You can also download and use their metropol Crystobol app or dial *433#
	    	 </li>
    	
    	</ul>

    	<h4>Meaning of the Credit Score</h4>

    	Metropol awards scores between 200 and 900
    	<p style="color:red;">A score below 400 translates that you are a defaulter.</p>
    	<p style="color:green;">Any score above 400 means fair.</p>
    	<p style="color:blue;">
    	Any score close to 900 is considered to be a good credit score.
    	</p>
_END_OF_TEXT;

		return $answer;

    }

    public function transunionInfo()
    {
    	$answer=<<< _END_OF_TEXT
    			<h3>TransUnion</h3>
    	To check via transunion you can:
    	<ul>
    		<li>Send an sms to number 21272</li>
    		<li>Use their TransUnion Nipashe app</li>
    		<li>Ues the <a target="_blank" href="https://www.transunion.com/">Transunion website </a> </li>
    	</ul>
_END_OF_TEXT;

		return $answer;
    }

     public function gettingCreditScore()
    {
    	$answer=<<< _END_OF_TEXT
    	In Kenya there are 3 institutions with clearance.
    	These institutions are referred to as <i> <b>CRB's</b> i.e. credit reference bureaus</i>
    	They include:
    	<ol>
    		<li>Metrolpol</li>
    		<li>Transunion</li>
    		<li>CreditInfo</li>
    	</ol>
    	<h2>Checking your credit score with the above CRB'S</h2>
_END_OF_TEXT;

		
		$answer.=$this->metropolInfo().$this->transunionInfo();

		return $answer;

    }	
}

?>