<?php 

class SignInCest
{
    public function SignIn(AcceptanceTester $I)
    {
    	$I->amOnPage('/login');
		$I->fillField('username', 'admin');
		$I->fillField('password', 'password');
		$I->click('Sign In');
		$I->see('Repair');
    }
}
