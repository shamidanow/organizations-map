<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();
        
        $i = 1;
        foreach ($organizations as $item) {
            $item->setAttribute('number', $i);
            $i++;
        }
        
        return view('organizations.index', [
            'organizations' => $organizations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateOrganization();
        
        Organization::create($attributes);
        
        return redirect('/organizations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return view('organizations.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $organization->update($this->validateOrganization());
        
        return redirect('/organizations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        
        return redirect('/organizations');
    }
    
    protected function validateOrganization() {
        return request()->validate([
            'company_name' => ['required', 'min:3'],
            'fact_addr' => 'required',
            'fact_addr_coord' => 'required',
            'site_url' => ''
        ]);
    }
    
    public function showMap() {
        $organizations = Organization::all();
        $first =  $organizations->first();
        
        $filtered = $organizations->filter(function ($item) {
            return $item->fact_addr_coord != "";
        });
        $organizations = $filtered->all();
        
        return view('organizations.showmap', compact('organizations', 'first'));
    }
    
    public function updateCoords() {
        // Выборка данных из таблицы
        $organizations = Organization::all();
        
        // Обработка адресов
        $result = '<table>';
        foreach ($organizations as $organization) {
            $coords = $this->updateCoordsByOrg($organization);
            $result .= '<tr><td>'.$organization->company_name.'</td><td>'.$organization->fact_addr.'</td><td>'.$coords.'</td></tr>';
        }
        $result .= '</table>';
        
        // Вывод результата
        echo $result;
    }
    
    public function updateCoordsByOrg(Organization $organization) {
        $user = \Auth::user();
        
        $coords = null;
        if ($organization->fact_addr != "" && $organization->fact_addr != "-" && $organization->fact_addr_coord == null) {
            // Обращение к http-геокодеру
            $xml = simplexml_load_file('https://geocode-maps.yandex.ru/1.x/?geocode='.urlencode("г.Уфа, ".$organization->fact_addr).'&key='.$user->api_key.'&results=1');
            
            // Если геокодировать удалось, то записываем в БД
            $found = $xml->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found;
            if ($found > 0) {
                $coords = str_replace(' ', ',', $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos);
                list($lo, $lu) = explode(",", $coords);
                $coords = $lu.",".$lo;
                $organization->update(['fact_addr_coord' => $coords]);
            }
        }
        
        return $coords;
    }
    
    public function getCoordsByAddr($factAddr) {
        $user = \Auth::user();
        $coords = null;
        if ($factAddr != "" && $factAddr != "-") {
            // Обращение к http-геокодеру
            $xml = simplexml_load_file('https://geocode-maps.yandex.ru/1.x/?geocode='.urlencode("г.Уфа, ".$factAddr).'&key='.$user->api_key.'&results=1');
            
            // Если геокодировать удалось, то записываем в БД
            $found = $xml->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found;
            if ($found > 0) {
                $coords = str_replace(' ', ',', $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos);
                list($lo, $lu) = explode(",", $coords);
                $coords = $lu.",".$lo;
            }
        }
        
        return $coords;
    }
}
