<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="" method="get">
                        <a class="btn btn-dark" href="{{route('import.beers')}}">Pobierz dane z API</a>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Price</th>
                <th scope="col">Name</th>
                <th scope="col">Rating average</th>
                <th scope="col">Rating views</th>
                <th scope="col">Image</th>
                <th scope="col">Id_Api</th>
            </thead>
            <tbody>

            @foreach($beers as $beer_model)
                <tr>

                    <td>{{ $beer_model->id }}</td>
                    <td>{{ $beer_model->price }}</td>
                    <td>{{ $beer_model->name }}</td>
                    <td>{{ $beer_model->rating_average }}</td>
                    <td>{{ $beer_model->rating_reviews }}</td>
                    <td>{{  $beer_model->image }}</td>
                    <td>{{ $beer_model->id_api }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $beers->links() }}

    </div>
</x-app-layout>
