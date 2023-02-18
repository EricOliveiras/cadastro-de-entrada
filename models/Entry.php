<?php 
  class Entry {
    public $id;
    public $fullname;
    public $document;
    public $observation;
  }

  interface EntryDAOInterface {
    public function create(Entry $entry);
    public function findAll();
    public function find($id);
    public function update(Entry $entry);
    public function delete($id);
  }
?>