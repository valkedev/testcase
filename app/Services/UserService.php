<?php

namespace App\Services;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class UserService
{
    /** @var User|null user attached to service */
    private ?User $user;

    /**
     * Attach user to service
     * @param User|null $user
     * @return $this
     */
    public function user(User $user = null): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Show current user
     * @return View
     */
    public function show(): View
    {
        return view('users.show', [
            'user' => $this->user,
        ]);
    }

    /**
     * Display user listing
     * @return View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::query()
                ->orderBy('created_at', 'desc')
                ->paginate(),
        ]);
    }

    /**
     * Create a new user.
     * @param CreateUserRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $this->user(new User());
            $this->saveUserData($data);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('users.create')
                ->withErrors(__('app.users.error', ['message' => $e->getMessage()]));
        }

        return redirect()
            ->route('users.show', ['user' => $this->user])
            ->with(['success' => [__('app.users.success')]]);
    }

    /**
     * Update the given user.
     * @param UpdateUserRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $this->saveUserData($data);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('users.edit', ['user' => $this->user])
                ->withErrors(__('app.users.error', ['message' => $e->getMessage()]));
        }

        return redirect()
            ->route('users.show', ['user' => $this->user])
            ->with(['success' => [__('app.users.success')]]);
    }

    /**
     * Delete the given user.
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $this->user->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('users.index')
                ->withErrors(__('app.users.delete_error', ['message' => $e->getMessage()]));
        }

        return redirect()
            ->route('users.index')
            ->with(['success' => [__('app.users.delete_success')]]);
    }

    /**
     * Show the form for editing the user
     * @return View
     */
    public function edit(): View
    {
        return view('users.edit', [
            'user' => $this->user,
        ]);
    }

    /**
     * Show the form for creating a new user
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Save user data
     * @param array<string, mixed> $data
     */
    private function saveUserData(array $data): void
    {
        $this->user->fill($data);
        $this->user->save();
    }
}
