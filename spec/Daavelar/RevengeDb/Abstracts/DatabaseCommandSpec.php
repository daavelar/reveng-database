<?php

namespace spec\Daavelar\RevengeDb\Abstracts;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DatabaseCommandSpec extends ObjectBehavior {
    function let()
    {
        $this->beAnInstanceOf('Daavelar\RevengeDb\Abstracts\DatabaseCommand');
    }

    public function it_converts_an_string_to_the_camel_case_pattern()
    {
        $this->toCamelCase('some_string_with_underscore')->shouldBe('SomeStringWithUnderscore');
    }
}
