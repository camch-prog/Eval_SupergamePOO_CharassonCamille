<?php

class ModelPlayer extends Model {
    // ATTRIBUTS
    private int $id;
    private string $pseudo;
    private int $score;
    private string $team;
    private int $idTeam;


    //GETTER SETTER
    public function getId():int {
        return $this->id;
    }
    public function setId(int $newId):ModelPlayer {
        $this->id = $newId;
        return $this;
    }
    public function getPseudo():string {
        return $this->pseudo;
    }
    public function setPseudo(string $newPseudo):ModelPlayer {
        $this->pseudo = $newPseudo;
        return $this;
    }
    public function getScore():int {
        return $this->score;
    }
    public function setScore(int $newScore):ModelPlayer {
        $this->score = $newScore;
        return $this;
    }
    public function getTeam():string {
        return $this->team;
    }
    public function setTeam(int $newTeam):ModelPlayer {
        $this->team = $newTeam;
        return $this;
    }
    public function getIdTeam():int {
        return $this->idTeam;
    }
    public function setTeamId(int $newIdTeam):ModelPlayer {
        $this->idTeam = $newIdTeam;
        return $this;
    }

    // METHODES 
    public function findAll(): array {
        try{
            //1. Preparer la requête
            $sql = 'SELECT p.id_player, p.pseudo, p.score, p.id_Team, t.team FROM player p INNER JOIN team t ON p.id_Team = t.id_Team';

            $req = $this->getBdd()->prepare($sql);

            //2. Exécution de la requête
            $req->execute();

            //3. Retourner les données
            return $req->fetchAll(PDO::FETCH_ASSOC);

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }
    public function findByPseudo():null | bool | array {
        try {
            $sql='SELECT p.id_player, p.pseudo, p.score, p.id_Team FROM player p WHERE p.pseudo = ?';

            $req = $this->getBdd()->prepare($sql);

            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);

            $req->execute();

            return $req->fetch(PDO::FETCH_ASSOC);

        } catch(EXCEPTION $error){
            die($error->getMessage());
        }
        }
    
    public function add(): void {
        try {
            //Preparation de la requête
            $sql='INSERT INTO player (pseudo, score, id_Team) VALUES (?,?,?)';

            $req = $this->getBdd()->prepare($sql);

            //Binding de Param
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_STR);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_STR);

            //Exécution de la requête
            $req->execute();

        } catch(EXCEPTION $error){
            die($error->getMessage());
        }

    }
    public function delete(): void {
        try {
            $sql = 'DELETE FROM player WHERE title = id';
            $req = $this -> getBdd() -> prepare($sql);
            $req -> bindvalue(1,$this->id,PDO::PARAM_STR);
            $req -> execute();

        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function update(): void {
        try {
            $sql = 'UPDATE player SET pseudo = ?, score = ?, idTeam =?   WHERE id = ?';
            $req = $this -> getBdd() -> prepare($sql);
            $req -> bindvalue(1,$this->pseudo,PDO::PARAM_STR);
            $req -> bindvalue(2,$this->score,PDO::PARAM_STR);
            $req -> bindvalue(3,$this->idTeam,PDO::PARAM_STR);
            $req -> bindvalue(3,$this->id,PDO::PARAM_STR);
            $req -> execute();
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }

    }
} 