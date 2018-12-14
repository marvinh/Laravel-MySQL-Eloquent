<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Restaurant;
use \App\User;
use \App\Review;
use Auth;
class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         if(Auth::guest()){
            $this->middleware('guest');
        }else{
            $this->middleware('auth');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $restaurant = Restaurant::with('reviews.reviewer.role','menu','hours.day')->where('id',$id)->get();
        $restaurant = $restaurant[0];
        $avg = 0;
        $count = 0;
        foreach($restaurant->reviews as $t)
        {
            $avg += $t->rating;
            $count++;
        }

        if($count > 0)
        {
            $avg = $avg/$count;
        }
        return view('restaurantdetail',['restaurant'=>$restaurant,'rating'=>$avg, 'rating_count'=>$count]);
    }
    public function index()
    {
        $restaurants = Restaurant::with('reviews.reviewer.role')->get();
        $averages = [];
        $counts = [];

        foreach($restaurants as $r)
        {
            $avg = 0;
            $count = 0;
            foreach($r->reviews as $t)
            {
                $avg += $t->rating;
                $count++;
            }

            if($count > 0)
            {
                $avg = $avg/$count;
            }

            array_push($averages,$avg);
            array_push($counts,$count);
        }
        $data = ['restaurants'=>$restaurants,'ratings'=>$averages,'rating_count'=>$counts];
        return view('restaurants',$data);
    }

    public function additem($id)
    {
        return view('additem',['id'=>$id]);
    }
    public function editrest($id)
    {
        return view('editrest',['id'=>$id]);
    }
    public function addhour($id)
    {
        return view('addhour',['id'=>$id]);
    }

    public function addtomenu(Request $request)
    {
        $name= $request->input('name');
        $desc = $request->input('desc');
        $price = $request->input('price');
        $id =  $request->input('restaurant_id');
        if($name != null && $price !=null)
        {
            
         $r = \App\Menu::create([
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'restaurant_id' => $id, 
        ]);
            $redirect = '/restaurantdetail'.'/'.$id;
            return redirect($redirect)->with('message', 'submitted menu item!');
        }else{
            $redirect = '/additem'.'/'.$id;
            return redirect($redirect)->with('message', 'Missing fields.');
        }
    }

     public function add(Request $request)
    {
        $name = $request->input('name');
        $street_address = $request->input('street_address');
        $city = $request->input('city');
        $state = $request->input('state');
        if($name != null && $street_address != null && $city != null && $state != null)
        {
            $r = \App\Restaurant::create([
                'name' => $name,
                'street_address' => $street_address,
                'city' => $city,
                'state' => $state,
                'website' => $request->input('website'),
            ]);
            return redirect('/restaurantdetail'.'/'.$r->id)->with('message','New restaurant added');
        }
        return redirect('/addrestaurant')->with('message','Missing fields.');
    }
     public function edit(Request $request)
    {
        $name = $request->input('name');
        $street_address = $request->input('street_address');
        $city = $request->input('city');
        $state = $request->input('state');
        $id = 1;//$request->input('restaurant_id');
        if($name != null && $street_address != null && $city != null && $state != null)
        {
            $r = \App\Restaurant::find($id);
            $r->update([
                'name' => $name,
                'street_address' => $street_address,
                'city' => $city,
                'state' => $state,
                'website' => $request->input('website'),
            ]);
            return redirect('/restaurantdetail'.'/'.$r->id)->with('message','Restaurant edit completed!');
        }
        return redirect('/editrest'.'/'.$id)->with('message','Missing fields.');
    }
     public function hour(Request $request)
    {
        $opening = $request->input('opening');
        $closing = $request->input('closing');
        $day = $request->input('day_id');
        $id = $request->input('id');
        
        $h = \App\OperatingHour::where(['restaurant_id'=>$id,'day_id'=>$day]);
        if($h == null)
        {
            \App\OperatingHour::create([
                'day_id'=>$day,
                'restaurant_id'=>$id,
                'opening'=>$opening,
                'closing'=>$closing,
            ]);
        }else{
            $h->update([
                'day_id'=>$day,
                'restaurant_id'=>$id,
                'opening'=>$opening,
                'closing'=>$closing,
            ]);
        }
       
        return redirect('/restaurantdetail'.'/'.$id)->with('message','Operating Hours Added!');

    }


}