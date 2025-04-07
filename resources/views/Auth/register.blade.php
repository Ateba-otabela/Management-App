<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/YOUR_FA_KIT.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 400px;">
            <h2 class="text-center mb-4">Sign up</h2>
            <form action="{{ route('register') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-user"></i> Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name"  name="name" :value="old('name')">
                    @error('name')
                     <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email" name="email" :value="old('email')">
                    @error('email')
                     <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" placeholder="Enter password"  name="password" >
                    @error('password')
                     <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-lock"></i> Confirm_password</label>
                    <input type="password" class="form-control" placeholder="Confirm password"  name="password_confirmation">
                   
                </div>
                <div>
                    <label for="profil_picture">Profile_picture</label>
                    <input type="file" class="form-control" name="profile_picture">
                    @error('profile_picture')
                     <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3"><i class="fas fa-user-plus"></i> Register</button>
                <div>
                    <p class="mt-4 text-center">Already have an acccount?<a href="{{ route('login_show') }}"> Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>