<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="get">
                        <select name="column_name" class="form-control form-control-lg">
                            <option value="variable_code">Variable_code</option>
                            <option value="variable_name">Variable_name</option>
                            <option value="value">Value</option>
                        </select>
                        <br>
                        <input name="query" class="form-control form-control-lg" type="text" placeholder="Wyszukaj"
                               required="wypełnij to pole" maxlength="100"/>
                        <br>
                        <br>
                        <a class="btn btn-dark" href="{{route('import')}}">Pobierz dane z tabeli</a>
                        <button type="submit" class="btn btn-dark">Wyszukaj</button>
                        <a class="btn btn-dark" href="{{route('dashboard')}}">Pokaż wszystkie</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class = "container">
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Year</th>
                <th scope="col">Industry_aggregation_NZSIOC</th>
                <th scope="col">Industry_code_NZSIOC</th>
                <th scope="col">Industry_name_NZSIOC</th>
                <th scope="col">Units</th>
                <th scope="col">Variable_code</th>
                <th scope="col">Variable_name</th>
                <th scope="col">Category</th>
                <th scope="col">Value</th>
                <th scope="col">Industry_code_ANZSIC06</th>
            </tr>
            </thead>
            <tbody>

            @foreach($companies as $company)
                <tr>

                    <td>{{ $company->id }}</td>
                    <td>{{ $company->year }}</td>
                    <td>{{ $company->industry_aggregation_NZSIOC }}</td>
                    <td>{{ $company->industry_code_NZSIOC }}</td>
                    <td>{{ $company->industry_name_NZSIOC }}</td>
                    <td>{{ $company->units }}</td>
                    <td>{{ $company->variable_code }}</td>
                    <td>{{ $company->variable_name }}</td>
                    <td>{{ $company->variable_category }}</td>
                    <td>{{ $company->value }}</td>
                    <td>{{ $company->industry_code_ANZSIC06 }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
</x-app-layout>
