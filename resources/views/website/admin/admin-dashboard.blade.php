@vite('resources/css/website/admin/admin-dashboard.css')
@extends('layout/website-layout')
@section('title', 'Admin Dashboard')

@include('components/header')
@include('components/admin-header')

@section('content')
    <h1>Admin Dashboard</h1>
    <div class="admin-dashboard-content">
        <div class="manage-rules">
            <form class="manage-rules-form" action="{{ route('admin-dashboard.create-rule') }}" method="POST">
                @if (session('create-rule-success'))
                    <div style="color: green; margin-top: 10px;">
                        {{ session('create-rule-success') }}
                    </div>
                @endif
                @csrf
                <div class="form-content-create-rule">
                    <h2>Create rule</h2>
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" name="name" maxlength="25" placeholder="Name of the rule">
                        @if($errors && $errors->has('name'))
                            <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('name') }}</span>
                            </div> 
                        @endif
                        <label for="description">Description:</label>
                        <input type="text" name="description" maxlength="25" placeholder="Rule description">
                        @if($errors && $errors->has('description'))
                            <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('description') }}</span>
                            </div> 
                        @endif
                    </div>
                </div>
                <button type="submit">Create</button>
            </form>
            <div class="rules">
                @if (session('delete-rule-success'))
                    <div style="color: green; margin-top: 10px;">
                        {{ session('delete-rule-success') }}
                    </div>
                @endif
                <h2>Rules</h2>
                @forelse ($rules as $rule)
                    <div class="rules-content">
                        <h3>{{ $rule->name }}</h3>
                        <form action="{{ route('admin-dashboard.delete-rule', $rule) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i id="product-card-actions-icon" class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p>There are no rules!</p>
                @endforelse
            </div>
        </div>
        <div class="manage-users">
            <form class="manage-users-form" action="{{ route('admin-dashboard.assign-user-rule') }}" method="POST">
                @if (session('assign-rule-success'))
                    <div style="color: green; margin-top: 10px;">
                        {{ session('assign-rule-success') }}
                    </div>
                @endif
                @csrf
                <div class="form-content-assign-user-rule">
                    <h2>Assign rule to a user</h2>
                    <div>
                        <label for="email">User Email:</label>
                        <input type="text" name="email" maxlength="100" placeholder="Email of the user">
                        @if($errors && $errors->has('email'))
                            <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('email') }}</span>
                            </div> 
                        @endif
                        <label for="rule">Rule:</label>
                        <select name="rule" id="rule">
                            <option value="">Select a Rule</option>
                            @foreach ($rules as $rule)
                                <option value="{{ $rule->name }}">{{ $rule->name }}</option>
                            @endforeach
                        </select>
                        @if($errors && $errors->has('rule'))
                            <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('rule') }}</span>
                            </div> 
                        @endif
                    </div>
                </div>
                <button type="submit">Assign</button>
            </form>
            <form class="manage-users-form" action="{{ route('admin-dashboard.remove-user-rule') }}" method="POST">
                @if (session('remove-user-rule-success'))
                    <div style="color: green; margin-top: 10px;">
                        {{ session('remove-user-rule-success') }}
                    </div>
                @endif
                @csrf
                <div class="form-content-remove-user-rule">
                    <h2>Remove a user rule</h2>
                    <div>
                        <label for="remove-user-rule-email">User Email:</label>
                        <input type="text" name="remove-user-rule-email" maxlength="100" placeholder="Email of the user">
                        @if($errors && $errors->has('remove-user-rule-email'))
                            <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('remove-user-rule-email') }}</span>
                            </div> 
                        @endif
                        <label for="remove-user-rule-rule">Rule:</label>
                        <select name="remove-user-rule-rule" id="rule">
                            <option value="">Select a Rule</option>
                            @foreach ($rules as $rule)
                                <option value="{{ $rule->name }}">{{ $rule->name }}</option>
                            @endforeach
                        </select>
                        @if($errors && $errors->has('remove-user-rule-rule'))
                            <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('remove-user-rule-rule') }}</span>
                            </div> 
                        @endif
                    </div>
                </div>
                <button type="submit">Remove</button>
            </form>
        </div>
        <div class="manage-products">
            <form class="manage-products-form" style="opacity: 0.3" action="">
                <div class="form-content-manage-products">
                    <h2>Manage products</h2>
                    <div>
                        <label for="product">Product ID:</label>
                        <input type="text" name="product" placeholder="Search by product ID">
                    </div>
                </div>
                <button type="submit">Search</button>
            </form>
            <form class="manage-products-form" style="opacity: 0.3" action="">
                <div class="form-content-manage-products">
                    <h2>Create category</h2>
                    <div>
                        <label for="category-name">Name:</label>
                        <input type="text" name="category-name" maxlength="25" placeholder="Name of the category">
                    </div>
                </div>
                <button type="submit">Create</button>
            </form>
            <form class="manage-products-form" style="opacity: 0.3" action="">
                <div class="form-content-manage-products">
                    <h2>Delete category</h2>
                    <div>
                        <label for="category">Category:</label>
                        <select name="category" id="category">
                            <option value="">Select a Rule</option>
                            <option value="">Eletronic</option>
                            <option value="">Fashion</option>
                        </select>
                    </div>
                </div>
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection