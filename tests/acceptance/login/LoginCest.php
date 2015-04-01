<?php
namespace login;
use \AcceptanceTester;

class LoginCest
{

    public function it_should_login_the_user(AcceptanceTester $I)
    {
        $I->am('A user');
        $I->wantTo('Login on the application');

        $I->amOnPage('/auth/login');
        $I->see('E-Mail Address');
        $I->see('Password');

        $I->fillField('email', 'admin@luci.dev');
        $I->fillField('password', 'admin');
        $I->click('button[type=submit]');

        $I->seeCurrentUrlEquals('/home');
    }

    public function it_should_display_errors_if_no_data_is_sent(AcceptanceTester $I)
    {
        $I->am('A user');
        $I->wantTo('Login with no data');

        $I->amOnPage('/auth/login');

        $I->click('button[type=submit]');

        $I->seeCurrentUrlEquals('/auth/login');
        $I->see('The email field is required.');
        $I->see('The password field is required.');
    }

    public function it_should_display_errors_if_invalid_email_is_sent(AcceptanceTester $I)
    {
        $I->am('A user');
        $I->wantTo('Login with no data');

        $I->amOnPage('/auth/login');

        $I->fillField('email', 'wrongemail');
        $I->click('button[type=submit]');

        $I->seeCurrentUrlEquals('/auth/login');
        $I->see('The email must be a valid email address.');
    }

    public function it_should_display_errors_if_invalid_credentials_is_sent(AcceptanceTester $I)
    {
        $I->am('A user');
        $I->wantTo('Login with invalid credentials');

        $I->amOnPage('/auth/login');

        $I->fillField('email', 'admin@luci.dev');
        $I->fillField('password', 'wrongpassword');

        $I->click('button[type=submit]');

        $I->seeCurrentUrlEquals('/auth/login');
        $I->see('These credentials do not match our records.');
    }



}