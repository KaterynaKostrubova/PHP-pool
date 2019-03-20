<?php 
class UnholyFactory {
	private $fighters = Array();

	public function absorb($newFighter) {
		if ($newFighter instanceof Fighter) {
			$nameFighter = $newFighter->fighterType;
			if (in_array($newFighter, $this->fighters))
				print("(Factory already absorbed a fighter of type " . $nameFighter . ")" . PHP_EOL);
			else {
				print("(Factory absorbed a fighter of type " . $nameFighter . ")" . PHP_EOL);
				$this->fighters["$nameFighter"] = $newFighter;
			}
		} else {
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
	}

	public function fabricate($fabricateFighter) {
		$f = false;
		foreach ($this->fighters as $key => $val) {
			if ($fabricateFighter == $key) {
				$f = true;
			}
		}
		if ($f) {
			print("(Factory fabricates a fighter of type " . $fabricateFighter . ")" . PHP_EOL);
			return (new $this->fighters["$fabricateFighter"]);
		} else {
			print("(Factory hasn't absorbed any fighter of type " . $fabricateFighter . ")" . PHP_EOL);
		}
	}
}
?>