<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Excel;
use DB, Validator, Redirect, Auth, Crypt;
use App\Department,App\ChargeableAccount,App\Requisition,App\RequisitionItem, App\Rack,App\Location, App\Designation,App\Section, App\DepartmentUser,App\AccountsUser,App\BudgetHead,App\BudgetHeadTransaction;

class ExcelController extends Controller
{
   public function download_department() {
      Excel::create('Deprtments', function( $excel) {
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
        Excel::create('Section', function( $excel) {
          $excel->sheet('Section-data', function($sheet) {
            $sheet->setTitle('AGC Section Data');

            $sheet->cells('A1:B1', function($cells) {
              $cells->setFontWeight('bold');
            });
            $d_sections    = DB::table('sections')
                           ->join('departments', 'sections.department_id', '=', 'departments.id')
                           ->select('departments.name as dname','sections.name as name','sections.section_code as scode')
                           ->get();
             $carray       = array();
             foreach($d_sections as $k => $v) {
               $carray[$k]['Section']      = $v->name;
               $carray[$k]['Department']   = $v->dname;
               $carray[$k]['Section-code'] = $v->scode;
             }

            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
    }

    public function download_location() {
       Excel::create('Locations', function( $excel) {
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
      Excel::create('Designations', function( $excel) {
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
        Excel::create('Rack', function( $excel) {
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
           $carray[$k]['Rack']     = $v->rname;
           $carray[$k]['Location'] = $v->lname;
           }

            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
     }
    
    public function departmentusers_dowonload($username = null,$designation_id = null,$department_id = null,$section_id = null) {


        Excel::create('department_users', function( $excel) use($username,$designation_id,$department_id,$section_id) {
         $excel->sheet('Department-user-data', function($sheet) use($username,$designation_id,$department_id,$section_id) {
           
           $matchThese['department_users.status'] = 1;
           if($username != null) {
              $matchThese['department_users.username'] = $username;
            }
           if($designation_id != null) {
              $matchThese['department_users.designation_id'] = $designation_id;
            }
           if($department_id != null) {
              $matchThese['department_users.department_id'] = $department_id;
            }
           if($section_id != null) {
              $matchThese['department_users.section_id'] = $section_id;
            }
             dd($matchThese);
              exit();
           $sheet->setTitle('AGC Department Users Data');
           $sheet->cells('A1:B1:C1:D1', function($cells){
           $cells->setFontWeight('bold');
            });
           $department_users  = DB::table('department_users')
                             ->join('departments', 'department_users.department_id', '=', 'departments.id')
                             ->join('designations','department_users.designation_id', '=', 'designations.id')
                             ->join('sections','department_users.section_id', '=', 'sections.id')
                             ->select('department_users.name as dname','designations.name as desig_name','sections.name as section_name','departments.name as department_name')
                             ->where($matchThese)
                             ->get();
             
           $carray = array();
           foreach($department_users as $k => $v) {
               $carray[$k]['Name']        = $v->dname;
               $carray[$k]['Designation'] = $v->desig_name;
               $carray[$k]['Department']  = $v->department_name;
               $carray[$k]['section']     = $v->section_name;
              }

            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
    }

    public function accountusers_dowonload() {
        Excel::create('Account Users', function( $excel) {
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
///requisition_dowonload function not fully completed.....
    public function requisition_dowonload() {
        Excel::create('Requisition', function( $excel) {
          $excel->sheet('Requisition-data', function($sheet) {
             $sheet->setTitle('AGC Requisition Data');
             $sheet->protect('12345');
             $sheet->cells('A1:B1:C1:D1', function($cells) {
             $cells->setFontWeight('bold');
            });

            $requisition  = DB::table('requisitions')
                         ->join('department_users', 'requisitions.issued_by', '=', 'department_users.id')
                         ->select('requisitions.requisition_number as rnumber','department_users.name as lname','requisitions.job_number as jnumber','requisitions.nature_of_work as work','requisitions.financial_year as fyear')
                         ->get();

            $carray = array();
             foreach($requisition as $k => $v) {
               $carray[$k]['Requisition Number']     = $v->rnumber;
               $carray[$k]['Job Number']             = $v->jnumber;
               $carray[$k]['Nature Of Work']         = $v->work;
               $carray[$k]['Financial Year']         = $v->fyear;
               $carray[$k]['Requisition Issue Date'] = $v->lname;
               
              }
            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
    }


    public function budgethead_dowonload() {
      Excel::create('budgethead', function( $excel) {
        $excel->sheet('Budget-head', function($sheet) {
          $sheet->setTitle('AGC Budget Heads');

          $sheet->cells('A1:B1', function($cells) {
            $cells->setFontWeight('bold');
          });
          $budgetheads = BudgetHead::select('name as Budget Head', 'budget_head_code as Budget-Code')->orderBy('name')->get()->toArray();
          $sheet->fromArray($budgetheads, null, 'A1', false, true);
        });
      })->download('xlsx');
    }


    public function budgetTransaction_dowonload() {
        Excel::create('budget_head_transactions', function( $excel) {
          $excel->sheet('Budget-Transaction-data', function($sheet) {
             $sheet->setTitle('AGC Head Transaction Data');
             $sheet->cells('A1:B1:C1:D1', function($cells) {
             $cells->setFontWeight('bold');
            });

            $transaction = DB::table('budget_head_transactions')
                         ->join('budget_heads', 'budget_head_transactions.budget_head_id', '=', 'budget_heads.id')
                         ->join('departments', 'budget_head_transactions.department_id', '=', 'departments.id')
                         ->join('sections', 'budget_head_transactions.section_id', '=', 'sections.id')
                         ->select('budget_heads.name as BudgetHead','departments.name as Department','sections.name as Section','budget_head_transactions.budget_head_amount as head_amount','budget_head_transactions.budget_head_reserve_amount as reserve_amount','budget_head_transactions.budget_head_utilized_amount as utilized_amount','budget_head_transactions.financial_year as fyear')
                         ->get();

            $carray = array();
             foreach($transaction as $k => $v) {
               $carray[$k]['Budget Head']            = $v->BudgetHead;
               $carray[$k]['Department']             = $v->Department;
               $carray[$k]['Section']                = $v->Section;
               $carray[$k]['Amount']                 = $v->head_amount;
               $carray[$k]['Reserve Amount']         = $v->reserve_amount;
               $carray[$k]['Utilized Amount']        = $v->utilized_amount;
               $carray[$k]['Financial Year']         = $v->fyear;
               
              }
            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
    }

     public function measurementItems_dowonload() {
        Excel::create('item_measurements', function( $excel) {
          $excel->sheet('Item-Measuement-data', function($sheet) {
             $sheet->setTitle('AGC Item Measurement Data');
             $sheet->cells('A1:B1:C1:D1', function($cells) {
             $cells->setFontWeight('bold');
            });

            $transaction = DB::table('item_measurements')
                         ->join('item_groups', 'item_measurements.item_group_id', '=', 'item_groups.id')
                         ->join('item_sub_groups', 'item_measurements.item_sub_group_id', '=', 'item_sub_groups.id')
                         ->join('measurement_units', 'item_measurements.measurement_unit_id', '=', 'measurement_units.id')
                         ->select('item_measurements.item_code as icode','item_measurements.barcode as bcode','item_measurements.item_name as iname','item_measurements.item_description as idescription','item_measurements.part_number as pnumber','item_measurements.manufacturer as imanufacturer','item_measurements.expiry_date as edate','item_measurements.asset_type as atype','item_measurements.product_preference as p_preference','item_groups.name as igroup_name','item_sub_groups.name as isubgroup','measurement_units.name as mname')
                         ->get();

            $carray = array();
             foreach($transaction as $k => $v) {
               $carray[$k]['Item Code']            = $v->icode;
               $carray[$k]['Bar Code']             = $v->bcode;
               $carray[$k]['Item Name']            = $v->iname;
               $carray[$k]['Item Description']     = $v->idescription;
               $carray[$k]['Part Number']          = $v->pnumber;
               $carray[$k]['Manufacturer']         = $v->imanufacturer;
               $carray[$k]['Expiry Date']          = $v->edate;
               $carray[$k]['Item Group']           = $v->igroup_name;
               $carray[$k]['Item Sub Group']       = $v->isubgroup;
               $carray[$k]['Manufacturer Unit']    = $v->mname;
               $carray[$k]['Asset Type']           = $v->atype;
               $carray[$k]['Product Preference']   = $v->p_preference;
             
           }
            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
    }

     public function salvagemeasurementItems_dowonload() {
        Excel::create('salvage_item_measurements', function( $excel) {
          $excel->sheet('Salvage-Item-Measuement-data', function($sheet) {
             $sheet->setTitle('AGC Salvage Measurement Data');
             $sheet->cells('A1:B1:C1:D1', function($cells) {
             $cells->setFontWeight('bold');
            });

            $transaction = DB::table('salvage_item_measurements')
                         ->join('item_groups', 'salvage_item_measurements.item_group_id', '=', 'item_groups.id')
                         ->join('item_sub_groups', 'salvage_item_measurements.item_sub_group_id', '=', 'item_sub_groups.id')
                         ->join('measurement_units', 'salvage_item_measurements.measurement_unit_id', '=', 'measurement_units.id')
                         ->select('salvage_item_measurements.item_code as icode','salvage_item_measurements.barcode as bcode','salvage_item_measurements.item_name as iname','salvage_item_measurements.item_description as idescription','salvage_item_measurements.part_number as pnumber','salvage_item_measurements.manufacturer as imanufacturer','salvage_item_measurements.expiry_date as edate','salvage_item_measurements.asset_type as atype','salvage_item_measurements.product_preference as p_preference','item_groups.name as igroup_name','item_sub_groups.name as isubgroup','measurement_units.name as mname')
                         ->get();

            $carray = array();
             foreach($transaction as $k => $v) {
               $carray[$k]['Item Code']              = $v->icode;
               $carray[$k]['Bar Code']               = $v->bcode;
               $carray[$k]['Item Name']              = $v->iname;
               $carray[$k]['Item Description']       = $v->idescription;
               $carray[$k]['Part Number']            = $v->pnumber;
               $carray[$k]['Manufacturer']           = $v->imanufacturer;
               $carray[$k]['Expiry Date']            = $v->edate;
               $carray[$k]['Item Group']             = $v->igroup_name;
               $carray[$k]['Item Sub Group']         = $v->isubgroup;
               $carray[$k]['Manufacturer Unit']      = $v->mname;
               $carray[$k]['Asset Type']             = $v->atype;
               $carray[$k]['Product Preference']     = $v->p_preference;
             
           }
            $sheet->fromArray($carray, null, 'A1', false, true);
          });
        })->download('xlsx');
    }
}
