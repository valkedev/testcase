<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    )
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return $this->userService
            ->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return $this->userService
            ->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        return $this->userService
            ->store($request);
    }

    /**
     * Display the specified resource.
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return $this->userService
            ->user($user)
            ->show();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return $this->userService
            ->user($user)
            ->edit();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        return $this->userService
            ->user($user)
            ->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        return $this->userService
            ->user($user)
            ->destroy();
    }
}
