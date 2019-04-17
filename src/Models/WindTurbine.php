<?php

namespace Models;

class WindTurbine
{
	private $start = 1;
	private $end = 100;

	private $output;

	private $items = [
       3 => "Coating Damage",
       5 => "Lightning Strike",
	];

	public function getStart() : int
	{
		return $this->start;
	}

	public function setStart(int $newStart) : void
	{
		$this->start = $newStart;
	}

	public function getEnd() : int
	{
		return $this->end;
	}

	public function setEnd(int $newEnd) : void
	{
		$this->end = $newEnd;
	}

	public function getItems() : array
	{
		return $this->items;
	}

	public function addItem(array $item) : void
	{
		$this->items[] = $item;
	}

	public function removeItemByKey(int $key) : void
	{
		if ($key !== false) {
			unset($this->items[$key]);
		}
	}

	public function removeItemByValue(string $value) : void
	{
		$key = array_search($value, $this->items))

		$this->removeItemByKey($key);
	}

	public function checkItems() : void
	{
		$this->output = [];

		foreach (range($this->start, $this->end) as $i) {
    		$this->output[$i] = $this->getItemLabel($i);
		}
	}

	private function getMaxItemsProduct() : int
	{
		$product = array_sum(array_keys($this->items));

		return $product;
	}

	private function getConcatenatedKeys() : string
	{
		$values = array_values($this->items);

		// remove last value from the array so that we can prefix it with 'and' if appropriate
		$last = array_pop($value);
		
		$sentence = count($values) > 1 ? implode(', ', $values) . ' and ' . $last : $last;

		return $sentence;
	}

	private function getItemLabel(int $i)] : string
	{
		// cache these values in variables to prevent looking them up every single time
		$product = $this->getMaxItemsProduct();
		$concatenatedKeys = $this->getConcatenatedKeys();
		$keys = array_keys($items);
		
		if ($i % $product === 0) {
			// check if the integer is divisible by all keys of the $items array
			return $concatenatedKeys;
		} else {
			// otherwise see if any of the array keys are divisible and return the first
			foreach ($keys as $key) {
				if ($i % $key) {
					return $this->items[$key];
				} else {
					// return the current item we are processing
					return strval($i);
				}
			}
		} 
	}

	private function getOutput() : array
	{
		return $this->output;
	}
}