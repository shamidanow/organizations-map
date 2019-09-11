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
            'site_url' => 'required'
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
        $user = \Auth::user();
        
        // Выборка данных из таблицы
        $addresses = Organization::all();
        
        // Общее количество адресов и количество адресов, в обработке которых произошла ошибка
        $countGeocode = $countGeocodeFault = 0;
        
        // Обработка адресов
        $result = '<table style="width:600px">';
        foreach ($addresses as $address) {
            if ($address->fact_addr != "" 
                && $address->fact_addr != "-" 
                && $address->fact_addr_coord == null) 
            {
                $countGeocode++;
                
                // Обращение к http-геокодеру
                $xml = simplexml_load_file('https://geocode-maps.yandex.ru/1.x/?geocode='.urlencode("г.Уфа, ".$address->fact_addr).'&key='.$user->api_key.'&results=1');
                
                // Если геокодировать удалось, то записываем в БД
                $found = $xml->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found;
                
                if ($found > 0) {
                    $coords = str_replace(' ', ',', $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos);
                    list($lo, $lu) = explode(",", $coords);
                    $coords = $lu.",".$lo;
                    $result .= '<tr><td>'.$address->fact_addr.'</td><td>'.$coords.'</td></tr>';
                    $address->update(['fact_addr_coord' => $coords]);
                } else {
                    $result .= '<tr style="color:red"><td>'.$address->fact_addr.'</td><td>ошибка</td></tr>';
                    $countGeocodeFault++;
                }
            }
        }
        $result .= '</table>';
        
        // Вывод результата
        echo $result;
        
        // Вывод общего количество прогеокодированных результатов
        if ($countGeocode) {
            echo '<div style="margin-top:1em">Всего обработано адресов: '.$countGeocode.'</div>';
            if ($countGeocodeFault) {
                echo '<div style="color:red">Не удалось прогеокодировать: '.$countGeocodeFault.'</div>';
            }
        } else {
            echo '<div>Таблица с адресами пуста.</div>';
        }
    }
}
