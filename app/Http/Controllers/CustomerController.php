<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Room;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::where('status',1)->get();
        $num_of_customers = customer::where('status',1)->count();
//        View::share('num_of_customers', $num_of_customers);
       return view('customers.read',['customers'=>$customers]);
        //return view('layouts.app',['num_of_customers'=>$num_of_customers]);
    }

    public function old()
    {
        $num_of_old_customers = customer::where('status',0)->count();
        $customers = customer::where('status',0)->get();
        return view('customers.read_old',['customers'=>$customers],['num_of_old_customers'=>$num_of_old_customers]);
        return view('layouts.app',['num_of_old_customers'=>$num_of_old_customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::where('status', 0)->get();
       return view('customers.save',['rooms'=>$rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        validate the user input
        $this->validate($request, [
            'fullname' => 'required|max:255',
            'natid' => 'required|unique:customers',
            'contacts' => 'required|unique:customers',
            'checkout' => 'required',
            'room_id' => 'required',
        ]);

//        update the room taken
         $room = Room::where('id', $request->room_id)->first();
        $this->updateRoomTaken($room);
        $room->status = TRUE;
        $room->save();

        // instantiate the customer model
        $customer = new customer();
        $customer->fullname = $request->fullname;
        $customer->natid = $request->natid;
        $customer->status = TRUE;
        $customer->contacts = $request->contacts;
        $customer->checkout = $request->checkout;
        $customer->room_id = $request->room_id;

        $customer->save();

        return redirect('customers/read');


    }

    private function updateRoomTaken($id){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = customer::find($id);
        return view('customers.clear',['customers'=>$customers]);




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
           $cs = customer::where('id',$customer)->first();


        echo "room id = ". $user_room = $cs->room_id;
        echo "<br>";
        echo "room status = ". $user_room = $cs->status;

        echo "<br>";
        echo "room status = ". $user_room = $cs->fullname;
        $room = Room::find($user_room);
        echo "<br>";
//        $room->status;
//         $cs->status;
//        $room->save();
//
//        $cs->save();
        redirect('customers/read');





    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       echo $customer  = customer::where('id',$request->id)->first();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
