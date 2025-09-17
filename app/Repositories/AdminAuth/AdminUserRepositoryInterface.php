<?php

namespace App\Repositories\AdminAuth;

use App\Models\AdminUser;

interface AdminUserRepositoryInterface
{
    public function create(array $data): AdminUser;

    public function findByEmail(string $email): ?AdminUser;

    public function findByUsername(string $username): ?AdminUser;

    public function findById(int $id): ?AdminUser;

    public function login(array $credentials): ?AdminUser;

    public function logout(): void;

    public function updateProfile(int $id, array $data): bool;
}
