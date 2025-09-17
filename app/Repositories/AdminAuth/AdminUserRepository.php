<?php

    namespace App\Repositories\AdminAuth;
    use App\Models\AdminUser;
    use App\Repositories\AdminAuth\AdminUserRepositoryInterface;

    class AdminUserRepository implements AdminUserRepositoryInterface
    {
        public function create(array $data): AdminUser
        {
            return AdminUser::create($data);
        }

        public function findByEmail(string $email): ?AdminUser
        {
            return AdminUser::where('email', $email)->first();
        }

        public function findByUsername(string $username): ?AdminUser
        {
            return AdminUser::where('username', $username)->first();
        }

        public function findById(int $id): ?AdminUser
        {
            return AdminUser::find($id);
        }

        public function login(array $credentials): ?AdminUser
        {
            if (auth()->guard('admin')->attempt($credentials)) {
                return auth()->guard('admin')->user();
            }
            return null;
        }

        public function logout(): void
        {
            auth()->guard('admin')->logout();
        }

        public function updateProfile(int $id, array $data): bool
        {
            $adminUser = $this->findById($id);
            if ($adminUser) {
                return $adminUser->update($data);
            }
            return false;
        }
    }
?>
