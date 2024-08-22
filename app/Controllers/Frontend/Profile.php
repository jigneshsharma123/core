<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\Profile;
class Profile_management extends BaseController
{
  public function index()
  {
    $profiles = new Profile();
    $profiles_data=$profiles->orderBy('sort_order ASC,first_name ASC, middle_name ASC, last_name ASC')->findAll();
    $this->mViewData['profile_list'] = $profiles_data;
    $this->mViewData['meta']['title'] ='Attorney Profiles';
    return view('frontend/profile/attorney_profiles', $this->mViewData);
  }	

  public function attorney_details($slug)
  {
    $profiles = new Profile();
    $profiles_data=$profiles->findAll();
    $this->mViewData['profile_list'] = $profiles_data;
    $profile_detail=$profiles->where('slug', $slug)->first();    
    $firstName = $profile_detail['first_name'];
    $middleName = $profile_detail['middle_name'];
    $lastName =  $profile_detail['last_name'];
    $fullName = $firstName . ' ' . $middleName . ''. $lastName;
    $this->mViewData['meta']['title'] =  $fullName;
    $this->mViewData['profile_detail'] = $profile_detail;
    return view('frontend/profile/attorney_details' ,$this->mViewData);
  }	
}
