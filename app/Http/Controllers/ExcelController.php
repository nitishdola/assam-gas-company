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
}
