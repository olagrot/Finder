<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class RiddlesCest
{
    public const RIDDLES_PER_PAGE = 5;
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test functionality of riddles');

        $I->amGoingTo('see all necessary elements');
        $I->amOnPage('/riddles');
        $I->seeCurrentUrlEquals('/riddles/page/1');
        $I->see('Zagadki', 'h1');
        $I->see('Wylosuj zagadkę', "#random-riddle");
        $I->see('Filtruj', "#riddles-filter");
        $riddlesCount = $I->grabNumRecords('riddles');
        $riddlesOnPageCount = ($riddlesCount < self::RIDDLES_PER_PAGE) ? $riddlesCount : self::RIDDLES_PER_PAGE;
        $I->seeNumberOfElements('.riddle', $riddlesOnPageCount);
        $I->see('<', '#riddles-previous');
        $I->see('1', '#riddles-page-number');
        $I->see('>', '#riddles-next');

        $I->amGoingTo('filter riddles');
        $I->selectOption('category', 'geometria');
        $I->click("#riddles-filter");
        $I->seeCurrentUrlEquals('/riddles/page/1');

        $I->amGoingTo('choose one riddle');
        $I->amOnPage('/riddles/1');
        $I->dontSee('Zagadki', 'h1');
        $I->see('Powrót', "#riddle-back");
        $I->click("#riddle-back");

        $I->amGoingTo('draw one riddle');
        $I->click("#random-riddle");
        $I->seeCurrentUrlMatches('~/riddles/(\d+)~');
        $I->dontSee('Zagadki', 'h1');
        $I->see('Powrót', "#riddle-back");
        $I->click("#riddle-back");

        $I->amGoingTo('come back to all riddles');
        $I->selectOption('category', 'all');
        $I->click("#riddles-filter");

        $I->amGoingTo('test navigation of pages');
        $I->seeCurrentUrlEquals('/riddles/page/1');
        $I->see('1', "#riddles-page-number");
        $I->click("riddles-previous");
        $I->seeCurrentUrlEquals('/riddles/page/1');
        $I->click("riddles-next");
        if ($riddlesCount > 5) {
            $I->see('2', "#riddles-page-number");
            $I->seeCurrentUrlEquals('/riddles/page/2');
        } else {
            $I->seeCurrentUrlEquals('/riddles/page/1');
            $I->see('1', "#riddles-page-number");
        }
    }
}
