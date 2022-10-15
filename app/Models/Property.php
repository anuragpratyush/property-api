<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public static function updateAndCreateProperty($propertDatas) {
        
        foreach($propertDatas as $propertData) {
            
            $property = new Property;
            $property->county = $propertData['county'];
            $property->country = $propertData['country'];
            $property->town = $propertData['town'];
            $property->postalcode = isset($propertData['postcode']) ? $propertData['postcode'] : '' ;
            $property->description = $propertData['description'];
            $property->address = $propertData['address'];
            $property->image_url = $propertData['image_full'];
            $property->thumbnail_url =$propertData['image_thumbnail'];
            $property->latitude = $propertData['latitude'];
            $property->longitude = $propertData['longitude'];
            $property->bedrooms = $propertData['num_bedrooms'];
            $property->bathrooms =$propertData['num_bathrooms'];
            $property->price = $propertData['price'];
            $property->property_type = $propertData['property_type']['title'];
            $property->type = $propertData['type'];
            $property->data_from =  'api';
            $saved = $property->save();
        }
        if($saved) {
            return true;
        } else {
            return false;
        }

       
    }

    public static function saveAdminData($data) {

            if(isset($data['id'])) {
              
                $adminProperty = Property::where('id', '=', $data['id'])->first();
            } else {
                $adminProperty = new Property;
    
            }
            
     
            $adminProperty->county = $data['county'];
            $adminProperty->country = $data['country'];
            $adminProperty->town = $data['town'];
            $adminProperty->postalcode = isset($data['postcode']) ? $data['postcode'] : '' ;
            $adminProperty->description = $data['description'];
            $adminProperty->address = $data['displayAddress'];
            $adminProperty->bedrooms = $data['bedroom'];
            $adminProperty->bathrooms =$data['bathroom'];
            $adminProperty->price = $data['price'];
            $adminProperty->property_type = $data['propertyType'];
            $adminProperty->type = $data['type'];
            $adminProperty->data_from = 'admin';
            $saved = $adminProperty->save();
        
        if($saved) {
            return true;
        } else {
            return false;
        }


    }

    public static function getAdminProperty($dataFrom) {
        $data = Property::where('data_from', $dataFrom)
                ->orderBy('id', 'DESC')
                ->get()
                ->toArray();
        if(!empty($data)) {
            return $data;
        } 
            return array();

    }

    public function deleteProperty($id) {
        $propertyDeleted = Property::where('id',$id)->delete();

        if($propertyDeleted) {
            return true ;
        } else {
            return false ; 
        }

    }

    public function getPropertyByPropId($id) {
        $data = Property::where('id',$id)->get()->toArray();
       
        if($data) {
            return   $data[0];
        } else {
            return array(); 
        }

    }

    
}
