<?php

abstract class ReadFileAbstract
{
  protected $fileName;
  protected $contents;

  public function getFileName()
  {
    return $this->fileName;
  }

  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }

  public function getContents()
  {
    return $this->contents;
  }
}

class ReadFile extends ReadFileAbstract
{
  const DOCUMENTS_PATH = "doc_path";

  public function __construct($fileName)
  {
    $this->setFileName($fileName);
    $this->contents = file_get_contents(self::DOCUMENTS_PATH . "/" . $this->fileName);
  }
}

class ReadFileProxy extends ReadFileAbstract
{
  private $file;

  public function __construct($fileName)
  {
    $this->fileName = $fileName;
  }

  public function lazyLoad()
  {
    if ($this->file === null) {
      $this->file = new ReadFile($this->fileName);
    }
    return $this->file;
  }
}

$proxies = array();

for ($i = 0; $i < 10; $i++) {
    // tell the proxy which file should be read (when lazy loaded)
  $proxies[$i] = new ReadFileProxy("file" . $i . ".txt");
}

// Now it's time to read the contents of file3.txt
$file3 = $proxies[3]->lazyLoad();

// echo the contents of file3.txt
echo $file3->getContents();

?>
