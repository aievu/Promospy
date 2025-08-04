@vite('resources/css/website/admin/admin-dashboard.css')
@extends('layout/website-layout')
@section('title', 'Admin Dashboard')

@include('components/header')
@include('components/admin-header')

@section('content')
    <h1>Admin Dashboard</h1>
    <div class="admin-dashboard-content">
        <div class="manage-rules">
            <form action="">
                <div class="form-content-make-rule">
                    <h2>Create rule</h2>
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" name="name" maxlength="25" placeholder="Name of the rule">
                        <label for="description">Description:</label>
                        <input type="text" name="description" maxlength="25" placeholder="Rule description">
                    </div>
                </div>
                <button type="submit">Create</button>
            </form>
            <form action="">
                <div class="form-content-delete-rule">
                    <h2>Delete rule</h2>
                    <div>
                        <label for="rule">Rule:</label>
                        <select name="rule" id="rule">
                            <option value="">Select a Rule</option>
                            <option value="admin">Admin</option>
                            <option value="">Moderator</option>
                        </select>
                    </div>
                </div>
                <button type="submit">Delete</button>
            </form>
        </div>
        <div class="manage-users">
            <form action="">
                <div class="form-content-assign-user-rule">
                    <h2>Assign rule to a user</h2>
                    <div>
                        <label for="email">User Email:</label>
                        <input type="text" name="email" placeholder="Email of the user">
                        <label for="rule">Rule:</label>
                        <select name="rule" id="rule">
                            <option value="">Select a Rule</option>
                            <option value="admin">Admin</option>
                            <option value="">Moderator</option>
                        </select>
                    </div>
                </div>
                <button type="submit">Assign</button>
            </form>
            <form action="">
                <div class="form-content-remove-user-rule">
                    <h2>Remove a user rule</h2>
                    <div>
                        <label for="email">User Email:</label>
                        <input type="text" name="email" placeholder="Email of the user">
                        <label for="rule">Rule:</label>
                        <select name="rule" id="rule">
                            <option value="">Select a Rule</option>
                            <option value="admin">Admin</option>
                            <option value="">Moderator</option>
                        </select>
                    </div>
                </div>
                <button type="submit">Remove</button>
            </form>
        </div>
        <div class="manage-products">
            <form style="opacity: 0.3" action="">
                <div class="form-content-manage-products">
                    <h2>Manage products</h2>
                    <div>
                        <label for="product">Product ID:</label>
                        <input type="text" name="product" placeholder="Search by product ID">
                    </div>
                </div>
                <button type="submit">Search</button>
            </form>
            <form style="opacity: 0.3" action="">
                <div class="form-content-manage-products">
                    <h2>Create category</h2>
                    <div>
                        <label for="category-name">Name:</label>
                        <input type="text" name="category-name" maxlength="25" placeholder="Name of the category">
                    </div>
                </div>
                <button type="submit">Create</button>
            </form>
            <form style="opacity: 0.3" action="">
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
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection