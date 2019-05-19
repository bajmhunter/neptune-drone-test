<?php 

class LoginCest
{
    public function LoginPage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Login');  
    }
}
