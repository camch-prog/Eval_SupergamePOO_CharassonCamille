<?php

class Controller {
    private Model $model;
    private View $view;

    public function __construct(Model $model, View $view)
    {
        $this->model=$model;
        $this->view=$view;
    }
    public function getModel(): Model {
        return $this->model;
    }
    public function setModel(Model $model): Controller {
        $this->model = $model;
        return $this;        
    }
    public function getView(): View {
        return $this->view;
    }
    public function setView(View $view): Controller {
        $this->view = $view;
        return $this;  
    }
    public function render():void {
        $this->getView()->displayAll();
    }
}