<?php
  class ListArea extends AppModel {

    public function getAreaNames ($term = null) {
      if(!empty($term)) {
        $cars = $this->find('list', array(
          'conditions' => array(
            'name LIKE' => trim($term) . '%'
          )
        ));
        return $cars;
      }
      return false;
    }
  }
