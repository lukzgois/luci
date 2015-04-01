<?php
namespace dashboard;
use \AcceptanceTester;

class DashboardCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->fillField('email', 'admin@luci.dev');
        $I->fillField('password', 'admin');

        $I->click('button[type=submit]');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function it_shows_the_menu(AcceptanceTester $I)
    {
        $I->am('A user');
        $I->wantTo('see the dashboard menu');

        $I->amOnPage('/');
        $I->see('Home');
        $I->see('Projects');

    }
}