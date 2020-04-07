@extends('layouts.app')

@section('content')

<div class="bg-info p-2 m-4">
    <table class="table">
        <thead class="thead-primary">
            <tr class="border border-primary">
                <h3 border border-dark text-light>Medicine Info</h3>
            </tr>
        </thead>
        <tbody class="border border-primary">
            <tr>
              <th class=" border border-dark text-info">Title:</th>
                  <td class=" border border-dark text-info">
                  {{ $medicine->medicine_name }}</td>
            </tr>
            <tr>
              <th class=" border border-dark text-info">Quantity:</th>
                <td class=" border border-dark text-info">
                    {{ $medicine->medicine_quantity }}</td>
            </tr>
            <tr>
              <th class=" border border-dark text-info">Type:</th>
                <td class=" border border-dark text-info">
                    {{ $medicine->medicine_type }}</td>
            </tr>
            <tr>
              <th class=" border border-dark text-info">Price:</th>
                <td class=" border border-dark text-info">
                  @money($medicine->medicine_price, 'USD')</td>
            </tr>
            <tr>
              <th class=" border border-dark text-info">Created AT:</th>
                <td class=" border border-dark text-info">
                    {{ $medicine->created_at->format('m-d-Y')}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection