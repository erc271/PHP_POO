<?
class Animal {
    public $nom;
    public $age;

    public function manger() {
        echo "Je mange. ";
    }
}

class Chat extends Animal {
    public function miauler() {
        echo "Miaou!";
    }
}

$chat = new Chat();

$chat->manger();

$chat->miauler();

echo $chat->nom; 

?>