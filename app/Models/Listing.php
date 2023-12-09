<?php
namespace App\Models;
class Listing {
    public static function all() {
        return [
        ['id' => 1, 'title' => 'Listings One','descrition'=>"lorem ipsum dolor sit amet consectetur adipisicing elit "],
        ['id' => 2, 'title' => 'Listings Two','descrition'=>"lorem ipsum dolor sit amet consectetur adipisicing elit "],
        ['id' => 3, 'title' => 'Listings Three','descrition'=>"lorem ipsum dolor sit amet consectetur adipisicing elit "],
        ['id' => 4, 'title' => 'Listings Four','descrition'=>"lorem ipsum dolor sit amet consectetur adipisicing elit "],
    ];}
    public static function find($id) {
        $listing = self::all();
        foreach ($listing as  $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}