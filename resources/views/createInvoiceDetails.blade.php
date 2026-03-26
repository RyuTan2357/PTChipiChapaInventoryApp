@extends('layouts.master')

@section('title', 'Create Invoice Details')

@section('content')
    <h1 class="fw-bold text-center">Create Invoice Details</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="/createInvoiceDetails" method="POST">
        @csrf
        <div class="mb-3">
            <label for="invoice_id" class="form-label