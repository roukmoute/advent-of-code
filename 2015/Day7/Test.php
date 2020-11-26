<?php
use AdventOfCode\Day7\Day7;

class Test extends \PHPUnit_Framework_TestCase
{
    /** @var Day7 */
    private $day7;

    public function testSignal123IsProvidedToWireX()
    {
        $circuit = new Day7('123 -> x');
        $this->assertSame(123, $circuit->signal('x'));
    }

    public function testSignalsProvidedToWires()
    {
        $circuit = new Day7('123 -> x
456 -> y');
        $this->assertSame(123, $circuit->signal('x'));
        $this->assertSame(456, $circuit->signal('y'));
    }

    public function testBitwiseANDOfWireXAndWireYIsProvidedToWireZ()
    {
        $circuit = new Day7('123 -> x
456 -> y
x AND y -> d');
        $this->assertSame(72, $circuit->signal('d'));
    }

    public function testBitwiseANDOfWireIntegerAndWireYIsProvidedToWireZ()
    {
        $circuit = new Day7('123 -> x
1 AND x -> d');
        $this->assertSame(1, $circuit->signal('d'));
    }

    public function testBitwiseOROfWireXAndWireYIsProvidedToWireZ()
    {
        $circuit = new Day7('123 -> x
456 -> y
x OR y -> d');
        $this->assertSame(507, $circuit->signal('d'));
    }

    public function testWirePIsLeftShiftedBy2AndThenProvidedToWireQ()
    {
        $circuit = new Day7('123 -> p
p LSHIFT 2 -> q');
        $this->assertSame(492, $circuit->signal('q'));
    }

    public function testWirePIsRightShiftedBy2AndThenProvidedToWireQ()
    {
        $circuit = new Day7('456 -> p
p RSHIFT 2 -> q');
        $this->assertSame(114, $circuit->signal('q'));
    }

    public function testBitwiseComplementOfTheValueFromWireEIsProvidedToWireF()
    {
        $circuit = new Day7('123 -> e
NOT e -> f');
        $this->assertSame(65412, $circuit->signal('f'));
    }

    public function testSimpleCircuit()
    {
        $circuit = new Day7('123 -> x
456 -> y
x AND y -> d
x OR y -> e
x LSHIFT 2 -> f
y RSHIFT 2 -> g
NOT x -> h
NOT y -> i');
        $this->assertSame(72, $circuit->signal('d'));
        $this->assertSame(507, $circuit->signal('e'));
        $this->assertSame(492, $circuit->signal('f'));
        $this->assertSame(114, $circuit->signal('g'));
        $this->assertSame(65412, $circuit->signal('h'));
        $this->assertSame(65079, $circuit->signal('i'));
        $this->assertSame(123, $circuit->signal('x'));
        $this->assertSame(456, $circuit->signal('y'));
    }

    public function testComplexCircuit()
    {
        $circuit = new Day7('b RSHIFT 5 -> f
e AND f -> h
e OR f -> g
0 -> c
14146 -> b
b RSHIFT 2 -> d
c LSHIFT 1 -> t
NOT h -> i
b RSHIFT 3 -> e
b RSHIFT 1 -> v');
        $this->assertSame(0, $circuit->signal('c'));
        $this->assertSame(14146, $circuit->signal('b'));
        $this->assertSame(3536, $circuit->signal('d'));
        $this->assertSame(0, $circuit->signal('t'));
        $this->assertSame(1768, $circuit->signal('e'));
        $this->assertSame(7073, $circuit->signal('v'));
        $this->assertSame(442, $circuit->signal('f'));
        $this->assertSame(168, $circuit->signal('h'));
        $this->assertSame(2042, $circuit->signal('g'));
        $this->assertSame(65367, $circuit->signal('i'));
    }
}
