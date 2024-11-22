@extends('layouts/contentNavbarLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body pt-2 mt-1">
                    <h4 class="pt-3">Edit Member Details</h4>
                    <form id="formAccountSettings" method="POST"
                        action="{{ route('editorial-update', $editorial->member_id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mt-1 gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control @if ($errors->has('member_name')) {{ 'is-invalid' }} @endif"
                                        type="text" id="firstName" name="member_name" placeholder="Name"
                                        value="{{ $editorial->member_name }}" />
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
                                        value="{{ $editorial->member_email }}" />
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
                                        value="{{ $editorial->member_role }}" />
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
                                        value="{{ $editorial->member_designation }}" />
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
                                        value="{{ $editorial->member_address }}" />
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
                                        value="{{ $editorial->member_researcharea }}" />
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
                                        class="select2 form-select @if ($errors->has('member_country')) is-invalid @endif"
                                        name="member_country">
                                        <option value="">Select</option>

                                        <!-- Loop through countries -->
                                        <option value="Australia"
                                            {{ old('member_country', $editorial->member_country) == 'Australia' ? 'selected' : '' }}>
                                            Australia</option>
                                        <option value="Bangladesh"
                                            {{ old('member_country', $editorial->member_country) == 'Bangladesh' ? 'selected' : '' }}>
                                            Bangladesh</option>
                                        <option value="Belarus"
                                            {{ old('member_country', $editorial->member_country) == 'Belarus' ? 'selected' : '' }}>
                                            Belarus</option>
                                        <option value="Brazil"
                                            {{ old('member_country', $editorial->member_country) == 'Brazil' ? 'selected' : '' }}>
                                            Brazil</option>
                                        <option value="Canada"
                                            {{ old('member_country', $editorial->member_country) == 'Canada' ? 'selected' : '' }}>
                                            Canada</option>
                                        <option value="China"
                                            {{ old('member_country', $editorial->member_country) == 'China' ? 'selected' : '' }}>
                                            China</option>
                                        <option value="France"
                                            {{ old('member_country', $editorial->member_country) == 'France' ? 'selected' : '' }}>
                                            France</option>
                                        <option value="Germany"
                                            {{ old('member_country', $editorial->member_country) == 'Germany' ? 'selected' : '' }}>
                                            Germany</option>
                                        <option value="India"
                                            {{ old('member_country', $editorial->member_country) == 'India' ? 'selected' : '' }}>
                                            India</option>
                                        <option value="Indonesia"
                                            {{ old('member_country', $editorial->member_country) == 'Indonesia' ? 'selected' : '' }}>
                                            Indonesia</option>
                                        <option value="Israel"
                                            {{ old('member_country', $editorial->member_country) == 'Israel' ? 'selected' : '' }}>
                                            Israel</option>
                                        <option value="Italy"
                                            {{ old('member_country', $editorial->member_country) == 'Italy' ? 'selected' : '' }}>
                                            Italy</option>
                                        <option value="Japan"
                                            {{ old('member_country', $editorial->member_country) == 'Japan' ? 'selected' : '' }}>
                                            Japan</option>
                                        <option value="Korea"
                                            {{ old('member_country', $editorial->member_country) == 'Korea' ? 'selected' : '' }}>
                                            Korea, Republic of</option>
                                        <option value="Mexico"
                                            {{ old('member_country', $editorial->member_country) == 'Mexico' ? 'selected' : '' }}>
                                            Mexico</option>
                                        <option value="Philippines"
                                            {{ old('member_country', $editorial->member_country) == 'Philippines' ? 'selected' : '' }}>
                                            Philippines</option>
                                        <option value="Russia"
                                            {{ old('member_country', $editorial->member_country) == 'Russia' ? 'selected' : '' }}>
                                            Russian Federation</option>
                                        <option value="South Africa"
                                            {{ old('member_country', $editorial->member_country) == 'South Africa' ? 'selected' : '' }}>
                                            South Africa</option>
                                        <option value="Thailand"
                                            {{ old('member_country', $editorial->member_country) == 'Thailand' ? 'selected' : '' }}>
                                            Thailand</option>
                                        <option value="Turkey"
                                            {{ old('member_country', $editorial->member_country) == 'Turkey' ? 'selected' : '' }}>
                                            Turkey</option>
                                        <option value="Ukraine"
                                            {{ old('member_country', $editorial->member_country) == 'Ukraine' ? 'selected' : '' }}>
                                            Ukraine</option>
                                        <option value="United Arab Emirates"
                                            {{ old('member_country', $editorial->member_country) == 'United Arab Emirates' ? 'selected' : '' }}>
                                            United Arab Emirates</option>
                                        <option value="United Kingdom"
                                            {{ old('member_country', $editorial->member_country) == 'United Kingdom' ? 'selected' : '' }}>
                                            United Kingdom</option>
                                        <option value="United States"
                                            {{ old('member_country', $editorial->member_country) == 'United States' ? 'selected' : '' }}>
                                            United States</option>
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
                                        value="{{ $editorial->member_website }}" />
                                    <label for="website">Website</label>
                                    @if ($errors->has('member_website'))
                                        <span class="invalid-feedback">
                                            <Strong>{{ $errors->first('member_website') }}</Strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <a href="{{route('editorial-home')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
