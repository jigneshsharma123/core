<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\ProfileManagement;
class Advisory_Board extends BaseController
{
  public function index()
  {
    $profileManagements = new ProfileManagement();
    $profileManagements_data=$profileManagements->findAll();
    $this->mViewData['profileManagement_list'] = $profileManagements_data;
    $this->mViewData['meta']['title'] ='Advisory Board';
    return view('frontend/advisory_board/advisory_board', $this->mViewData);
  }	

  public function advisory_board_member($id)
  {
    $profileManagements = new ProfileManagement();
    $profileManagements_data=$profileManagements->findAll();
    $this->mViewData['profileManagement_list'] = $profileManagements_data;
    $profile_detail=$profileManagements->where('id', $id)->first();    
    $firstName = $profile_detail['first_name'];
    $middleName = $profile_detail['middle_name'];
    $lastName =  $profile_detail['last_name'];
    $fullName = $firstName . ' ' . $middleName . ''. $lastName;
    $this->mViewData['meta']['title'] =  $fullName;
    $this->mViewData['profile_detail'] = $profile_detail;
    return view('frontend/advisory_board/member' ,$this->mViewData);
  }	
}
