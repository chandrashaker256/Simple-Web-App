<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Hotelpackage;
use datables;
use Carbon\Carbon;
use Auth;

class HotelPackageController extends Controller
{
    public function index()
    {
        $hotel = Hotelpackage::get();
        return view('hotelPackages.hotel-package')->with('hotel',$hotel);
                    

    }
    public function homepage()
    {
        $hotel = Hotelpackage::paginate(9);
        return view('index', [
            'hotel' => $hotel,
        ]);
    }

    public function hotel_data(Request $request)
    {
        $columnsArr = array(
            0 => 'name',
            1 => 'price',
            2 => 'date',
            3 => 'nights',
            4 => 'spend_code',
            5 => 'activated_date',
            5 => 'expired_date',
            5 => 'description',
            6 => 'action'
        );
        $DatatableOrder = $columnsArr[0];
        $DatatableOrderDirection = $request->input('order.0.dir');
        $DatatableOffset = $request->input('start');
        $DatatableLimit = $request->input('length');

        $TotalHotels = Hotelpackage::get()->count();

            $Hotels = "";
            $TotalFilteredHotels = "";
            if ($request->input('search.value')) {

            $searchByUser = $request->input('search.value');

            $Hotels = Hotelpackage::where(function ($Query) use ($searchByUser) {
              $Query->where('name', 'like', "%" . $searchByUser . "%")
              ->orwhere('description', 'like', "%" . $searchByUser . "%");
            })->offset($DatatableOffset)
            ->limit($DatatableLimit)
            ->orderBy('id', 'desc')
            ->get();

            $TotalFilteredHotels = Hotelpackage::where(function ($Query) use ($searchByUser) {
              $Query->where('name', 'like', "%" . $searchByUser . "%");
            })->get()->count();
        } else {
            $Hotels = Hotelpackage::offset($DatatableOffset)
                ->limit($DatatableLimit)
                ->orderBy('id', 'desc')->get();
            $TotalFilteredHotels = $TotalHotels;
        }

        $DataArray = array();

        foreach ($Hotels as $value) {

            $DataArray['name'] = $value->name;
            $DataArray['price'] = $value->price;
            $DataArray['days'] = $value->days;
            $DataArray['nights'] = $value->nights;
            $DataArray['activated_date'] = Carbon::parse($value->activated_date)->format('d-m-Y');
            $DataArray['expired_date'] =
            Carbon::parse($value->expired_date)->format('d-m-Y');
            $DataArray['description'] = $value->description;
            if(Auth::user()->usertype == 'admin'){
                $DataArray['action'] = '<a href="/hotel-package/'.$value->id. '"><i class="fas fa-edit"></i> </a> | <a class="del" href="hotel-package-delete/'.$value->id.'"><i class="fas fa-trash-alt"></i></a>';
            }else{
                $DataArray['action'] = '<i class="fas fa-eye"></i>';
            }
            
            $Records[] = $DataArray;
        }
        $ResponseArray = array(
            'draw' => $request->input('draw'),
            'recordsTotal' => $TotalHotels,
            'recordsFiltered' => $TotalFilteredHotels,
            'data' => $Records,
        );
        
        return response()->json($ResponseArray, 200);
        
    }
    public function create(){
        return view('hotelPackages.create');
    }
    public function store(Request $request)
    {

        $hotel = new Hotelpackage();
        $hotel->name = $request->input('name');
        $hotel->price = $request->input('price');
        $hotel->days = $request->input('days');
        $hotel->nights = $request->input('nights');
        $hotel->location = $request->input('location');
        $hotel->activated_date = $request->input('activated_date');
        $hotel->expired_date = $request->input('expired_date');
        $hotel->description = $request->input('description');
        
        $hotel->save();

        return redirect('/hotel-package')->with('status','Package added successfully');

    }

    public function edit($id)
    {
         $hotel =Hotelpackage::findOrFail($id);
        
        return view('hotelPackages.edit')->with('hotel',$hotel)->with('status','Packages Updated Successfully');
    }
    public function update(Request $request, $id)
    {
        $hotel = Hotelpackage::find($id);

        $hotel->name = $request->input('name');
        $hotel->price = $request->input('price');
        $hotel->days = $request->input('days');
        $hotel->nights = $request->input('nights');
        $hotel->location = $request->input('location');
        $hotel->activated_date = $request->input('activated_date');
        $hotel->expired_date = $request->input('expired_date');
        $hotel->description = $request->input('description');
        
        $hotel->update();

        return redirect('/hotel-package')->with('status','Package Updated');
    }

    public function delete($id)
    {
        $hotel = Hotelpackage::findOrFail($id);

        $hotel->delete();

        return redirect('/hotel-package')->with('status','Package Deleted');
    }

}
