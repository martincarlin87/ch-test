<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

use Models\WindTurbine;

final class WindTurbineTest extends TestCase
{

	public function testStartDefault() : void
	{
		$windTurbine = new WindTurbine();
		$this->assertEquals(1, $windTurbine->getStart());
	}

	public function testStartModification() : void
	{
		$windTurbine = new WindTurbine();
		$windTurbine->setStart(5);
		$this->assertEquals(5, $windTurbine->getStart());
	}

	public function testStartMustBeAnInteger() : void
	{
		$windTurbine = new WindTurbine();

		$this->expectException(TypeError::class);
		$windTurbine->setStart('test');
		$this->assertNotEquals('test', $windTurbine->getStart());

		$this->expectException(TypeError::class);
		$windTurbine->setStart(2.5);
		$this->assertNotEquals(2.5, $windTurbine->getStart());

		$this->expectException(TypeError::class);
		$windTurbine->setStart(true);
		$this->assertNotEquals(true, $windTurbine->getStart());

		$this->expectException(TypeError::class);
		$windTurbine->setStart([1, 2, 3]);
		$this->assertNotSame([1, 2, 3], $windTurbine->getStart());
	}

	public function testEndDefault() : void
	{
		$windTurbine = new WindTurbine();
		$this->assertEquals(100, $windTurbine->getEnd());
	}

	public function testEndModification() : void
	{
		$windTurbine = new WindTurbine();
		$windTurbine->setEnd(200);
		$this->assertEquals(200, $windTurbine->getEnd());
	}

	public function testEndMustBeAnInteger() : void
	{
		$windTurbine = new WindTurbine();

		$this->expectException(TypeError::class);
		$windTurbine->setEnd('test');
		$this->assertNotEquals('test', $windTurbine->getEnd());

		$this->expectException(TypeError::class);
		$windTurbine->setEnd(2.5);
		$this->assertNotEquals(2.5, $windTurbine->getEnd());

		$this->expectException(TypeError::class);
		$windTurbine->setEnd(true);
		$this->assertNotEquals(true, $windTurbine->getEnd());

		$this->expectException(TypeError::class);
		$windTurbine->setEnd([1, 2, 3]);
		$this->assertNotSame([1, 2, 3], $windTurbine->getEnd());
	}

	public function testItemsDefault() : void
	{
		$windTurbine = new WindTurbine();

		$this->assertSame(
			[
       			3 => "Coating Damage",
       			5 => "Lightning Strike",
			], $windTurbine->getItems()
		);
	}

	public function testAnItemCanBeAdded() : void
	{
		$windTurbine = new WindTurbine();
		$windTurbine->addItem([7 => "Rust"]);

		$this->assertSame(
			[
       			3 => "Coating Damage",
       			5 => "Lightning Strike",
       			7 => "Rust",
			], $windTurbine->getItems()
		);
	}

	public function testAnItemCanBeRemovedByKey() : void
	{
		$windTurbine = new WindTurbine();
		$windTurbine->addItem([7 => "Rust"]);
		$windTurbine->removeItemByKey(7);

		$this->assertSame(
			[
       			3 => "Coating Damage",
       			5 => "Lightning Strike",
			], $windTurbine->getItems()
		);
	}

	public function testAnItemCanBeRemovedByValue() : void
	{
		$windTurbine = new WindTurbine();
		$windTurbine->addItem([7 => "Rust"]);
		$windTurbine->removeItemByValue("Rust");

		$this->assertSame(
			[
       			3 => "Coating Damage",
       			5 => "Lightning Strike",
			], $windTurbine->getItems()
		);
	}

	public function testOutput() : void
	{
		$windTurbine = new WindTurbine();
		$windTurbine->setStart(1);
		$windTurbine->setEnd(15);

		$this->assertSame(
			[
       			1 => "1",
       			2 => "2",
       			3 => "Coating Damage",
       			4 => "4",
       			5 => "Lightning Strike",
       			6 => "Coating Damage",
       			7 => "7",
       			8 => "8",
       			9 => "Coating Damage",
       			10 => "Lightning Strike",
       			11 => "11",
       			12 => "Coating Damage",
       			13 => "13",
       			14 => "14",
       			15 => "Coating Damage and Lightning Strike",
			], $windTurbine->getOutput()
		);
	}

	public function testProductOfArrayKeys() : void
	{
		$windTurbine = new WindTurbine();

		$this->assertSame(15, $windTurbine->getMaxItemsProduct());
	}

	public function testConcatenatedValues() : void
	{
		$windTurbine = new WindTurbine();
		$this->assertSame("Coating Damage and Lightning Strike", $windTurbine->getConcatenatedValues());

		$windTurbine->addItem([7 => "Rust"]);
		$this->assertSame("Coating Damage, Lightning Strike and Rust", $windTurbine->getConcatenatedValues());

		$windTurbine = new WindTurbine();
		$windTurbine->removeItemByValue("Coating Damage");
		$this->assertSame("Lightning Strike", $windTurbine->getConcatenatedValues());
	}

	public function testGetItemLabel() : void
	{
		$windTurbine = new WindTurbine();

		$this->assertSame("1", $windTurbine->getItemLabel(1));

		$this->assertSame("Coating Damage", $windTurbine->getItemLabel(3));
		$this->assertSame("Lightning Strike", $windTurbine->getItemLabel(5));
		$this->assertSame("Coating Damage", $windTurbine->getItemLabel(6));
		$this->assertSame("Lightning Strike", $windTurbine->getItemLabel(10));
		$this->assertSame("Coating Damage and Lightning Strike", $windTurbine->getItemLabel(15));
		$this->assertSame("Coating Damage and Lightning Strike", $windTurbine->getItemLabel(30));

		$windTurbine->addItem([7 => "Rust"]);
		$this->assertSame("Rust", $windTurbine->getItemLabel(7));
		$this->assertSame("Rust", $windTurbine->getItemLabel(14));
		$this->assertSame("Coating Damage, Lightning Strike and Rust", $windTurbine->getItemLabel(105));
	}
}
