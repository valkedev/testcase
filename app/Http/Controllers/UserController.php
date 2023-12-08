<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @return View
     */
    public function index(): View
    {
        return $this->userService
            ->index();
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return $this->userService
            ->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateUserRequest $request
     * @return RedirectResponse
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
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return $this->userService
            ->user($user)
            ->edit();
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        return $this->userService
            ->user($user)
            ->update($request);
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        return $this->userService
            ->user($user)
            ->destroy();
    }
}
