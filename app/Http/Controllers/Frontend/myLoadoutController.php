<?php

namespace App\Http\Controllers\Frontend;


use App\Qualification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class myLoadoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();
        $loadout = $this->getLoadout();
        return view('frontend.my-loadout.index')
            ->with('user',$user)
            ->with('primary',$loadout[0])
            ->with('secondary',$loadout[1])
            ->with('launcher',$loadout[2])
            ->with('nightvision',$loadout[3])
            ->with('binoculars',$loadout[4])
            ->with('helmet',$loadout[5])
            ->with('goggles',$loadout[6])
            ->with('uniform',$loadout[7])
            ->with('vest',$loadout[8])
            ->with('backpack',$loadout[9]);

    }

    public function saveLoadout(Request $request)
    {

        $user = \Auth::user();
        $loadout = [
            $request->primaryWeapon,
            $request->secondaryWeapons,
            $request->launcherWeapons,
            $request->nightvision,
            $request->helmet,
            $request->goggles,
            $request->uniform,
            $request->backpack,
        ];

        $user->vpf->loadout()->sync($loadout);
        \Notification::success('Your loadout have been saved, you can now obtain it from the armorer on base');
        return redirect('/my-loadout/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Returns a array object with all primary weapons formatted for ddslick display
     */
    public function getLoadout()
    {
        $user = \Auth::user();
        $currentLoadout = $user->vpf->loadout;
        $loadout_items = collect();
        foreach($user->vpf->qualifications as $qualification)
        {
            $loadout_items->push($qualification->loadoutItems);

        }
        $collapsed = $loadout_items->collapse();


        //Collection Trays
        $primary = collect();
        $secondary = collect();
        $launcher = collect();
        $uniform = collect();
        $vest = collect();
        $backpack = collect();
        $helmet = collect();
        $goggles = collect();
        $nightvision = collect();
        $binoculars = collect();
        $primary_attachments = collect();
        $secondary_attachments = collect();
        $launcher_attachments = collect();
        $items = collect();

        foreach($collapsed as $item)
        {
            //Sort Items based on category
            switch ($item->category) {
                case 'primary':
                    $primary->push($item);
                    break;
                case 'secondary':
                    $secondary->push($item);
                    break;
                case 'launcher':
                    $launcher->push($item);
                    break;
                case 'uniform':
                    $uniform->push($item);
                    break;
                case 'vest':
                    $vest->push($item);
                    break;
                case 'backpack':
                    $backpack->push($item);
                    break;
                case 'helmet':
                    $helmet->push($item);
                    break;
                case 'goggles':
                    $goggles->push($item);
                    break;
                case 'nightvision':
                    $nightvision->push($item);
                    break;
                case 'binoculars':
                    $binoculars->push($item);
                    break;
                case 'primary_attachments':
                    $primary_attachments->push($item);
                    break;
                case 'secondary_attachments':
                    $secondary_attachments->push($item);
                    break;
                case 'launcher_attachments':
                    $launcher_attachments->push($item);
                    break;
                case 'items':
                    $items->push($item);
                    break;
                default:
                    $items->push($item);
            }
        }

        // JSONIFY
        $loadout = collect();
        $loadout->push($this->formatLoadout($primary,$currentLoadout));  //0
        $loadout->push($this->formatLoadout($secondary,$currentLoadout)); //1
        $loadout->push($this->formatLoadout($launcher,$currentLoadout)); //2
        $loadout->push($this->formatLoadout($nightvision,$currentLoadout)); //3
        $loadout->push($this->formatLoadout($binoculars,$currentLoadout)); //4
        $loadout->push($this->formatLoadout($helmet,$currentLoadout)); //5
        $loadout->push($this->formatLoadout($goggles,$currentLoadout)); //6
        $loadout->push($this->formatLoadout($uniform,$currentLoadout)); //7
        $loadout->push($this->formatLoadout($vest,$currentLoadout)); //8
        $loadout->push($this->formatLoadout($backpack,$currentLoadout)); //9
        $loadout->push($this->formatLoadout($primary_attachments,$currentLoadout)); //10
        $loadout->push($this->formatLoadout($secondary_attachments,$currentLoadout)); //11
        $loadout->push($this->formatLoadout($launcher_attachments,$currentLoadout)); //12
        $loadout->push($this->formatLoadout($items,$currentLoadout)); //13


        return $loadout;
    }


    private function formatLoadout($source,$loadoutArray,$description = "Select an item")
    {
        $targetFormatted = collect();
        foreach($source as $item)
        {
            $equipped = false;
            //Check if item is in player loadout
            if($loadoutArray->contains($item->id)) $equipped=true;

            $col = collect([
                'text' => $item->name,
                'value' => $item->id,
                'selected'=>$equipped,
                'description'=>$description,
                'imageSrc'=> $item->showSmall()
            ]);
            $targetFormatted->push($col);
        }
        return $targetFormatted;
    }
}
