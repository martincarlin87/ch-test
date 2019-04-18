<?php

declare(strict_types = 1);

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
		$key = key($item);
		$this->items[$key] = $item[$key];
	}

	public function removeItemByKey(int $key) : void
	{
		if ($key !== false) {
			unset($this->items[$key]);
		}
	}

	public function removeItemByValue(string $value) : void
	{
		$key = array_search($value, $this->items);

		$this->removeItemByKey($key);
	}

	public function checkItems() : void
	{
		$this->output = [];

		foreach (range($this->start, $this->end) as $i) {
    		$this->output[$i] = $this->getItemLabel($i);
		}
	}

	public function getMaxItemsProduct() : int
	{
		$keys = array_keys($this->items);
		
		$product = array_reduce($keys, array($this, "getProduct"), 1);

		return $product;
	}

	private function getProduct(int $carry, int $item) : int
	{
		$carry *= $item;
        return $carry;
	}

	public function getConcatenatedValues() : string
	{
		$values = array_values($this->getItems());

		// remove last value from the array so that we can prefix it with 'and' if appropriate
		$last = array_pop($values);
		
		$sentence = count($values) > 0 ? implode(', ', $values) . ' and ' . $last : $last;

		return $sentence;
	}

	public function getItemLabel(int $i) : string
	{
		// cache these values in variables to prevent looking them up every single time
		$product = $this->getMaxItemsProduct();
		$concatenatedValues = $this->getConcatenatedValues();
		$items = $this->getItems();
		$keys = array_keys($items);
		
		if ($i % $product === 0) {
			// check if the integer is divisible by all keys of the $items array
			return $concatenatedValues;
		} else {
			// otherwise see if any of the array keys are divisible and return the first
			foreach ($keys as $key) {
				if ($i % $key === 0) {
					// $i divisible by current key, return the label for this key
					return $items[$key];
				} elseif ($key === end($keys)) {
					// no matches, return the current item we are processing
					return strval($i);
				}
			}
		} 
	}

	public function getOutput() : array
	{
		$this->checkItems();

		return $this->output;
	}
}