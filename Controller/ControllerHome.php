<?php

class ControllerHome extends Controller{
    public function displayPlayers(): ControllerHome {
        $data=$this->getModel()->findAll();
        $this->getView()->setDatas($data);
        return $this;
    }
    public function registerPlayer(): ControllerHome {
        //verifier que le formulaire est bien recu
        if(isset($_POST["submit"])){
            //verifier que les champs soient bien remplis
            if(empty($_POST["pseudo"]) || empty($_POST["score"]) || empty($_POST["teams"])){
                $this->getView()->setMessage("Un des champs n'est pas remplis");
                return $this;
            }
            //Netoyer les données
            $pseudo=sanitize($_POST["pseudo"]);
            $score=sanitize($_POST["score"]);
            $team=sanitize($_POST["teams"]);

            //verifier que le pseudo n'est pas déjà pruis
            $this->getModel()->setPseudo($pseudo);

            $data= $this->getModel()->findByPseudo();
            if($data){
                $this->getView()->setMessage("Ce pseudo est déjà pris");
                return $this;
            }
            //Verifier que le score est bien un nombre
            if(!is_numeric($score)){
                $this->getView()->setMessage("Le score doit etre un nombre");
                return $this;
            }

            
            $this->getModel()->setScore($score);
            $this->getModel()->setTeamId($team);

            $this->getModel()->add();

            $this->getView()->setMessage("Le joueur à bien été ajouté");

        }
        return $this;
    }
}