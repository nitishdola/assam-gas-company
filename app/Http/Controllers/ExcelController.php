<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Excel;
use DB, Validator, Redirect, Auth, Crypt;
use App\Department,App\ChargeableAccount,App\Requisition,App\RequisitionItem, App\Rack,App\Location, App\Designation,App\Section, App\DepartmentUser,App\AccountsUser;

class ExcelController extends Controller
{
   public function download_department() {
      \Excel::create('Deprtments', function( $excel) {
        $excel->sheet('Department-data', function($sheet) {
          $sheet->setTitle('AGC Departments');

          $sheet->cells('A1:B1', function($cells) {
            $cells->setFontWeight('bold');
          });
          $departments = Department::select('name as Department', 'department_code as Department-Code')->orderBy('name')->get()->toArray();
          $sheet->fromArray($departments, null, 'A1', false, true);
        });
      })->download('xlsx');
    }

   public function download_section() {
     \Excel::create('Section', function( $excel) {
          $excel->sheet('Section-data', function($sheet) {
            $sheet->setTitle('AGC Section Data');

            $sheet->cells('A1:B1', function($cells) {
              $cells->setFontWeight('bold');
            });

            $d_sections = DB::table('sections')
                                       ->join('departments', 'sections.department_id', '=', 'departments.id')
                                       ->select('departments.name as dname','sections.name as name','sections.section_code as scode')
                                       ->get();
             $carray = array();
             foreach($d_sections as $k => $v) {
               $carray[$k]['Section'] = $v->name;
               $carray[$k]['Department'] = $v->dname;
               $carray[$k]['Section-code'] = $v->scode;

             }

            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
 }


    public function download_location() {
      \Excel::create('Locations', function( $excel) {
        $excel->sheet('Location-data', function($sheet) {
          $sheet->setTitle('AGC Locations');
          $sheet->cells('A1:B1', function($cells) {
          $cells->setFontWeight('bold');
          });
          $locations = Location::select('name as Location')->orderBy('name')->get()->toArray();
          $sheet->fromArray($locations, null, 'A1', false, true);
        });
      })->download('xlsx');
    }


    public function download_designation() {
      \Excel::create('Designations', function( $excel) {
        $excel->sheet('Designation-data', function($sheet) {
          $sheet->setTitle('AGC Designations');
          $sheet->cells('A1:B1', function($cells) {
          $cells->setFontWeight('bold');
          });
          $designations = Designation::select('name as Designation')->orderBy('name')->get()->toArray();
          $sheet->fromArray($designations, null, 'A1', false, true);
        });
      })->download('xlsx');
    }


    public function download_rack() {
     \Excel::create('Rack', function( $excel) {
          $excel->sheet('Rack-data', function($sheet) {
            $sheet->setTitle('AGC Rack Data');

            $sheet->cells('A1:B1', function($cells) {
              $cells->setFontWeight('bold');
            });

            $d_racks = DB::table('racks')
                                       ->join('locations', 'racks.location_id', '=', 'locations.id')
                                       ->select('locations.name as lname','racks.name as rname')
                                       ->get();
             $carray = array();
             foreach($d_racks as $k => $v) {
               $carray[$k]['Rack'] = $v->rname;
               $carray[$k]['Location'] = $v->lname;
              

             }

            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
     }
    
    public function departmentusers_dowonload() {
     \Excel::create('department_users', function( $excel) {
          $excel->sheet('Department-user-data', function($sheet) {
            $sheet->setTitle('AGC Department Users Data');

            $sheet->cells('A1:B1:C1:D1', function($cells) {
              $cells->setFontWeight('bold');
            });

            $department_users = DB::table('department_users')
                                       ->join('departments', 'department_users.department_id', '=', 'departments.id')
                                       ->join('designations', 'department_users.designation_id', '=', 'designations.id')
                                       ->join('sections', 'department_users.section_id', '=', 'sections.id')
                                       ->select('department_users.name as dname','designations.name as desig_name','sections.name as section_name','departments.name as department_name')
                                       ->get();
             $carray = array();
             foreach($department_users as $k => $v) {
               $carray[$k]['Name'] = $v->dname;
               $carray[$k]['Designation'] = $v->desig_name;
               $carray[$k]['Department'] = $v->department_name;
               $carray[$k]['section'] = $v->section_name;
              

             }

            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
 }

      public function accountusers_dowonload() {
      \Excel::create('Account Users', function( $excel) {
        $excel->sheet('Account-User-data', function($sheet) {
          $sheet->setTitle('AGC Account User');
          $sheet->cells('A1:B1', function($cells) {
          $cells->setFontWeight('bold');
          });
          $account_users = AccountsUser::select('name as Employee Name')->orderBy('name')->get()->toArray();
          $sheet->fromArray($account_users, null, 'A1', false, true);
        });
      })->download('xlsx');
    }
}
