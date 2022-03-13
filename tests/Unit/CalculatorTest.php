<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\CalcFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;



class CalculatorTest extends TestCase
{
    /**
     * Test can create addition class and returns correct value
     *
     * @return void
     */
    public function testCreateAndExecuteAddition()
    {
        $calc = CalcFactory::build('add');
        $result = $calc->calculate(2,2);

        $this->assertEquals($result,4);
    }

    /**
     * Test can create subtraction class and returns correct value
     *
     * @return void
     */
    public function testCreateAndExecuteSubtraction()
    {
        $calc = CalcFactory::build('subtract');
        $result = $calc->calculate(4.3,2);

        $this->assertEquals($result,2.3);
    }

    /**
     * Test can create division class and returns correct value
     *
     * @return void
     */
    public function testCreateAndExecuteDivision()
    {
        $calc = CalcFactory::build('divide');
        $result = $calc->calculate(10,2);

        $this->assertEquals($result,5);
    }

    /**
     * Test can create multiply class and returns correct value
     *
     * @return void
     */
    public function testCreateAndExecuteMultiple()
    {
        $calc = CalcFactory::build('multiply');
        $result = $calc->calculate(150,4);

        $this->assertEquals($result,600);
    }
}
