
@extends('Auth.layouts.master')

@section('content')
		<div class="page login-bg">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-7 col-lg-5">
									<div class="card">
										<div class="p-4 pt-6 text-center">
											<h1 class="mb-2">Login</h1>
											<p class="text-muted">Sign In to your account</p>
										</div>
										<form class="card-body pt-3" action="{{route('auth.login')}}" method="post" id="login" name="login">
                                            @csrf

                                            @error('validate')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror

											<div class="form-group">
												<label class="form-label">موبایل</label>
												<input class="form-control" placeholder="موبایل" name="mobile">
                                                @error('mobile')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
											</div>
											<div class="form-group">
												<label class="form-label">پسوورد</label>
												<input class="form-control" placeholder="پسوورد" name="password" type="password">
                                                @error('password')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
											</div>
											<div class="form-group">
												<label class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
													<span class="custom-control-label">Remeber me</span>
												</label>
											</div>
											<div class="submit">
                                                <button class="btn btn-primary btn-block" type="submit">ورود</button>
											</div>

										</form>
										<div class="card-body border-top-0 pb-6 pt-2">
											<div class="text-center">
												<span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-facebook-line"></i></span>
												<span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-instagram-line"></i></span>
												<span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-twitter-line"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection


