<?php

interface Music
{
  public function play();
}

class Song implements Music
{
  public $id;
  public $name;

  public function  __construct(string $name)
  {
    $this->id = uniqid();
    $this->name = $name;
  }

  public function play()
  {
    printf("Playing song #%s, %s.\n", $this->id, $this->name);
  }
}

class Playlist implements Music
{
  private $songs = array();

  public function addSong(Music $content): bool
  {
    $this->songs[spl_object_hash($content)] = $content;
    return true;
  }

  public function removeItem(Music $content): bool
  {
    unset($this->songs[spl_object_hash($content)]);
    return true;
  }

  public function play()
  {
    foreach ($this->songs as $content) {
      $content->play();
    }
  }
}

$songOne = new Song('Lost In Stereo');
$songTwo = new Song('Running From Lions');
$songThree = new Song('Guts');
$playlistOne = new Playlist();
$playlistTwo = new Playlist();
$playlistThree = new Playlist();
$playlistTwo->addSong($songOne);
$playlistTwo->addSong($songTwo);
$playlistThree->addSong($songThree);
$playlistOne->addSong($playlistTwo);
$playlistOne->addSong($playlistThree);
$playlistOne->play();

?>
