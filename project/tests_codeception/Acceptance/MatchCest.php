<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class MatchCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test matching functionalities');
        $I->wantTo('Check if unauthenticated user can see matching subpages');
        $I->amOnPage('/match/find');
        $I->seeCurrentUrlEquals('/login');
        $I->amOnPage('/match/show');
        $I->seeCurrentUrlEquals('/login');

        $I->wantTo('Find match');
        $I->amOnPage("/login");

        $I->fillField("email", "john.doe@gmail.com");           //using seeded user
        $I->fillField("password", "secret");

        $I->click("login-button");
        $I->amOnPage('/match/find');
        $I->see('Znaleziono matematyka!');
        $I->see('Tim');
        $I->click('accept');
        $I->see('Znaleziono matematyka!');
        $I->see('Anne');
        $I->click('accept');
        $I->see('Znaleziono matematyka!');
        $I->see('Elenora');
        $I->click('deny');
        $I->see('Niestety nie znaleziono nikogo spełniającego twoje wymagania');

        $I->wantTo('Check if program will not show matches prematurely');
        $I->amOnPage('/match/show');
        $I->dontSee('Tim');
        $I->dontSee('Anne');
        $I->dontSee('Elenora');
    }
}
