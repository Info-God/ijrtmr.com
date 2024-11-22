@extends('layouts/contentNavbarLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body pt-2 mt-1">
                    <h4 class="pt-3">Add Member Details</h4>
                    <form id="formAccountSettings" method="POST" action="{{ route('editorial-store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-1 gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control @if ($errors->has('member_name')) {{ 'is-invalid' }} @endif"
                                        type="text" id="firstName" name="member_name" placeholder="Name"
                                        value="{{ old('member_name') }}" />
                                    <label for="firstName">Name</label>
                                    @if ($errors->has('member_name'))
                                        <div class="invalid-feedback"><strong>{{ $errors->first('member_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control @if ($errors->has('member_email')) {{ 'is-invalid' }} @endif"
                                        type="text" id="email" name="member_email" placeholder="Email"
                                        value="{{ old('member_email') }}" />
                                    <label for="email">E-mail</label>
                                    @if ($errors->has('member_email'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_email') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control @if ($errors->has('member_role')) {{ 'is-invalid' }} @endif"
                                        type="text" name="member_role" id="lastName" placeholder="Role"
                                        value="{{ old('member_role') }}" />
                                    <label for="lastName">Role</label>
                                    @if ($errors->has('member_role'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_role') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text"
                                        class="form-control @if ($errors->has('member_designation')) {{ 'is-invalid' }} @endif"
                                        id="Designation" name="member_designation" placeholder="Designation"
                                        value="{{ old('member_designation') }}" />
                                    <label for="Designation">Designation</label>
                                    @if ($errors->has('member_designation'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_designation') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text"
                                        class="form-control @if ($errors->has('member_address')) {{ 'is-invalid' }} @endif"
                                        id="address" name="member_address" placeholder="Address"
                                        value="{{ old('member_address') }}" />
                                    <label for="address">Address</label>
                                    @if ($errors->has('member_address'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_address') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        class="form-control @if ($errors->has('member_researcharea')) {{ 'is-invalid' }} @endif"
                                        type="text" id="state" name="member_researcharea" placeholder="Research Area"
                                        value="{{ old('member_researcharea') }}" />
                                    <label for="state">Research Area</label>
                                    @if ($errors->has('member_researcharea'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_researcharea') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="country"
                                        class="select2 form-select @if ($errors->has('member_country')) {{ 'is-invalid' }} @endif"
                                        name="member_country" value="{{ old('member_country') }}">
                                        <option value="">Select</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </select>
                                    <label for="country">Country</label>
                                    @if ($errors->has('member_country'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_country') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        class="form-control @if ($errors->has('member_website')) {{ 'is-invalid' }} @endif"
                                        type="text" id="website" name="member_website" placeholder="Website"
                                        value="{{ old('member_website') }}" />
                                    <label for="website">Website</label>
                                    @if ($errors->has('member_website'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_website') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar"
                                        class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                                            <input type="file" id="upload"
                                                class="account-file-input @if ($errors->has('member_image_url')) {{ 'is-invalid' }} @endif"
                                                name="member_image_url" hidden accept="image/png, image/jpeg"
                                                value="{{ old('member_image_url') }}" />
                                        </label>
                                        <button type="button" class="btn btn-outline-danger account-image-reset mb-3">
                                            <i class="mdi mdi-reload d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>

                                        <div class="text-danger">
                                            <Strong>{{ $errors->first('member_image_url') }}</Strong>
                                        </div>

                                        <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <a href="{{route('editorial-home')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
