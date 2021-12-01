<?php

namespace App\Controllers;

use \App\Models\PositionModel;

class Position extends BaseController {
  public function index() {
    helper('form');
    $p_model = new PositionModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/position', [
      'positions' => $p_model->paginate(15),
      'pager'     => $p_model->pager
    ]);
    echo view('admin/templates/footer');
  }

  public function displayAddPosition() {
    helper('form');
    $p_model = new PositionModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/position', [
      'positions' => $p_model->paginate(15),
      'pager'     => $p_model->pager
    ]);
    echo view('admin/position_mgt/create');
    echo view('admin/templates/footer');
  }

  public function displayEditPosition() {
    helper('form');
    $p_model = new PositionModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/position', [
      'positions' => $p_model->paginate(15),
      'pager'     => $p_model->pager,
      'position'  => $p_model->find(esc($this->request->getPost('p')))
    ]);
    echo view('admin/position_mgt/edit');
    echo view('admin/templates/footer');
  }

  public function displayDeletePosition() {
    helper('form');
    $p_model = new PositionModel();
    echo view('admin/templates/header');
    echo view('admin/templates/sidebar');
    echo view('admin/position', [
      'positions' => $p_model->paginate(15),
      'pager'     => $p_model->pager,
      'position'  => $p_model->find(esc($this->request->getPost('p')))
    ]);
    echo view('admin/position_mgt/confirm_delete');
    echo view('admin/templates/footer');
  }

  public function update() {
    if($this->validate([
      'post' => 'required',
      'al_c' => 'required',
    ])){
      helper('form');
      $p_model = new PositionModel();
      
      $p_model->save([
        'position_id'       => esc($this->request->getPost('p')),
        'position'          => esc($this->request->getPost('post')),
        'allowed_candidate' => esc($this->request->getPost('al_c')),
      ]);

      session()->setTempData('success', 'The Position was successfully addedd!', 2);
      return redirect()->to('admin/position');
    } else {
      session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
      return redirect()->to('admin/position');
    }
  }

  public function delete() {
    helper('form');
    $p_model = new PositionModel();
    
    $p_model->delete([
      'position_id' => esc($this->request->getPost('p')),
    ]);

    session()->setTempData('success', 'The Position was successfully deleted!', 2);
    return redirect()->to('admin/position');
  }

  public function create() {
    if($this->validate([
      'post' => 'required',
      'al_c' => 'required',
    ])){
      helper('form');
      $p_model = new PositionModel();
      
      $p_model->save([
        'position'          => esc($this->request->getPost('post')),
        'allowed_candidate' => esc($this->request->getPost('al_c')),
      ]);

      session()->setTempData('success', 'The Position was successfully addedd!', 2);
      return redirect()->to('admin/position');
    } else {
      session()->setTempData('error', 'Please don\'t leave any fields with red asterisk(*) unanswered.', 2);
      return redirect()->to('admin/position');
    }
  }
}