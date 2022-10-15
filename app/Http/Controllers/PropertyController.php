<?php

namespace App\Http\Controllers;
use App\Models\Property;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function saveProperty(Request $request) {
        $propertyData = $request->all();
      
      
        $dataSaved = Property::updateAndCreateProperty($propertyData);
            if($dataSaved) {
                return response()->json(['status' => 200, 'msg' => 'Property saved successfully']);
                
            } 
                
            else {
                return response()->json(['status' => 400, 'msg' => 'Something went wrong']);
            }
    }

    public function savePropAdmin(Request $request) {
        $propData = $request->all();
      
      
        $propSaved = Property::saveAdminData($propData);
            if($propSaved) {
                return response()->json(['status' => 200, 'msg' => 'Admin Property saved successfully']);
                
            } 
                
            else {
                return response()->json(['status' => 400, 'msg' => 'Something went wrong']);
            }
    }

    public function getProperty($dataFrom) {
       
        $propRetreived = Property::getAdminProperty($dataFrom);
        if(!empty($propRetreived)) {
            return response()->json(['status' => 200, 'data' => $propRetreived]);
            
        } 
            
        else {
            return response()->json(['status' => 400, 'data' => $propRetreived]);
        }
    }

    public function deleteAdminProp(Request $request) {
        $propId = $request->all();
       
        $deleted = Property::deleteProperty($propId['id']);
        if($deleted) {
            return response()->json(['status' => 200, 'msg' => 'Property Deleted Successfully']);
            
        } else {
            return response()->json(['status' => 400, 'data' => 'Some Error Occured']);
        }
    }

    public static function getPropertyById($propId) {
      $getData = Property:: getPropertyByPropId($propId);

      if(!empty($getData)) {
        return response()->json(['status' => 200, 'data' => $getData]);
        
        } 
            
        else {
            return response()->json(['status' => 400, 'data' => $getData]);
        }
      

    }
        
            
}
