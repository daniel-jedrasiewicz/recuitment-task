<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebController extends Controller
{
    public function import()
    {
        $csv = Storage::disk('local')->get('database.csv');
        $data = str_getcsv($csv, PHP_EOL);

        foreach ($data as $row) {
            $columns = str_getcsv($row, ',');

            if ($columns[0] == 'Year') {
                continue;
            }

            $year = (int)$columns[0];
            $value = str_replace(',', '', $columns[8]);
            $value = (int)$value;

            $company = new Company();
            $company->year = $year;
            $company->industry_aggregation_NZSIOC = $columns[1];
            $company->industry_code_NZSIOC = $columns[2];
            $company->industry_name_NZSIOC = $columns[3];
            $company->units = $columns[4];
            $company->variable_code = $columns[5];
            $company->variable_name = $columns[6];
            $company->variable_category = $columns[7];
            $company->value = $value;
            $company->industry_code_ANZSIC06 = $columns[9];
            $company->save();
        };

        return redirect(route('dashboard'))->with('message', 'tabela pobrana pomyślnie');
    }

    public function index(Request $request)
    {

        $column_name = $request->all()['column_name'] ?? null;
        $query = $request->all()['query'] ?? null;

        if (!empty($column_name)) {
            $companies = Company::where($column_name, $query)->paginate(40);
        } else {
            $companies = Company::paginate(40);

        }

        return view('dashboard', ['companies' => $companies]);
    }

}
