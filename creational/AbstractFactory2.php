<?php

// ** Rules
// 1. Each product factory must extend the same abstract class or implement the 
// same interface.
// 2. Each product factory must have multiple methods, one for each class it 
// wants to initialise.
// 3. Each product factory class you create must have the same methods. The 
// same methods in each factory must return polymorphic class instances and 
// implement the same interface . If this is still unclear, the example should 
// clear things up.

abstract class AbstractOutputTypeFactory
{
    abstract public function prettyOutput();
 
    abstract public function uglyOutput();
}

abstract class AbstractPrettyOutput
{
    abstract public function getPrettyOutput();
}

abstract class AbstractUglyOutput
{
    abstract public function getUglyOutput();
}

class WebOutputTypeFactory extends AbstractOutputTypeFactory
{
    public function prettyOutput()
    {
        return new WebPrettyOutput();
    }
 
    public function uglyOutput()
    {
        return new WebUglyOutput();
    }
}

class DataOutputTypeFactory extends AbstractOutputTypeFactory
{
    public function prettyOutput()
    {
        return new DataPrettyOutput();
    }
 
    public function uglyOutput()
    {
        return new DataUglyOutput();
    }
}

class WebPrettyOutput extends AbstractPrettyOutput
{
    public function getPrettyOutput()
    {
        return '<h1>Imagine you had some really pretty web output here</h1>';
    }
}

class WebUglyOutput extends AbstractUglyOutput
{
    public function getUglyOutput()
    {
        return 'Imagine you had some really ugly web output here';
    }
}

class DataPrettyOutput extends AbstractPrettyOutput
{
    public function getPrettyOutput()
    {
        return "{ 'text': 'Imagine you had some really pretty data output here' }";
    }
}

class DataUglyOutput extends AbstractUglyOutput
{
    public function getUglyOutput()
    {
        return 'Imagine, you, had, some, really, ugly, CSV, output, here';
    }
}

$webFactory = new WebOutputTypeFactory();

$webPretty = $webFactory->prettyOutput();
echo $webPretty->getPrettyOutput();
echo '</br>';

$webUgly = $webFactory->uglyOutput();
echo $webUgly->getUglyOutput(); 
echo '</br>';

$dataFactory = new DataOutputTypeFactory();
 
$dataPretty = $dataFactory->prettyOutput();
echo $dataPretty->getPrettyOutput(); 
echo '</br>';

$dataUgly = $dataFactory->uglyOutput();
echo $dataUgly->getUglyOutput();
echo '</br>';

?>
