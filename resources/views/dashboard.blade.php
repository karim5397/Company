<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi.. <b> {{Auth::user()->name}} </b>
            <b style="float: right;">Total Users
                <span style="background-color:blue; color:white; padding:5px;"> {{count($users)}}</span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">created at</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ( $users as $user )

                        <tr>
                          <th scope="row">{{$i++}})</th>
                          <th>{{$user->id}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          {{-- <td>{{$user->created_at->diffForHumans()}}</td> <!--use in elquant orm --> --}}
                          <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td> <!--use in query builder -->
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
