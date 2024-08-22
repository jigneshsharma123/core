<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\Service;
class Service_management extends BaseController
{
  public function index()
  {
    $services = new Service();
    $services_data=$services->orderBy('sort_order ASC,first_name ASC, middle_name ASC, last_name ASC')->findAll();
    $this->mViewData['service_list'] = $services_data;
    $this->mViewData['meta']['title'] ='Services';
    return view('frontend/service/attorney_services', $this->mViewData);
  }	

  public function service_detail($slug)
  {
    $services = new Service();
    $services_data=$services->findAll();
    $this->mViewData['service_list'] = $services_data;
    $service_detail=$services->where('slug', $slug)->first();    
    $serviceTitle = $service_detail['name'];
    $this->mViewData['page_title'] =  $serviceTitle;
    $this->mViewData['meta']['title'] =  $serviceTitle;
    $this->mViewData['service_detail'] = $service_detail;
    return  view('themes/'.$this->theme.'/'.$service_detail->template, $this->mViewData);
    //return view('frontend/service/attorney_details' ,$this->mViewData);
  }	
}
