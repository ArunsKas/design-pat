<?php 

class CocaCola {
    
    private $fizzy;
    private $healthy;
    private $tasty;
 
    /**
     * init a CocaCola drink
     */
    public function __construct() {
        $this->fizzy   = true;
        $this->healthy = false;
        $this->tasty   = true;
    }
 
    /**
     * This magic method is required, even if empty as part of the prototype pattern
     */
    public function __clone() {
    }
 
}

$cola = new CocaCola();
echo '<pre>';
var_dump($cola);
echo '</pre>';

$colaClone = clone $cola;

echo '<pre>';
var_dump($colaClone);
echo '</pre>';

?>