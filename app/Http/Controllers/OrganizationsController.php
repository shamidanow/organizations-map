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
        $first = null;
        
        $filtered = $organizations->filter(function ($item) {
            return $item->fact_addr_coord != "";
        });
        $organizations = $filtered->all();
        
        return view('map.index', compact('organizations', 'first'));
    }
    
    public function updateCoords() {
        // Выборка данных из таблицы
        $organizations = Organization::all();
        
        $filtered = $organizations->filter(function ($organization) {
            return $organization->fact_addr != "" && $organization->fact_addr != "-" && $organization->fact_addr_coord == null;
        });
        $organization = $filtered->first();
        // Обработка адресов
        $result = '<table>';
        $coords = $this->updateCoordsByOrg($organization);
        $result .= '<tr><td>'.$organization->company_name.'</td><td>'.$organization->fact_addr.'</td><td>'.$coords.'</td></tr>';
        $result .= '</table>';
        
        // Вывод результата
        echo $result;
        
        
        /*// Обработка адресов
        $result = '<table>';
        foreach ($organizations as $organization) {
            $coords = $this->updateCoordsByOrg($organization);
            $result .= '<tr><td>'.$organization->company_name.'</td><td>'.$organization->fact_addr.'</td><td>'.$coords.'</td></tr>';
        }
        $result .= '</table>';
        
        // Вывод результата
        echo $result;*/
    }
    
    public function updateCoordsByOrg(Organization $organization) {
        $user = \Auth::user();
        
        $coords = null;
        if ($organization->fact_addr != "" && $organization->fact_addr != "-" && $organization->fact_addr_coord == null) {
            $curl_handle=curl_init();
            curl_setopt($curl_handle, CURLOPT_URL,'https://geocode-maps.yandex.ru/1.x/?geocode='.urlencode("г.Уфа, ".$organization->fact_addr).'&key='.$user->api_key.'&results=1');
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/76.0.3809.100 Chrome/76.0.3809.100 Safari/537.36');
            $query = curl_exec($curl_handle);
            curl_close($curl_handle);
            
            // Обращение к http-геокодеру
            $xml = simplexml_load_string($query);
            
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
    
    public function searchs($companyName) {
        $organizations = Organization::get();
        
        $subset = $organizations->map(function ($organization) {
            return $organization->only(['id', 'company_name']);
        });
        $new_array = [];
        foreach($subset->toArray() as $v) {
            $new_array[$v['id']] = $v['company_name'];
        }
        
        $collection = collect($new_array);
        $search = $collection->search($companyName);
        
        return Organization::findOrFail($search)->fact_addr_coord;
    }
    
    public function search($address, $companyName) {
        $organizations = Organization::get();
        
        /**
         * Массив, по которому производится поиск
         * @var array $arraySearch
         */
        $arraySearch = array();
        foreach($organizations->toArray() as $v) {
            $arraySearch[] = array('id' => $v['id'], 'fact_addr' => $v['fact_addr'], 'company_name' => $v['company_name'], 'fact_addr_coord' => $v['fact_addr_coord']);
        }
        
        /**
         * Массив с ключами, для которых найдено искомое значение для $date в столбце "fact_addr" массива $arraySearch
         * @var array $addresessKeys
         */
        $addresessKeys = $this->getArrayKeys($address, "fact_addr", $arraySearch);
        
        /**
         * Массив с ключами, для которых найдено искомое значение для $closingDate в столбце "company_name" массива $arraySearch
         * @var array $nameKeys
         */
        $nameKeys = $this->getArrayKeys($companyName, "company_name", $arraySearch);
        
        /**
         * Все используемые при поиске массивы
         * @var array $arrSearch
         */
        $resultSearch = array($arraySearch, $addresessKeys, $nameKeys);
        
        /**
         * Удаляем из $resultSearch пустые массивы
         */
        foreach ($resultSearch as $idx=>$subarray) {
            if ($subarray == null) {
                unset($resultSearch[$idx]);
            }
        }
        
        /**
         * Результирующий массив с найденными значениями
         */
        $result = $arraySearch;
        if (count($resultSearch) > 1) {
            $result = array_intersect_key(...$resultSearch);
        }
        var_dump($result);
        $new_array = array();
        foreach($result as $v) {
            $new_array[$v['id']] = $v;
        }
        $collection = collect($new_array);
        foreach ($collection as $collect) {
            echo $collect['company_name'];
        }
        //return $collection;
    }
    
    public function getArrayKeys(string $strSearch, string $column, array $arraySearch) {
        $arrayKeys = array();
        $dateColumn = array_column($arraySearch, $column);
        if ($strSearch != "") {
            foreach ($dateColumn as $key=>$value) {
                if (stristr($value, trim($strSearch))) {
                    $arrayKeys[$key] = $key;
                }
            }
        }
        return $arrayKeys;
    }
    
    /**
     * Поиск по названию компании и адресу
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function searched(Request $request)
    {
        $searchCompany = $request->input('company');
        
        $organizations = Organization::all();
        if (!is_null($searchCompany)) {
            $organizations = Organization::where('customers.company_name', 'like', '%' . $searchCompany . '%')->get();
        }
        
        /**
         * Удалим из результатов запроса организации без координат для предотвращения ошибки отображения карты
         * @var Ambiguous $filtered
         */
        $filtered = $organizations->filter(function ($organization) {
            return $organization->fact_addr_coord != null;
        });
        
        $first = $filtered->first();
        return view('map.index', compact('organizations', 'first'));
    }
}
