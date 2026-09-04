<?php 

class ViewHome extends View {


    // ATTRIBUTS
    private string $message ="";
    private array $datas =[];

    //GETTER SETTER
    public function getMessage():?string {
        return $this->message;
    }
    public function setMessage(string $newMessage): ViewHome{
        $this->message=$newMessage;
        return $this;
    }
    public function getDatas():array {
        return $this->datas;
    }
    public function setDatas(array $newDatas): ViewHome{
        $this->datas=$newDatas;
        return $this;
    }


    //METHODES
    public function displayMain(): ViewHome {
        echo '<main>
        <form action=""method="post">
            <label for="pseudo">Votre pseudo <input type="text" id="pseudo" name="pseudo"></label>
            <label for="score">Votre score <input type="text" id="score" name="score"></label>
            <label for="team_select">Choose a pet:</label>
            <select name="teams" id="team_select">
                <option value="">--Choisisez une équipe--</option>
                <option value="1">Aucune</option>
                <option value="2">TeamRocket</option>
                <option value="3">DreamTeam</option>
            <input type="submit" value="Ajouter le joueur" name="submit">
        </form>
        <div>'.$this->message.'</div>
        <h1>Liste de tous les joueurs</h1>';
        foreach($this->datas as $key) {
            echo "<h2>".$key["pseudo"]."</h2>";
            echo "<h2>".$key["score"]."</h2>";
            echo "<h2>".$key["team"]."</h2>";
        };
        echo '</main>';
        return $this;
    }
    public function displayAll(): void {
        $this->displayFooter();
        $this->displayMain();
        $this->displayFooter();
    }
}

?>

