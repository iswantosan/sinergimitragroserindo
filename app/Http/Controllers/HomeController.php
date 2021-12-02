<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class HomeController extends Controller
{
    //
	function process(Request $request)
	{
		Validator::make($request->all(),
		[
			'bilangan'=>'required',
			
		], 
		[
			
		])->validate();
		
		$bilangan = $request->input('bilangan');
		
		return view('result', compact('bilangan'));
	}
	
	function kota(Request $request)
	{
		$id = $request->id;
		$options = "<option value=''></option>";
		$kota = RajaOngkir::kota()->dariProvinsi($id)->get();
		 foreach ($kota as $row) {
			 $options.="<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
                
            }
		return $options;
	}
	
	function rajaOngkir()
	{
		$provinces = RajaOngkir::provinsi()->all();
		
		return view('rajaongkir', compact('provinces'));
	}
	
	function weight(Request $request)
	{
		
		$data = RajaOngkir::ongkosKirim([
            'origin'        => 501,  // yogya
            'destination'   => $request->kota, 
            'weight'        => $request->berat,
            'courier'       => $request->kurir
        ])->get();
		
		$result = "<br/>Ongkos Kirim<br/>=========";
	
		foreach($data[0]["costs"] as $c)
		{
			$result.="<br/>". $c["service"] . " (" . $c["description"] . ")<br/>";
			
			$result.="Rp " . number_format($c['cost'][0]['value']) . " (" . $c['cost'][0]['etd'] . ")";
		}
		
		return $result;
	}
}
