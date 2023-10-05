<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\enroute;
use App\Models\milestone;
use App\Models\promotionalActivity;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use App\Models\enroute_path_detail;

class UserController extends Controller
{
    //
    public function index(Request $req){
        if(Auth::user()){
        // $userIp = $req->ip();
        // $userlocation=file_get_contents('http://api.hostip.info/get_json.php?ip=$userIp');
        // $array_userlocation = json_decode($userlocation);
        $enrouteList = enroute::all();
        $userDetails = User::with(['enrouteData'])->where('id',Auth::user()->id)->first();
        return view('home.index',compact('userDetails','enrouteList'));
        }
        else{
            return view('home.index');
        }
    }

    public function startRoute(){
        $enrouteId = User::select('enroute_id')->where('id',Auth::user()->id)->first();
        $milestones = milestone::select('name')->where('enroute_id',$enrouteId->enroute_id)->get();
        $route_pts = enroute::select('starting_point','end_point')->where('id',$enrouteId->enroute_id)->first();
        return view('home.enroute',compact('milestones','route_pts','enrouteId'));
    }

    public function finishRoute(){
       User::find(Auth::user()->id)->update([
            'walking_status'=> 1
           ]);
        return redirect("/")->with('success','Route finished');
    }

    public function updateRoute(Request $req){
        user::find(Auth::user()->id)->update([
            'enroute_id'=> $req->enroute_id
           ]);
        return redirect("/")->with('success','Route updated');

    }

    public function addPromotions(){
        $enrouteId = User::select('enroute_id')->where('id',Auth::user()->id)->first();
        $other_reviews = promotionalActivity::with(['enrouteData','userData'])->whereNot('enroute_id',$enrouteId->enroute_id)->get();
        $this->code = (string)Uuid::uuid1();
        $ref_code = $this->code;
        $enroute_name = enroute::select('name')->where('id',$enrouteId->enroute_id)->first();
        $enrouteName = str_replace(' ','',$enroute_name->name);
        return view('home.promotion',compact('enrouteId','other_reviews','ref_code','enrouteName'));
    }

    public function storePromotions(Request $req){
        promotionalActivity::insert([
            'message' => $req->message,
            'enroute_id' =>$req->enroute_id,
            'likes_count' =>0,
            'level_promotion' =>0,
        ]);
        return redirect("/add-promotions")->with('success','Reviews Added');

    }
    public function likePost(Request $req,$id)
    {
        $review = promotionalActivity::find($id); 
        $review->like();
        $review->save();
        $result = promotionalActivity::join('likeable_like_counters', 'promotionalactivities.id', '=', 'likeable_like_counters.likeable_id')
         ->first();
        $consumer = promotionalActivity::find($id);
        $consumer->likes_count = $result['count'];
        $consumer->save();
        return redirect('/add-promotions')->with('success','Post Like successfully!');
    }

    public function routeDetails($name,$ref_code){
        $this->code = (string)Uuid::uuid1();
        $ref_code = $this->code;
        $enrouteId = User::select('enroute_id')->where('id',Auth::user()->id)->first();
        $enroute_details = enroute::where('id',$enrouteId->enroute_id)->first();
        $enroute_name = enroute::select('name')->where('id',$enrouteId->enroute_id)->first();
        $name = str_replace(' ','',$enroute_name->name);
        return view('home.refferal_page',compact('enroute_details'));
    }

    public function geoMap()
    {   $enrouteId = User::select('enroute_id')->where('id',Auth::user()->id)->first();
        $enroute_name = enroute::select('name')->where('id',$enrouteId->enroute_id)->first();
        $pathDetails = enroute_path_detail::with(['pathData'])->where('enroute_id',$enrouteId->enroute_id)->get();
        $locations = array();
        foreach($pathDetails as $key => $item){
            $locations[$key]['lat']= $item->path_latitude;
            $locations[$key]['lng']= $item->path_longitude;
            $locations[$key]['source_point'] = $item->source_point;
            $locations[$key]['name'] = $item['pathData']->name;
        }
        // $locations = [
        //     ["lat" => 18.922064, "lng" =>72.834641,"name"=>'Gateway of India'],
        //     ["lat" => 18.9373, "lng" => 72.8346,"name"=>'Marine Drive'],
        //     ["lat" => 22.2587, "lng" => 71.1924,"name"=>''],
        //   ];
        return view('googleAutocomplete',compact('locations','enroute_name'));
    }
}
